@extends('admin.admin_dashboard')

@section ('styles')
@endsection

@section('page-content')
    <div class="page-content">
        @include('admin.body.page_header', [$header = 'Permission'])
        <div class="row">
			<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Edit Permission Group</h6>
                    <form id="myForm" method="POST" action="{{ route('update.permission_group') }}" class="forms-sample">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label text-primary">Permission Group Name <span class="required">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required/>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <button type="submit" class="btn btn-success submit">Save Changes</button>
                            <a href="{{ route('all.permission_group') }}" class="btn btn-info">Cancel</a>
                    </form>
              </div>
            </div>
            </div>
        </div>
    </div> <!-- end page-content -->
@endsection

@section('scripts')
@endsection
