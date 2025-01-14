<div class="mt-0 tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="setting-tab">
    <div class="row">
        <div class="mt-0">
            <div class="mb-4 card" style="margin-bottom: 6rem !important">
                <div class="text-white card-header bg-primary">Hospital Information</div>
                <div class="card-body">
                    {{-- Sub header --}}
                    <h5 class="card-title">Info</h5>
                    <form action="{{ route('healthcare.update-profile', Auth::user('web')->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-2 col-md-6">
                                <label for="facility_name">Facility Name</label>
                                <input type="text" class="form-control" id="facility_name" name="facility_name"
                                    placeholder="facility_name" value="{{ $hospital->facility_name }}" required>
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="type">Hospital Type</label>
                                <input type="text" class="form-control" id="type" name="type"
                                    placeholder="type" value="{{ $hospital->type }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-6">
                                <label for="district_id">City</label>
                                <select name="district_id" id="district_id" class="form-control">
                                    <option value="">Select District</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}"
                                            {{ Auth::user()->district_id === $district->id ? 'selected' : '' }}>
                                            {{ $district->name }}</option>
                                    @endforeach
                                </select>
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

                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-6">
                                <label for="type">Address 1</label>
                                <input list="address-suggestions" name="address" id="address"
                                    class="form-control custom-input" placeholder="Start typing address..."
                                    value="{{ $hospital->address }}">
                                <datalist id="address-suggestions">
                                    <!-- الاقتراحات ستتم إضافتها هنا -->
                                </datalist>
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="type">Address 2 <i class="text-muted">(optional)</i></label>
                                <input list="address2-suggestions" type="text" class="form-control custom-input"
                                    id="address2" name="address2" placeholder="Enter Address... "
                                    value="{{ $hospital->address2 }}">
                                <datalist id="address2-suggestions">
                                    <!-- الاقتراحات ستتم إضافتها هنا -->
                                </datalist>
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
                            <div class="p-3 bg-white shadow ">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addressInputs = document.querySelectorAll('#address, #address2');
        const datalist = document.getElementById('address-suggestions');

        addressInputs.forEach(input => {
            input.addEventListener('input', async function() {
                const query = this.value;
                if (query.length >= 3) {
                    try {
                        const response = await fetch(
                            `https://nominatim.openstreetmap.org/search?q=${query}&format=json`
                        );
                        const data = await response.json();

                        if (data.length > 0) {
                            const lat = data[0].lat;
                            const lon = data[0].lon;

                            // تخزين الإحداثيات في LocalStorage
                            localStorage.setItem('lat', lat);
                            localStorage.setItem('lon', lon);

                            // إرسال الإحداثيات إلى الجلسة عبر AJAX
                            await fetch('/set-coordinates', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        'content')
                                },
                                body: JSON.stringify({
                                    lat,
                                    lon
                                })
                            });

                            // تحديث datalist
                            const suggestions = data.map(item => item.display_name);
                            datalist.innerHTML = '';
                            suggestions.forEach(suggestion => {
                                const option = document.createElement('option');
                                option.value = suggestion;
                                datalist.appendChild(option);
                            });
                        }
                    } catch (error) {
                        console.error('Error fetching data from OpenStreetMap API', error);
                    }
                }
            });
        });

    });
</script>
