
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Change Admin Password</h6>
            <form method="POST" action="{{ route('admin.update.password') }}" enctype="multipart/form-data" class="forms-sample">
            @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Old Password <span class="required">*</span></label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="old_password">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password <span class="required">*</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password <span class="required">*</span></label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <button type="submit" class="btn btn-primary submit">Submit form</button>
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