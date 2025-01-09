<div class="mt-0 tab-pane fade" id="specialities" role="tabpanel" aria-labelledby="specilaty-tab">

    <div class="row">
        <div class="mt-0">
            <div class="mb-4 card" style="margin-bottom: 6rem !important">
                <div class="text-white card-header bg-primary">Specialities & Services</div>
                <div class="card-body">
                    {{-- Sub header --}}
                    <h5 class="card-title">Info</h5>
                    <form action="{{ route('healthcare.update', Auth::user()->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="row">
                                <div class="mb-2 col-md-6">
                                    <label for="specialties" class="form-label">Medical Specialties</label>
                                     <select id="specialties" name="specialties"
                                        class="form-select" multiple required>
                                        <option value="cardiology">Cardiology</option>
                                        <option value="neurology">Neurology</option>
                                        <option value="pediatrics">Pediatrics</option>
                                        <option value="orthopedics">Orthopedics</option>
                                        <option value="dermatology">Dermatology</option>
                                    </select>

                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="services" class="form-label">Services Offered</label>
                                    <select id="services" name="services" class="form-select" multiple required>
                                        <option value="emergencyCare">Emergency Care</option>
                                        <option value="outpatientSurgery">Outpatient Surgery</option>
                                        <option value="imagingServices">Imaging Services</option>
                                        <option value="laboratoryServices">Laboratory Services</option>
                                        <option value="physicalTherapy">Physical Therapy</option>
                                    </select>
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
