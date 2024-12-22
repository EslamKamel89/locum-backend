@extends('web.layouts.layout')
@section('content')
    <!-- Navbar  -->
    <!-- connect with consultant  -------------------------------------------------->
    <section id="connectWithConsultant">
        <div class="px-3 py-5 container-lg">
            <div class="mb-3">
                <div class="row g-0">
                    <!-- card  -------------------------------------------------->
                    <div class="mt-4 bg-transparent col-md-6 mt-md-0 wow fadeIn">
                        <div class="p-3 mx-2 mb-3 text-white shadow-lg card rounded-3" style="background-color: #2b304150">
                            <div class="card-body">
                                
                                <h3 class="card-title text-uppercase main-title" style="line-height: 65px;font-size: 33px;">
                                   Finding the best possible matches for your coverage needs
                                </h3>
                               
                            </div>
                        </div>
                    </div>
                    <!-- card  -->
                    <!-- form  -------------------------------------------------->
                    <div class="p-3 bg-white border shadow-lg col-md-6 rounded-3 wow fadeIn">
                        @if (session('success'))
                            <div class="alert alert-success"> {{ session('success') }} </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('facilities.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row col-md-12">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Name Of Facility <span
                                            style="color: red;">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Name Of Facility" />
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-2 row col-md-12">
                              <div class="col-md-12">
                                    <label for="street" class="form-label">Street<span
                                            style="color: red;">*</span></label>
                                    <input type="text" name="street" class="form-control" placeholder="Street" />
                                    @error('street')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                            </div>
                            <div class="col-md-6">
                                    <label for="name" class="form-label">City<span
                                            style="color: red;">*</span></label>
                                    <select name="city_id" id="city_id" class="form-control">
                                        <option value="">Select City</option>

                                    </select>
                                    @error('city_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="form-label">State <span
                                            style="color: red;">*</span></label>
                                    <select name="state_id" id="state_id" class="form-control" onchange="getcities(this.value)">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}" >{{ $state->name }}</option>

                                        @endforeach
                                    </select>
                                    @error('state_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                              
                            <div class="row col-md-12 ">
                                <hr class="my-2 w-100" />
                                <h4 class="my-3">Point of Contact</h4>
                                <div class="col-md-6">
                                    <label for="fname" class="form-label"> First Name <span
                                            style="color: red;">*</span></label>
                                    <input type="text" name="fname" class="form-control" placeholder="First Name" />
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="last-name" class="form-label"> Last Name <span
                                            style="color: red;">*</span></label>
                                    <input type="text" name="lname" class="form-control" placeholder="Last Name" />
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email<span style="color: red;">*</span></label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone<span style="color: red;">*</span></label>
                                <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="coverage_need" class="form-label">Coverage Needs<span style="color: red;">*</span></label>
                                <textarea name="coverage_need" class="form-control" placeholder="Enter coverage needs"></textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="px-5 btn btn-primary btn-lg">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- form  -->
                </div>
            </div>
        </div>
    </section>
    <!-- connect with consultant  -->
    <!-- RECRUITMENT PARTNER -------------------------------------------------->
   

    <!-- Testimonials -->
    <!-- custoemr service -------------------------------------------------->
    <section class="pt-5 bg-light wow fadeIn">
        <div class="px-3 py-5 container-lg">
            <div class="row">
                <!-- item 1 -------------------------------------------------->
                <div class="mb-5 col-md-6 d-flex justify-content-center mb-md-0">
                    <div
                        class="p-5 border rounded shadow-lg w-75 border-secondary rounded-5 text-bg-secondary d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-5 w-100 position-relative">
                            <img src="{{ asset('web/images/Hayes-Consultant-Sidebar@2x.png') }}" alt="Image not found"
                                class="rounded-circle position-absolute start-50 translate-middle" width="100"
                                height="100" style="top: -50px" />
                        </div>
                        <h1 class="text-center">TALK WITH A CONSULTANT</h1>
                        <p class="text-center">
                            Let our specialized consultants help you.
                        </p>
                        <button class="gap-2 mx-auto my-2 btn btn-primary hstack" style="width: fit-content">
                            <i class="text-white fa-solid fa-phone"></i>
                            <span>717-578-4737</span>
                        </button>
                    </div>
                </div>
                <!-- item 1 -->
                <!-- item 2 -------------------------------------------------->
                <div class="mt-5 col-md-6 d-flex justify-content-center mt-md-0">
                    <div
                        class="p-5 border rounded shadow-lg w-75 border-primary rounded-5 text-bg-primary d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-5 w-100 position-relative">
                            <img src="{{ asset('web/images/Hayes-JobAlerts.png') }}" alt="Image not found"
                                class="rounded-circle position-absolute start-50 translate-middle" width="100"
                                height="100" style="top: -50px" />
                        </div>
                        <h1 class="text-center">SIGN UP FOR LOCUMS JOB ALERTS</h1>
                        <p class="text-center">
                            We'll keep you updated with new opportunities.
                        </p>
                        <a href={{route('providers.create')}} class="gap-2 mx-auto my-2 btn btn-dark hstack" style="width: fit-content">
                            <i class="fa-solid fa-envelope text-primary"></i>
                            <span>SignUp</span>
                        </a>
                    </div>
                </div>
                <!-- item 2 -->
            </div>
        </div>
    </section>
    <!-- custoemr service -->
    <!-- Footer -------------------------------------------------->

@endsection
