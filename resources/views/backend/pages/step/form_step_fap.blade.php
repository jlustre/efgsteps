<form id="myForm" method="POST" action="{{ $mode == 'add' ? route('store.step.fap') : route('update.step.fap', $step->id) }}" class="forms-sample">
@csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="title" class="form-label">Title <span class="required">*</span></label>
                <input type="text" class="form-control @error('instructions') is-invalid @enderror" name="title" id="title" value="{{ $mode == 'add' ? old('title') : $step->title }}"/>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="instructions" class="form-label">Instructions</label>
                <textarea class="form-control @error('instructions') is-invalid @enderror" name="instructions" id="instructions" rows="3">{{  $mode == 'add' ? old('instructions') : $step->instructions }}</textarea>
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
                <input type="text" class="form-control" name="nthDayTarget" id="nthDayTarget" value="{{ $mode == 'add' ? old('nthDayTarget') : $step->nthDayTarget }}"/>
                @error('nthDayTarget')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-sm-4">
            <div class="mb-3">
                <label for="sequence" class="form-label">Sequence No.</label>
                <select class="form-select @error('sequence') is-invalid @enderror" id="sequence" name="sequence">
                    <option {{ $mode == 'add' ? (old('sequence') == "1" ? 'selected' : '') : ($step->sequence == '1' ? 'selected' : '') }} value="1">1</option>
                    <option {{ $mode == 'add' ? (old('sequence') == "2" ? 'selected' : '') : ($step->sequence == '2' ? 'selected' : '') }} value="2">2</option>
                    <option {{ $mode == 'add' ? (old('sequence') == "3" ? 'selected' : '') : ($step->sequence == '3' ? 'selected' : '') }} value="3">3</option>
                    <option {{ $mode == 'add' ? (old('sequence') == "4" ? 'selected' : '') : ($step->sequence == '4' ? 'selected' : '') }} value="4">4</option>
                    <option {{ $mode == 'add' ? (old('sequence') == "5" ? 'selected' : '') : ($step->sequence == '5' ? 'selected' : '') }} value="5">5</option>
                    <option {{ $mode == 'add' ? (old('sequence') == "6" ? 'selected' : '') : ($step->sequence == '6' ? 'selected' : '') }} value="6">6</option>
                    <option {{ $mode == 'add' ? (old('sequence') == "7" ? 'selected' : '') : ($step->sequence == '7' ? 'selected' : '') }} value="7">7</option>
                    <option {{ $mode == 'add' ? (old('sequence') == "8" ? 'selected' : '') : ($step->sequence == '8' ? 'selected' : '') }} value="8">8</option>
                    <option {{ $mode == 'add' ? (old('sequence') == "9" ? 'selected' : '') : ($step->sequence == '9' ? 'selected' : '') }} value="9">9</option>
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
                    <option {{ $country == 'ca' ? 'selected' : ''}} value="ca">Canada (CA)</option>
                    <option {{ $country == 'us' ? 'selected' : '' }} value="us">USA (US)</option>
                </select>
            </div>
        </div><!-- Col -->
    </div><!-- Row -->

    <button type="submit" class="btn btn-success submit">Save Changes</button>
    <a href="{{ route('all.steps.fap', $country) }}" class="btn btn-info">Cancel</a>
</form>
