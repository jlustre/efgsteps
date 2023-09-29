@extends('admin.admin_dashboard')

@section ('styles')
@endsection

@section('page-content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style type="text/css">
    .form-check-label {
        text-transform: capitalize;
    }
</style>
    <div class="page-content">
        @include('admin.body.page_header', [$header = 'Edit Permissions In Roles'])
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <form id="myForm" method="POST" action="{{ route('admin.roles.update', $role->id) }}" class="forms-sample">
                        @csrf
                        <div class="card-body">
                            <h6 class="card-title">Role: {{ $role->name }}</h6>
                            <input type="hidden" name="role_id" value="{{ $role->id }}"/>
                            <div class="form-check mb-2 mt-2">
                                <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                                <label class="form-check-label" for="checkDefaultmain">
                                    All Permission
                                </label>
                            </div>
                            <hr/>
                            @foreach ($permission_groups as $group)
                                <div class="row">
                                    <div class="col-3">
                                        @php
                                            $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                        @endphp
                                        <div class="form-check mb-2 mt-2">
                                            <input type="checkbox" class="form-check-input" name="group_name[]" id="group_name" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="checkDefault">
                                                {{ $group->group_name }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        @foreach ($permissions as $permission)
                                            <div class="form-check mb-2 mt-2">
                                                <input type="checkbox" class="form-check-input" name="permission[]" id="permissionId_{{ $permission->id }}" value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="permissionId_{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div> <!--// row -->
                             @endforeach

                            <button type="submit" class="btn btn-primary submit">Save Changes</button>
                            <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
                        </div> <!-- end card body -->
                    </form>
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end page-content -->

    <script type="text/javascript">
        $('#checkDefaultmain').click(function(){
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }
        });
    </script>
@endsection

@section('scripts')
    @include('backend.pages.role.validation')
@endsection
