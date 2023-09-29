<form id="myForm" method="POST" action="{{ $mode == 'add' ? route('store.admin') : route('update.admin', $admin->id) }}" class="forms-sample" enctype="multipart/form-data">
@csrf
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="name" class="form-label text-primary">Name <span class="required">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $mode == 'add' ? old('name') : $admin->name }}"/>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->

        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="username" class="form-label text-primary">UserName <span class="required">*</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Username must have: 6-28 characters and no space">
                        <i class="link-icon" data-feather="help-circle"></i>
                    </span>
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
                <label for="password" class="form-label text-primary">Password <span class="required">*</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Password must have: minimum 6 char, has at least 1 each of uppercase, lowercase, and special characters (!*$#%)">
                        <i class="link-icon" data-feather="help-circle"></i>
                    </span>
                </label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ $mode == 'add' ? old('password') : $admin->password }}"/>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="password_confirmation" class="form-label text-primary">Confirm Password <span class="required">*</span></label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"/>
            </div>
        </div><!-- Col -->
    @endif
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="sponsor" class="form-label text-primary">Sponsor <span class="required">*</span>
                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Sponsor must be the Username of an active member of our site">
                    <i class="link-icon" data-feather="help-circle"></i>
                </span>
                </label>
                <input type="text" class="form-control @error('sponsor') is-invalid @enderror" name="sponsor" id="sponsor" value="{{ $mode == 'add' ? old('sponsor') : $admin->sponsor }}"/>
                @error('sponsor')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->

        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="email" class="form-label text-primary">Email <span class="required">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $mode == 'add' ? old('email') : $admin->email }}"/>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->

        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="phone" class="form-label text-primary">Phone <span class="required">*</span></label>
                <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $mode == 'add' ? old('phone') : $admin->phone }}"/>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->

        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="current_rank" class="form-label text-primary">Current Rank<span class="required">*</span></label>
                <select class="form-select @error('current_rank') is-invalid @enderror" id="current_rank" name="current_rank">
                    <option selected="" disabled="">Select Rank</option>
                    <option value="1" {{ $mode == 'add' ? (old('current_rank') == '1' ? 'selected' : '') : ($admin->current_rank == '1' ? 'selected' : '') }}>Field Advisor (FA)</option>
                    <option value="2" {{ $mode == 'add' ? (old('current_rank') == '2' ? 'selected' : '') : ($admin->current_rank == '2' ? 'selected' : '') }}>Senior Field Advisor (SFA)</option>
                    <option value="3" {{ $mode == 'add' ? (old('current_rank') == '3' ? 'selected' : '') : ($admin->current_rank == '3' ? 'selected' : '') }}>Senior Manager (SM)</option>
                    <option value="4" {{ $mode == 'add' ? (old('current_rank') == '4' ? 'selected' : '') : ($admin->current_rank == '4' ? 'selected' : '') }}>Executive Director (ED)</option>
                </select>
                @error('current_rank')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->

        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="role" class="form-label text-primary">Role Name <span class="required">*</span></label>
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
                <label for="city_town" class="form-label text-primary">City <span class="required">*</span></label>
                <input type="text" class="form-control @error('city_town') is-invalid @enderror" name="city_town" id="city_town" value="{{ $mode == 'add' ? old('city_town') : $admin->city_town }}"/>
                @error('city_town')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->

        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="state_province" class="form-label text-primary">State/Province <span class="required">*</span></label>
                <input type="text" class="form-control @error('state_province') is-invalid @enderror" name="state_province" id="state_province" value="{{ $mode == 'add' ? old('state_province') : $admin->state_province }}"/>
                @error('state_province')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label for="country" class="form-label text-primary">Country <span class="required">*</span></label>
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
                <label for="timezone" class="form-label text-primary">Timezone <span class="required">*</span></label>
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

    <div class="row"><!-- Row -->
        <div class="col-sm-2">
            <div class="mb-3">
                <img id="showImage" class="wd-80 rounded-circle" src="{{ !empty($admin->photo) ? url('upload/admin_images/'.$admin->photo) : url('upload/no_image.jpg')  }}" alt="profile photo">
            </div>
        </div><!-- Col -->
        <div class="col-sm-4">
            <div class="mb-3">
                <label for="photo" class="form-label text-primary">Photo <span class="required">*</span></label>
                <input type="file" class="form-control" name="photo" id="image">
            </div>
        </div><!-- Col -->

        <div class="col-sm-6">
            <button type="submit" class="btn btn-success submit">Save Changes</button>
            <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
        </div><!-- Col -->
    </div><!-- Row -->


</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
