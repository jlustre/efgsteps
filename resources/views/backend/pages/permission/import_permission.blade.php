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
                <h6 class="card-title">Import Permission</h6>
                <form id="myForm" method="POST" action="{{ route('import') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="import_file" class="form-label text-primary">Excel File Import <span class="required">*</span></label>
                                    <input type="file" class="form-control @error('import_file') is-invalid @enderror" name="import_file" id="import_file"/>
                                    @error('import_file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                    <button type="submit" class="btn btn-success submit">Upload</button>
                    <a href="{{ route('export') }}" class="btn btn-warning">Download</a>
                    <a href="{{ route('all.permissions') }}" class="btn btn-info">Cancel</a>
                </form>
              </div>
            </div>
            </div>
        </div>
    </div> <!-- end page-content -->
@endsection

@section('scripts')
    {{-- @include('backend.pages.permission.validation') --}}
@endsection
