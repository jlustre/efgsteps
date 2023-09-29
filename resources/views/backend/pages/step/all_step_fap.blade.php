@extends('admin.admin_dashboard')

@section ('styles')
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
  <!-- End plugin css for this page -->
  <style>
    .color-green{
        width: 24px;
        height: 24px;
        stroke: green;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        fill: none;
        }
    .color-red{
        width: 24px;
        height: 24px;
        stroke: red;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        fill: none;
        }
  </style>
@endsection

@section('page-content')
    <div class="page-content">
        @include('admin.body.page_header', [$header = 'FAP Steps ('.strtoupper($country).')'])
        <nav class="page-breadcrumb">
            <ol class="breadcrumb d-flex gap-2">
                <li><a href="{{ route('add.step.fap', $country) }}" class="btn btn-primary btn-xs">Add New FAP Step</a></li>
             </ol>
        </nav>
        <div class="row">
			<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">All FAP Steps ({{ strtoupper($country) }})</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Step<br/>No.</th>
                        <th>Week</th>
                        <th>Step Title<br/>Instructions</th>
                        <th>nth Day<br/>Target</th>
                        <th>Seq</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($steps as $key => $item)
                        @php
                            $weekNo = ceil(intval($item->nthDayTarget)/7);
                        @endphp
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $weekNo }}</td>
                            <td><strong>{{ $item->title }}</strong><br/><small>{{ $item->instructions }}</small></td>
                            <td>{{ $item->nthDayTarget }}</td>
                            <td>{{ $item->sequence }}</td>
                            <td>
                                <a href="{{ route('edit.step.fap', $item->id) }}">
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="link-icon color-green" data-feather="edit"></i>
                                    </span>
                                </a>
                                <a href="{{ route('delete.step.fap', $item->id) }}" id="delete">
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <i class="link-icon color-red" data-feather="delete"></i>
                                    </span>
                                </a>
                            </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div> <!-- end page-content -->
@endsection

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="{{ asset('backend/assets/js/code/code.js') }}"></script>

  <!-- Start datatable -->
  <script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
  <script src="{{ asset('backend/assets/js/data-table.js') }}"></script>
  <!-- End datatable -->
@endsection
