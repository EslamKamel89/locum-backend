<div class="mt-0 tab-pane fade" id="specialities" role="tabpanel" aria-labelledby="specilaty-tab">

    <div class="row">
        <div class="mt-0">
            <div class="mb-4 card" style="margin-bottom: 6rem !important">
                <div class="text-white card-header bg-primary">Specialities & Services</div>
                <div class="card-body">
                    {{-- Sub header --}}
                    <h5 class="card-title">Info</h5>
                    <form action="{{ route('healthcare.update-profile', Auth::user()->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="row">
                                <div class="mb-2 col-md-6">
                                    <label for="specialties" class="form-label">Medical Specialties</label>
                                    <select id="specialties" name="specialty_id[]" class="form-select" multiple
                                        required>
                                        @foreach ($specialties as $specialty)
                                            <option value="{{ $specialty->id }}"
                                                @if ($hospitalSpecialties->contains('name', $specialty->name)) selected @endif>
                                                {{ $specialty->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="services" class="form-label">Services Offered</label>
                                    <input id="services" name="services_offered" class="form-control" value="{{ $hospital->services_offered }}" required>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-6">
                                <label for="type">number of beds</label>
                                <input type="text" class="form-control" id="number_of_beds" name="number_of_beds"
                                    placeholder="number_of_beds" value="{{ $hospital->number_of_beds }}" required>
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
