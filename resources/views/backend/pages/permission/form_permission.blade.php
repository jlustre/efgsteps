<form id="myForm" method="POST" action="{{ $mode == 'add' ? route('store.permission') : route('update.permission', $permission->id) }}" class="forms-sample">
@csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="name" class="form-label text-primary">Permission Name <span class="required">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $mode == 'add' ? old('name') : $permission->name }}"/>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-12">
            <div class="mb-3">
                <label for="group_name" class="form-label text-primary">Group Name <span class="required">*</span></label>
                <select class="form-select" id="group_name" name="group_name">
                    <option selected="" disabled="">Select Group</option>
                    @foreach($permission_groups as $permission_group)
                        <option value="{{ $permission_group->name }}"{{$mode == 'add' ? (old('group_name') ==  $permission_group->name ? 'selected' : '') : ($permission->group_name == $permission_group->name  ? 'selected' : '')}}>{{ $permission_group->name }}</option>
                    @endforeach
                </select>
            </div>
        </div><!-- Col -->
    </div><!-- Row -->

    <button type="submit" class="btn btn-success submit">Save Changes</button>
    <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
</form>
