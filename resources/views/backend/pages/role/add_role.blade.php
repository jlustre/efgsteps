@extends('admin.admin_dashboard')

@section ('styles')
@endsection

@section('page-content')
    <div class="page-content">
        @include('admin.body.page_header', [$header = 'Role'])
        <div class="row">
			<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Add Role</h6>
                @include('backend.pages.role.form_role', [$mode = 'add'])
              </div>
            </div>
            </div>
        </div>
    </div> <!-- end page-content -->
@endsection

@section('scripts')
    @include('backend.pages.role.validation')
@endsection
