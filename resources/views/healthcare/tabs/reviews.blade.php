<div class="mt-0 tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="setting-tab">
    <div class="mb-4 card" style="margin-bottom: 6rem !important">
        <div class="text-white card-header bg-primary">Hospital Reviews</div>
        <div class="card-body">
            {{-- Sub header --}}
            <h5 class="card-title">User Information</h5>
            <form action="{{ route('healthcare.update', Auth::user()->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-2 col-md-6">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                            value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="mb-2 col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{ Auth::user()->email }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-6">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="New Password">
                    </div>
                    <div class="mb-2 col-md-6">
                        <label for="state_id">State</label>
                        <select name="state_id" id="state_id" class="form-control">
                            <option value="">Select State</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}"
                                    {{ Auth::user()->state_id === $state->id ? 'selected' : '' }}>
                                    {{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-6">
                        <label for="district_id">District</label>
                        <select name="district_id" id="district_id" class="form-control">
                            <option value="">Select District</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}"
                                    {{ Auth::user()->district_id === $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-2 col-md-6">
                        <label for="facility_name">Facility Name</label>
                        <input type="text" class="form-control" id="facility_name" name="facility_name"
                            placeholder="facility_name" value="{{ $hospital->facility_name }}" required>
                    </div>
                    <div class="mb-2 col-md-6">
                        <label for="type">Hospital Type</label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="type"
                            value="{{ $hospital->type }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-6">
                        <label for="type">services offered</label>
                        <input type="text" class="form-control" id="services_offered" name="services_offered"
                            placeholder="services_offered" value="{{ $hospital->services_offered }}" required>
                    </div>
                    <div class="mb-2 col-md-6">
                        <label for="type">number of beds</label>
                        <input type="text" class="form-control" id="number_of_beds" name="number_of_beds"
                            placeholder="number_of_beds" value="{{ $hospital->number_of_beds }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-6">
                        <label for="type">website url</label>
                        <input type="text" class="form-control" id="website_url" name="website_url"
                            placeholder="website_url" value="{{ $hospital->website_url }}" required>
                    </div>
                    <div class="mb-2 col-md-6">
                        <label for="type">year established</label>
                        <input type="text" class="form-control" id="year_established" name="year_established"
                            placeholder="year_established" value="{{ $hospital->year_established }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-6">
                        <label for="type">website url</label>
                        <input type="text" class="form-control" id="website_url" name="website_url"
                            placeholder="website_url" value="{{ $hospital->website_url }}" required>
                    </div>
                    <div class="mb-2 col-md-12">
                        <label for="type">overview</label>
                        <textarea class="form-control" id="overview" rows="5" name="overview" placeholder="overview">{{ $hospital->overview }}</textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="p-3 bg-white shadow fixed-bottom border-top">
        <button type="submit" class="btn btn-primary btn-lg w-100">Save</button>
    </div>
</div>

