<form id="myForm" method="POST" action="{{ $mode == 'add' ? route('admin.step.store.fap') : route('admin.update.step', $step->id) }}" class="forms-sample">
@csrf
    <input type="hidden" value="{{ $step ? $step->id : '' }}">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="title" class="form-label">Title <span class="required">*</span></label>
                <input type="text" class="form-control @error('instructions') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}"/>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="instructions" class="form-label">Instructions</label>
                <textarea class="form-control @error('instructions') is-invalid @enderror" name="instructions" id="instructions" rows="3">{{  old('instructions') }}</textarea>
                @error('instructions')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label for="nthDayTarget" class="form-label">Nth Day Target <span class="required">*</span></label>
                <input type="text" class="form-control" name="nthDayTarget" id="nthDayTarget" value="{{ old('nthDayTarget') }}"/>
                @error('nthDayTarget')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-4">
            <div class="mb-3">
                <label for="sequence" class="form-label">Sequence No.</label>
                <select class="form-select @error('sequence') is-invalid @enderror" id="sequence" name="sequence">
                    <option {{ old('sequence') == "1" ? 'selected' : '' }} value="1">1</option>
                    <option {{ old('sequence') == "2" ? 'selected' : '' }} value="2">2</option>
                    <option {{ old('sequence') == "3" ? 'selected' : '' }} value="3">3</option>
                    <option {{ old('sequence') == "4" ? 'selected' : '' }} value="4">4</option>
                    <option {{ old('sequence') == "5" ? 'selected' : '' }} value="5">5</option>
                    <option {{ old('sequence') == "6" ? 'selected' : '' }} value="6">6</option>
                    <option {{ old('sequence') == "7" ? 'selected' : '' }} value="7">7</option>
                    <option {{ old('sequence') == "8" ? 'selected' : '' }} value="8">8</option>
                    <option {{ old('sequence') == "9" ? 'selected' : '' }} value="9">9</option>
                </select>
                @error('sequence')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-4">
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <select class="form-select" id="country" name="country">
                    <option {{ !$step ? 'selected' : ($step->country == 'ca' ? 'selected' : '')}} value="ca">Canada (CA)</option>
                    <option {{ !$step ? '' : ($step->country == 'us' ? 'selected' : '') }} value="us">USA (US)</option>
                </select>
            </div>
        </div><!-- Col -->
    </div><!-- Row -->

    <button type="submit" class="btn btn-success submit">Save Changes</button>
    <a href="{{ route('admin.checklist.fap') }}" class="btn btn-info">Cancel</a>
</form>



