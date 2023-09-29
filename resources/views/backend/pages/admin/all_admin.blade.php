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
        @include('admin.body.page_header', [$header = 'Admins'])
        <nav class="page-breadcrumb">
            <ol class="breadcrumb d-flex gap-2">
                <li><a href="{{ route('add.admin') }}" class="btn btn-primary btn-xs">Add New Admin</a></li>
             </ol>
        </nav>
        <div class="row">
			<div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Admins</h6>
                    <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Sponsor</th>
                            <th>Email</th>
                            <th>Loc</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for ($i=0; $i< count($allAdminArray); $i++)
                            <tr>
                                <td>{{ $allAdminArray[$i]['id'] }}</td>
                                <td><img src="{{ !empty($allAdminArray[$i]['photo']) ? url('upload/admin_images/', $allAdminArray[$i]['photo']) : url('upload/no_image.jpg') }}" style="width: 40px; height:40px;"/></td>
                                <td><strong>{{ $allAdminArray[$i]['name'] }}</strong></td>
                                <td><a href="{{ route('view.edit.profile', $allAdminArray[$i]['id']) }}">{{ $allAdminArray[$i]['username'] }}</a></td>
                                <td><a href="{{ route('view.edit.profile', $allAdminArray[$i]['sponsor_data']->id) }}">{{ $allAdminArray[$i]['sponsor'] }}</a></td>
                                <td>{{ $allAdminArray[$i]['email'] }}</td>
                                <td>{{ $allAdminArray[$i]['state_province'] }}</td>
                                <td>{{ !empty($allAdminArray[$i]['phone']) ? $allAdminArray[$i]['phone'] : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('edit.admin', $allAdminArray[$i]['id']) }}">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="link-icon color-green" data-feather="edit"></i>
                                        </span>
                                    </a>
                                    <a href="{{ route('delete.admin', $allAdminArray[$i]['id']) }}" id="delete">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="link-icon color-red" data-feather="delete"></i>
                                        </span>
                                    </a>
                                </td>
                        </tr>
                        @endfor
                        </tbody>
                    </table>
                    </div>
                </div>
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->

    @if(count($allDeletedAdmin) != 0)
        <hr/>
        <div class="row">
			<div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Deleted Admins</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Sponsor</th>
                                    <th>Email</th>
                                    <th>Loc</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($allDeletedAdmin as $key => $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><img src="{{ !empty($item->photo) ? url('upload/admin_images/', $item->photo) : url('upload/no_image.jpg') }}" style="width: 40px; height:40px;"/></td>
                                        <td><strong>{{ $item->name }}</strong></td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->sponsor }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->state_province }}</td>
                                        <td>{{ !empty($item->phone) ? $item->phone : 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('restore.admin', $item->id) }}">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Restore">
                                                    <i class="link-icon color-green" data-feather="external-link"></i>
                                                </span>
                                            </a>
                                            <a href="{{ route('force.delete.admin', $item->id) }}" id="delete">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Force Delete">
                                                    <i class="link-icon color-red" data-feather="trash-2"></i>
                                                </span>
                                            </a>
                                        </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    @endif
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
