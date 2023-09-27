<form id="myForm" method="POST" action="{{ $mode == 'add' ? route('store.permission') : route('update.permission', $permission->id) }}" class="forms-sample">
@csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="name" class="form-label">Permission Name <span class="required">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $mode == 'add' ? old('name') : $permission->name }}"/>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-12">
            <div class="mb-3">
                <label for="group_name" class="form-label">Group Name <span class="required">*</span></label>
                <select class="form-select" id="group_name" name="group_name">
                    <option selected="" disabled="">Select Group</option>
                    <option value="resources" {{ $mode == 'add' ? (old('group_name') == 'resources' ? 'selected' : '') : ($permission->group_name == 'resources' ? 'selected' : '') }}>Resources</option>
                    <option value="role" {{ $mode == 'add' ? (old('group_name') == 'role' ? 'selected' : '') : ($permission->group_name == 'role' ? 'selected' : '') }}>Role & Permission</option>
                    <option value="step" {{ $mode == 'add' ? (old('group_name') == 'step' ? 'selected' : '') : ($permission->group_name == 'step' ? 'selected' : '') }}>Steps Checklist</option>
                    <option value="training" {{ $mode == 'add' ? (old('group_name') == 'training' ? 'selected' : '') : ($permission->group_name == 'training' ? 'selected' : '') }}>Training</option>
                    <option value="user" {{ $mode == 'add' ? (old('group_name') == 'user' ? 'selected' : '') : ($permission->group_name == 'user' ? 'selected' : '') }}>User</option>
                </select>
            </div>
        </div><!-- Col -->
    </div><!-- Row -->

    <button type="submit" class="btn btn-success submit">Save Changes</button>
    <a href="{{ route('all.permissions') }}" class="btn btn-info">Cancel</a>
</form>
