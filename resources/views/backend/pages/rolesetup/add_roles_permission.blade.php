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
        @include('admin.body.page_header', [$header = 'Permissions In Roles'])
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <form id="myForm" method="POST" action="{{ route('role.permission.store') }}" class="forms-sample">
                        @csrf
                        <div class="card-body">
                            <h6 class="card-title">Add Permissions In Roles</h6>
                            <select class="form-select @error('name') is-invalid @enderror" id="role_id" name="role_id">
                                <option selected="" disabled="">Select Role Name</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" >{{ $role->name }}</option>
                                @endforeach
                            </select>
                             @error('role_id')
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
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
                                        <div class="form-check mb-2 mt-2">
                                            <input type="checkbox" class="form-check-input" name="group_name[]" id="group_name">
                                            <label class="form-check-label" for="checkDefault">
                                                {{ $group->group_name }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        @php
                                            $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                        @endphp
                                        @foreach ($permissions as $permission)
                                            <div class="form-check mb-2 mt-2">
                                                <input type="checkbox" class="form-check-input" name="permission[]" id="permissionId_{{ $permission->id }}" value="{{ $permission->id }}">
                                                <label class="form-check-label" for="permissionId_{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div> <!--// row -->
                             @endforeach

                            <button type="submit" class="btn btn-success submit">Save Changes</button>
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
