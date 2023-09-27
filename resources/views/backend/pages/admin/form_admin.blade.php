<form id="myForm" method="POST" action="{{ $mode == 'add' ? route('store.admin') : route('update.admin', $admin->id) }}" class="forms-sample">
@csrf
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="name" class="form-label">Name <span class="required">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $mode == 'add' ? old('name') : $admin->name }}"/>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->

        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="username" class="form-label">UserName <span class="required">*</span>
                <span class="badge bg-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Username must have: 6-28 characters and no space">?</span>
                </label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ $mode == 'add' ? old('username') : $admin->username }}"/>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    @if ($mode == 'add')
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password <span class="required">*</span>
                <span class="badge bg-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Password must have: minimum 6 char, has at least 1 each of uppercase, lowercase, and special characters (!*$#%)">?</span>
                </label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ $mode == 'add' ? old('password') : $admin->password }}"/>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password <span class="required">*</span></label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"/>
            </div>
        </div><!-- Col -->
    @endif
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="sponsor" class="form-label">Sponsor <span class="required">*</span>
                <span class="badge bg-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Sponsor must be the Username of an active member of our site">?</span>
                </label>
                <input type="text" class="form-control @error('sponsor') is-invalid @enderror" name="sponsor" id="sponsor" value="{{ $mode == 'add' ? old('sponsor') : $admin->sponsor }}"/>
                @error('sponsor')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->

        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email <span class="required">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $mode == 'add' ? old('email') : $admin->email }}"/>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->

        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="phone" class="form-label">Phone <span class="required">*</span></label>
                <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $mode == 'add' ? old('phone') : $admin->phone }}"/>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->

        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="role" class="form-label">Role Name <span class="required">*</span></label>
                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                    <option selected="" disabled="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $mode == 'add' ? (old('role') ==  $role->name ? 'selected' : '') : ($admin->role  ==  $role->name ? 'selected' : '') }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->

        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="city_town" class="form-label">City <span class="required">*</span></label>
                <input type="text" class="form-control @error('city_town') is-invalid @enderror" name="city_town" id="city_town" value="{{ $mode == 'add' ? old('city_town') : $admin->city_town }}"/>
                @error('city_town')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->

        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="state_province" class="form-label">State/Province <span class="required">*</span></label>
                <input type="text" class="form-control @error('state_province') is-invalid @enderror" name="state_province" id="state_province" value="{{ $mode == 'add' ? old('state_province') : $admin->state_province }}"/>
                @error('state_province')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="country" class="form-label">Country <span class="required">*</span></label>
                <select class="form-select @error('country') is-invalid @enderror" id="country" name="country">
                    <option selected="" disabled="">Select Country</option>
                    <option value="ca" {{ $mode == 'add' ? (old('country') == 'ca' ? 'selected' : '') : ($admin->country == 'ca' ? 'selected' : '') }}>Canada</option>
                    <option value="us" {{ $mode == 'add' ? (old('country') == 'us' ? 'selected' : '') : ($admin->country == 'us' ? 'selected' : '') }}>USA</option>
                </select>
                @error('country')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="timezone" class="form-label">Timezone <span class="required">*</span></label>
                <select class="form-select @error('timezone') is-invalid @enderror" id="timezone" name="timezone">
                    <option selected="" disabled="">Select Timezone</option>
                    <option value="PST" {{ $mode == 'add' ? (old('timezone') == 'PST' ? 'selected' : '') : ($admin->timezone == 'PST' ? 'selected' : '') }}>PST</option>
                    <option value="MST" {{ $mode == 'add' ? (old('timezone') == 'MST' ? 'selected' : '') : ($admin->timezone == 'MST' ? 'selected' : '') }}>MST</option>
                    <option value="CST" {{ $mode == 'add' ? (old('timezone') == 'CST' ? 'selected' : '') : ($admin->timezone == 'CST' ? 'selected' : '') }}>CST</option>
                    <option value="EST" {{ $mode == 'add' ? (old('timezone') == 'EST' ? 'selected' : '') : ($admin->timezone == 'EST' ? 'selected' : '') }}>EST</option>
                    <option value="Other" {{ $mode == 'add' ? (old('timezone') == 'Other' ? 'selected' : '') : ($admin->timezone == 'Other' ? 'selected' : '') }}>Other</option>
                </select>
                @error('timezone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->

    <button type="submit" class="btn btn-success submit">Save Changes</button>
    <a href="{{ route('all.admin') }}" class="btn btn-info">Cancel</a>
</form>
