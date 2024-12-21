@extends('web.layouts.layout')
@section('content')
    <!-- Hero section  -------------------------------------------------->
    <header class="">
        <div class="py-5 d-flex justify-content-center" style="background-color: #2b304150; height: 77vh">
            <div class="container-lg row">
                <!-- Hero title  -------------------------------------------------->
                <div class="mx-auto col-md-12 d-flex flex-column justify-content-center align-items-center align-items-lg-start wow bounceInLeft"
                    data-wow-duration="2s" style="">
                    <p class="text-uppercase text-light">
                        Your full service locum tenens agency
                    </p>
                    <h1 class="mt-0 text-center main-title text-uppercase text-light text-md-start lh-1">
                        We advocate for the best rates and flexibility for you.
                    </h1>
                    <div class="row">
                        <div class="m-1 col-md-5">
                            <a class="btn btn-success fw-bold wow pulse infinite" href="{{ route('facilities.create') }}">Facilities</a>
                        </div>
                        <div class="m-1 col-md-5">
                            <a class="btn btn-primary fw-bold wow pulse infinite" href="{{ route('providers.create') }}">Providers
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Hero title  -->
                <!-- Hero dropdown  -------------------------------------------------->

                <!-- Hero dropdown  -->
            </div>
        </div>
    </header>
    <!-- Hero section  -->
    <!-- Features for providers and medical facilities  -------------------------------------------------->
    <div id="sectionBackground" class="py-5 d-flex justify-content-center w-100 wow fadeIn" data-wow-duration="2s">
        <div class="px-5 row container-lg px-md-0">
            <!-- Providers section  -------------------------------------------------->
            <div class="px-4 col-md-6 mb-md-0 wow bounceInLeft" data-wow-duration="2s">
                <div class="gap-3 d-flex flex-column justify-content-between align-items-center h-100">
                    <img src="{{ asset('web/images/Hayes-For-Providers-Feature-1.png') }}" alt="Image not found"
                        class="img-fluid" />
                    <h3 class="text-white fw-bold text-uppercase">For Providers</h3>
                    <p class="text-center text-light">
                        AmPm is here for you! We assist you from A to Z, from helping you
                        find jobs that fit your preferences, negotiating pay rates and
                        bonuses, to assisting with travel and additional needs.
                    </p>
                    <p class="text-center text-light ">
                        With over 40 years of collective experience, our job placement
                        specialists are dedicated to efficiency, simplifying processes,
                        and make tasks more convenient for you.
                    </p>
                    <a class="btn btn-primary btn-lg" href="{{ route('providers.create') }}">Search Jobs</a>
                </div>
            </div>
            <!-- Providers section  -->
            <!-- medical facilities section  -------------------------------------------------->
            <div class="px-4 col-md-6 mb-md-0 wow bounceInRight" data-wow-duration="2s">
                <div class="gap-3 d-flex flex-column justify-content-between align-items-center h-100">
                    <img src="{{ asset('web/images/Hayes_ForFacilities-Feature.png') }}" alt="Image not found"
                        class="img-fluid" />
                    <h3 class="text-white fw-bold text-uppercase">
                        For Medical Facilities
                    </h3>
                    <p class="text-center text-light ">
                        AmPm is dedicated to filling your staffing needs. We strive to do
                        our best to ensure your team can provide consistent, high-quality
                        care without interruption.
                    </p>
                    <p class="text-center text-light ">
                        Our services are designed to support your immediate staffing
                        needs, with the potential for permanent hire. Our streamlined,
                        seamless process makes it easy to onboard
                    </p>
                    <p class="text-center text-light ">
                        qualified professionals. We also offer dedicated account
                        management and support
                    </p>
                    <a href="{{ route('facilities.create') }}" class="btn btn-primary btn-lg">Request Coverage</a>
                </div>
            </div>
            <!-- medical facilities section  -->
        </div>
    </div>
    <!-- Features for providers and medical facilities  -->
    <!-- About us section  -------------------------------------------------->
    <div class="p-3 bg-light row wow fadeIn" data-wow-duration="2s">
        <div class="mx-auto content-section col-md-6">
            <div >
                <h1 class="mb-0 lh-sm fw-bold"> Am to Pm, we are at your service! </h1>
                <h1 class="mt-0 lh-sm text-primary fw-bold"> Turn your time into opportunity - explore Locum Tenens
                    opportunities with us. </h1>
            </div>
            <h3 class="text-dark"> We do our best to match you with jobs that best suit you. </h3>
            <p class="text-dark"> AmPm was founded by locum staffing specialists and an emergency physician who have over 40
                years of collective experience in the locum industry. </p>
            <p class="text-dark"> A key pain point for healthcare providers is securing jobs that both maximize pay, and
                offer an enjoyable work environment that provides schedule flexibility. </p>
            <p class="text-dark"> We transfer this savings cost to you. Your passion for providing quality care for your
                patients is appreciated, and deserves to be appropriately rewarded. </p>
            <p class="text-dark"> Far too many locums companies charge facilities higher commissions, which leaves less
                money on the table for doctors and APP's. Instead, AmPm takes a smaller commission. </p>
                {{-- <button class="btn btn-primary btn-lg">About Us</button> --}}
        </div>
        <div class="col-md-6">
            <img src="{{ asset('web/images/photo.webp') }}" height="300" alt="Image not found"
            class="rounded img-fluid" style="border-radius: 25px !important" />
        </div>
    </div>
    <!-- About us section  -->
    <!-- Speciality grid  -------------------------------------------------->

    <!-- Speciality grid   -->
    <!-- video section  -------------------------------------------------->
    <div class="m-3 row wow fadeIn" data-wow-duration="2s">

        <div class="col-md-6">
            <img src="{{ asset('web/images/Screen-Shot-2023-07-10-at-2.48.49-PM.jpg.webp') }}" alt="Image not found"
                class="rounded img-fluid" style="border-radius: 25px !important" />
        </div>
        <div class="col-md-6">
            <h1 class="mb-0 lh-sm fw-bold">
                We take pride in staffing our client medical facilities with quality
                clinicians
            </h1>
            <h1 class="mt-0 lh-sm text-primary fw-bold">
                who are dedicated to providing quality care.
            </h1>
        </div>
        <!-- <h3 class="text-center text-dark">
              See how our team works together to deliver care to patients who need it
              most.
            </h3> -->
    </div>
    <!-- video section  -->

    <!-- Testimonials -------------------------------------------------->
    <div id="reviewsSectionBackground">
        <div class="container gap-4 py-5 d-flex flex-column align-items-center"  style="background-color: #00ceff2e;">
            <!-- comma svg -------------------------------------------------->
            <div>
                <img src="{{ asset('web/images/comma-svg.svg') }}" alt="Image not found"
                    class="rounded rounded-3 img-fluid" />
            </div>
            <!-- comma svg -->
            <!-- Title -------------------------------------------------->
            <h2 class="text-center text-light">
                Turn Your Time Into Opportunity<br />
                Explore Locum Tenens Opportunities<br />
                with AMPM
            </h2>
            <!-- Title -->
            <!-- Coursel -------------------------------------------------->
            <!-- <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="w-100 d-flex justify-content-center">
                      <p
                        class="text-center w-50 d-block text-light fw-bold"
                        style="height: 80px"
                      >
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Laudantium, ratione.
                      </p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="w-100 d-flex justify-content-center">
                      <p
                        class="text-center w-50 d-block text-light fw-bold"
                        style="height: 80px"
                      >
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Laudantium, ratione.
                      </p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="w-100 d-flex justify-content-center">
                      <p
                        class="text-center w-50 d-block text-light fw-bold"
                        style="height: 80px"
                      >
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Laudantium, ratione.
                      </p>
                    </div>
                  </div>
                </div>
                <button
                  class="carousel-control-prev"
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide="prev"
                >
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button
                  class="carousel-control-next"
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide="next"
                >
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div> -->
            <!-- Coursel -->
        </div>
    </div>
    <!-- Testimonials -->
    <!-- custoemr service -------------------------------------------------->
    <section class="pt-5 bg-light">
        <div class="px-3 py-5 container-lg" >
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
                        <button class="gap-2 mx-auto my-2 btn btn-dark hstack" style="width: fit-content">
                            <i class="fa-solid fa-envelope text-primary"></i>
                            <span>SignUp</span>
                        </button>
                    </div>
                </div>
                <!-- item 2 -->
            </div>
        </div>
    </section>
    <!-- custoemr service -->

    {{-- Modal Form --}}
    {{-- Modal Form --}}
@endsection
