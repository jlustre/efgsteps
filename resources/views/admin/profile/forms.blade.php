
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Update Admin Profile</h6>
            <form method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data" class="forms-sample">
            @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Fullname <span class="required">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $profileData->name }}" autocomplete="off">
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="current_rank" class="form-label">Rank <span class="required">*</span></label>
                            <select class="form-select" id="current_rank" name="current_rank">
                                <option {{ $profileData->current_rank === 'FA' ? 'selected' : '' }} value="FA">Field Associate (FA)</option>
                                <option {{ $profileData->current_rank === 'SFA' ? 'selected' : '' }} value="SFA">Field Associate (SFA)</option>
                                <option {{ $profileData->current_rank === 'SM' ? 'selected' : '' }} value="SM">Sales Manager (SM)</option>
                                <option {{ $profileData->current_rank === 'ED' ? 'selected' : '' }} value="ED">Executive Director (ED)</option>
                            </select>
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username <span class="required">*</span></label>
                            <input type="text" class="form-control" name="username" id="username" value="{{ $profileData->username }}" autocomplete="off">
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="sponsor" class="form-label">Sponsor <span class="required">*</span></label>
                            <input type="text" class="form-control" name="sponsor" id="sponsor" value="{{ $profileData->sponsor }}" autocomplete="off">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                 <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address <span class="required">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $profileData->email }}" autocomplete="off">
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone <span class="required">*</span></label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $profileData->phone }}" autocomplete="off">
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="role" class="form-label">Role <span class="required">*</span></label>
                            <select class="form-select" id="role" name="role">
                                <option {{ $profileData->role === 'user' ? 'selected' : '' }} value="user">Member</option>
                                <option {{ $profileData->role === 'admin' ? 'selected' : '' }} value="admin">Administrator</option>
                                <option {{ $profileData->role === 'trainor' ? 'selected' : '' }} value="trainer">Trainer (CFT)</option>
                            </select>
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="city_town" class="form-label">City</label>
                            <input type="text" class="form-control" name="city_town" id="city_town" value="{{ $profileData->city_town }}" autocomplete="off">
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="state_province" class="form-label">State/Province</label>
                            <input type="text" class="form-control" name="state_province" id="state_province" value="{{ $profileData->state_province }}" autocomplete="off">
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="country" class="form-label">Country <span class="required">*</span></label>
                            <select class="form-select" id="country" name="country">
                                <option {{! $profileData->country ? 'selected' : '' }} disabled>Select your Country</option>
                                <option {{ $profileData->country === 'ca' ? 'selected' : '' }} value="ca">Canada (CA)</option>
                                <option {{ $profileData->country === 'us' ? 'selected' : '' }} value="us">USA (US)</option>
                            </select>
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row">
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <img id="showImage" class="wd-80 rounded-circle" src="{{ !empty($profileData->photo) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg')  }}" alt="profile photo">
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-9">
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo <span class="required">*</span></label>
                            <input type="file" class="form-control" name="photo" id="image">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <button type="submit" class="btn btn-primary submit">Save Changes</button>
            </form>
    </div>
</div>


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
