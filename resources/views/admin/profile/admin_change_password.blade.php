@extends('admin.admin_dashboard')

@section('page-content')
    <div class="page-content">
        @include('admin.body.page_header', [$header = 'My Profile: '.$profileData->username])

        <div class="row profile-body">
          <!-- left wrapper start -->
          <div class="d-md-block col-md-4 col-xl-4 left-wrapper grid-margin">
            @include('admin.profile.left_sidebar')
          </div>
          <!-- left wrapper end -->

          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="col-md-12 stretch-card">
                    @include('admin.profile.change_password_forms')
                </div>
            </div>
          </div>
          <!-- middle wrapper end -->

          <!-- right wrapper start -->
          {{-- @include('admin.profile.right_sidebar') --}}
          <!-- right wrapper end -->
        </div>
    </div> <!-- end page-content -->
@endsection
