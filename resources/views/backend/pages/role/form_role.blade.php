<form id="myForm" method="POST" action="{{ $mode == 'add' ? route('store.role') : route('update.role', $role->id) }}" class="forms-sample">
@csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="name" class="form-label">Role Name <span class="required">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $mode == 'add' ? old('name') : $role->name }}"/>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="guard_name" class="form-label">Guard Name <span class="required">*</span></label>
                <select class="form-select @error('name') is-invalid @enderror" id="guard_name" name="guard_name">
                    <option selected="" disabled="">Select Guard</option>
                    <option value="web" {{ $mode == 'add' ? (old('guard_name') == 'web' ? 'selected' : '') : ($role->guard_name == 'web' ? 'selected' : '') }}>Web</option>
                    <option value="trainer" {{ $mode == 'add' ? (old('guard_name') == 'trainer' ? 'selected' : '') : ($role->guard_name == 'trainer' ? 'selected' : '') }}>Trainer</option>
                    <option value="admin" {{ $mode == 'add' ? (old('guard_name') == 'admin' ? 'selected' : '') : ($role->guard_name == 'admin' ? 'selected' : '') }}>Admin</option>
                </select>
                @error('guard_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->

    <button type="submit" class="btn btn-success submit">Save Changes</button>
    <a href="{{ route('all.roles') }}" class="btn btn-info">Cancel</a>
</form>
