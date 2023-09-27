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
        @include('admin.body.page_header', [$header = 'Steps Checklist: FAP'])
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('admin.add.step.fap') }}" class="btn btn-primary btn-xs">Add New FAP Step</a>
            </ol>
        </nav>
        <div class="row">
			<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Field Apprenticeship Program (FAP)</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Id<br/>No.</th>
                        <th>Title<br/>Instructions</th>
                        <th>Week<br/>No.</th>
                        <th>Nth Day<br/>Target</th>
                        <th>Seq<br/>No.</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($checklists as $key => $step)
                        @php
                            $weekNo = ceil(intval($step->nthDayTarget)/7);
                        @endphp
                      <tr>
                          {{-- <td>{{ $step->id }}</td> --}}
                        <td>{{ $key+1 }}</td>
                        <td><strong>{{ $step->title }}</strong><br/><small>{!! $step->instructions !!}</small></td>
                        <td>{{ $weekNo }}</td>
                        <td>{{ $step->nthDayTarget }}</td>
                        <td>{{ $step->sequence }}</td>
                        <td>
                            <a href="{{ route('admin.edit.step', $step->id) }}">
                                <i class="link-icon color-green" data-feather="edit"></i>
                            </a>
                            <a href="{{ route('admin.delete.step', $step->id) }}" id="delete">
                                <i class="link-icon color-red" data-feather="delete"></i>
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
