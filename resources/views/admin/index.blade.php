@extends('admin.admin_dashboard')

@section('page-content')
    <div class="page-content">
        @include('admin.body.page_header', [$header = 'Admin Dashboard'])
        @include('admin.body.stat_blocks')
        {{-- @include('admin.body.stat_revenue') --}}

        <div class="row">
            @include('admin.body.stat_sales')
            {{-- @include('admin.body.stat_storage') --}}
        </div> <!-- row -->

        <div class="row">
            {{-- @include('admin.body.block_inbox') --}}
            {{-- @include('admin.body.block_projects') --}}
        </div> <!-- row -->

    </div> <!-- end page-content -->
@endsection
