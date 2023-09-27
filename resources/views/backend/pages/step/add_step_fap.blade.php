@extends('admin.admin_dashboard')

@section ('styles')
@endsection

@section('page-content')
    <div class="page-content">
        @include('admin.body.page_header', [$header = 'Steps'])
        <div class="row">
			<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Add FAP Step ({{ strtoupper($country) }})</h6>
                @include('backend.pages.step.form_step_fap', [$mode = 'add', $country = $country])
              </div>
            </div>
            </div>
        </div>
    </div> <!-- end page-content -->
@endsection

@section('scripts')
    @include('backend.pages.step.validation')
@endsection
