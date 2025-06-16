<div class="card shadow-sm rounded mb-3 wow fadeInUp" data-wow-delay="0.4s"">
    <div class="card-body p-3">
        <div class="d-md-flex align-items-center gap-3 mb-3">
            <div class="flex-shrink-0 text-center mb-3 mb-md-0">
                <img src="{{ $member->profile_photo_url ?? 'https://picsum.photos/100/100?random=705' }}"
                     class="img-fluid rounded-circle" style="width: 80px; height: 80px;" alt="Profile Photo">
            </div>
            <div class="flex-grow-1">
                <h6 class="mb-1">{{ $member->first_name }} {{ $member->last_name }} ({{ $member->member_id }})</h6>
                <p class="text-muted small mb-1">{{ $member->email }}</p>
                <span class="badge bg-{{ $member->is_active ? 'success' : 'secondary' }}">
                    {{ $member->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>

        <div class="row text-sm mb-2">
            <div class="col-md-4 col-sm-6 mb-1"><strong>Mobile:</strong> {{ $member->mobile ?? 'N/A' }}</div>
            <div class="col-md-4 col-sm-6 mb-1"><strong>Gender:</strong> {{ ucfirst($member->gender) ?? 'N/A' }}</div>
            <div class="col-md-4 col-sm-6 mb-1"><strong>Zip Code:</strong> {{ $member->zipcode ?? 'N/A' }}</div>
            <div class="col-md-4 col-sm-6 mb-1"><strong>City:</strong> {{ optional($member->city)->name ?? 'N/A' }}</div>
            <div class="col-md-4 col-sm-6 mb-1"><strong>State:</strong> {{ optional($member->state)->name ?? 'N/A' }}</div>
            <div class="col-md-4 col-sm-6 mb-1"><strong>Region:</strong> {{ optional($member->region)->name ?? 'N/A' }}</div>
            <div class="col-md-4 col-sm-6 mb-1"><strong>Club:</strong> {{ optional(\App\Models\Club::find($member->club_id))->name ?? 'N/A' }}</div>
            <div class="col-md-4 col-sm-6 mb-1"><strong>Zone:</strong> {{ optional(\App\Models\Zone::find($member->zone_id))->name ?? 'N/A' }}</div>
            <div class="col-md-4 col-sm-6 mb-1"><strong>Occupation:</strong> {{ optional($member->occupation)->name ?? 'N/A' }}</div>
            <div class="col-md-4 col-sm-6 mb-1"><strong>Birthdate:</strong> {{ $member->birthdate ? \Carbon\Carbon::parse($member->birthdate)->format('d M Y') : 'N/A' }}</div>
            <div class="col-md-4 col-sm-6 mb-1"><strong>Join Date:</strong> {{ $member->join_date ? \Carbon\Carbon::parse($member->join_date)->format('d M Y') : 'N/A' }}</div>
        </div>

        <hr class="my-2">

        <h6 class="small text-muted mb-1">Address</h6>
        <p class="small mb-0">
            {{ $member->address_line1 }} {{ $member->address_line2 }} {{ $member->address_line3 }}<br>
            {{ optional($member->city)->name ?? '' }},
            {{ optional($member->state)->name ?? '' }}
            {{ $member->zipcode }}
        </p>
    </div>
</div>
