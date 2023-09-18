<div class="card rounded">
    @php
        $rank['FA'] = 'Field Associate (FA)';
        $rank['SM'] = 'Senior Field Associate (SFA)';
        $rank['SM'] = 'Sales Manager (SM)';
        $rank['SM'] = 'Executive Director (ED)';
    @endphp
    <div class="card-body">
    <div class="d-flex align-items-center justify-content-between mb-2">
        <div>
        <img class="wd-70 rounded-circle" src="{{ !empty($profileData->photo) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg')  }}" alt="profile photo">
        <span class="h4 ms-3">{{ $profileData->username }}</span>
        </div>
    </div>
    <div class="mt-2">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
        <p class="text-muted">{{ $profileData->name }}</p>
    </div>
    <div class="mt-2">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Current Rank:</label>
        <p class="text-muted">{{ $rank[$profileData->current_rank] }}</p>
    </div>
    <div class="mt-2">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Sponsor:</label>
        <p class="text-muted">{{ $profileData->sponsor }}</p>
    </div>
    <div class="mt-2">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Role:</label>
        <p class="text-muted">{{ $profileData->role == 'trainor' ? 'Certified Field Trainor' :  $profileData->role }}</p>
    </div>
    <div class="mt-2">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
        <p class="text-muted">{{ $profileData->email }}</p>
    </div>
    @if (!empty($profileData->phone))
    <div class="mt-2">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
        <p class="text-muted">{{ $profileData->phone }}</p>
    </div>
    @endif

    @php
        $full_address = '';
        $full_address = !empty($profileData->city_town) ? $profileData->city_town . ', ' : '' ;
        $full_address .= !empty($profileData->state_province) ? $profileData->state_province . ' ' : '' ;
        $full_address .= $profileData->country == 'us' ? 'USA' : 'Canada';
    @endphp
    <div class="mt-2">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives In:</label>
        <p class="text-muted">{{ $full_address }}</p>
    </div>

    <div class="mt-2">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
        <p class="text-muted">{{ $profileData->created_at }}</p>
    </div>

    <div class="mt-2">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Member Status:</label>
        <p class="text-muted">{{ $profileData->status == 1 ? 'Active' : 'Inactive' }}</p>
    </div>

    <div class="mt-2 d-flex social-links">
        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
        <i data-feather="github"></i>
        </a>
        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
        <i data-feather="twitter"></i>
        </a>
        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
        <i data-feather="instagram"></i>
        </a>
    </div>
    </div>
</div>
