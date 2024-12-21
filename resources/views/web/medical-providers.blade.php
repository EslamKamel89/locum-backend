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
                                <h3 class="card-title">
                                    LOCUM HEALTHCARE RECRUITMENT FOR MEDICAL FACILITIES
                                </h3>
                                <h1 class="card-title text-uppercase main-title" style="line-height: 65px">
                                    Quality matches for quality care.
                                </h1>
                                <p class="card-text">
                                    This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit
                                    longer.
                                </p>
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
                            <form action="{{ route('providers.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <label for="first-name" class="form-label"> First Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" name="first_name" class="form-control"
                                            placeholder="First Name" />
                                        @error('first_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last-name" class="form-label"> Last Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" name="last_name" class="form-control"
                                            placeholder="Last Name" />
                                        @error('last_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="specialty_id" class="form-label"> Speciality <span
                                            style="color: red;">*</span></label>
                                    <select class="form-control" name="specialty_id">
                                        <option value="" disabled="" selected="" >Pick a Specialty</option>
			                <option value="" >All Specialties</option>
                            <option value="acute-care">Acute Care</option>
                            <option value="anesthesiology" >Anesthesiology</option>
                            <option value="cardiology" >Cardiology</option>
                            <option value="cardiothoracic-surgery">Cardiothoracic Surgery</option>
                            <option value="clinical-cardiac-electrophysiology" >Clinical Cardiac Electrophysiology</option>
                            <option value="critical-care-medicine">Critical Care Medicine</option>
                            <option value="dermatology">Dermatology</option>
                            <option value="dermatopathology">Dermatopathology</option>
                            <option value="emergency-medicine" >Emergency Medicine</option>
                            <option value="endocrinology-diabetes-and-metabolism">Endocrinology, Diabetes and Metabolism</option>
                            <option value="family-medicine" >Family Medicine</option>
                            <option value="gastroenterology" >Gastroenterology</option>
                            <option value="general-surgery" >General Surgery</option>
                            <option value="genetics">Genetics</option>
                            <option value="geriatric-medicine">Geriatric Medicine</option>
                            <option value="gynecologic-oncology">Gynecologic Oncology</option>
                            <option value="hospice-and-palliative-medicine" >Hospice and Palliative Medicine</option>
                            <option value="hospitalist" >Hospitalist</option>
                            <option value="infectious-disease" >Infectious Disease</option>
                            <option value="interventional-cardiology" >Interventional Cardiology</option>
                            <option value="maternal-fetal-medicine" >Maternal-Fetal Medicine</option>
                            <option value="neonatal-perinatal-medicine" >Neonatal-Perinatal Medicine</option>
                            <option value="nephrology" >Nephrology</option>
                            <option value="neurointerventional-surgery" >Neurointerventional Surgery</option>
                            <option value="neurology" >Neurology</option>
                            <option value="neurosurgery" >Neurosurgery</option>
                            <option value="ob-gyn" >OB-GYN</option>
                            <option value="ob-gyn-subspecialties" >OB-GYN Subspecialties</option>
                            <option value="occupational-medicine" >Occupational Medicine</option>
                            <option value="oncology" >Oncology</option>
                            <option value="ophthalmology" >Ophthalmology</option>
                            <option value="oral-maxillofacial-surgery" >Oral &amp; Maxillofacial Surgery</option>
                            <option value="ortho-subs" >Ortho Subs</option>
                            <option value="orthopedic-surgery" >Orthopedic Surgery</option>
                            <option value="otolaryngology" >Otolaryngology</option>
                            <option value="pathology" >Pathology</option>
                            <option value="pediatric-anesthesiology" >Pediatric Anesthesiology</option>
                            <option value="pediatric-cardiology" >Pediatric Cardiology</option>
                            <option value="pediatric-critical-care-medicine" >Pediatric Critical Care Medicine</option>
                            <option value="pediatric-emergency-medicine" >Pediatric Emergency Medicine</option>
                            <option value="pediatric-neurology" >Pediatric Neurology</option>
                            <option value="pediatric-otolaryngology" >Pediatric Otolaryngology</option>
                            <option value="pediatric-pathology" >Pediatric Pathology</option>
                            <option value="pediatric-pulmonary-disease" >Pediatric Pulmonary Disease</option>
                            <option value="pediatric-surgery" >Pediatric Surgery</option>
                            <option value="pediatrics" >Pediatrics</option>
                            <option value="physical-medicine-and-rehabilitation" >Physical Medicine and Rehabilitation</option>
                            <option value="plastic-surgery" >Plastic Surgery</option>
                            <option value="primary-care" >Primary Care</option>
                            <option value="psychiatry" >Psychiatry</option>
                            <option value="pulmonary-critical-care-medicine" >Pulmonary &amp; Critical Care Medicine</option>
                            <option value="pulmonary-disease" >Pulmonary Disease</option>
                            <option value="radiology" >Radiology</option>
                            <option value="reproductive-endocrinology-and-infertility" >Reproductive Endocrinology and Infertility</option>
                            <option value="rheumatology" >Rheumatology</option>
                            <option value="sports-medicine" >Sports Medicine</option>
                            <option value="trauma-surgery" >Trauma Surgery</option>
                            <option value="urgent-care" >Urgent Care</option>
                            <option value="urogynecology" >Urogynecology</option>
                            <option value="urology">Urology</option>
                            <option value="vascular-surgery">Vascular Surgery</option>
                                    </select>
                                    @error('specialty_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="years_of_experience" class="form-label">Years of Experience <span
                                            style="color: red;">*</span></label>
                                    <input type="text" name="years_of_experience" class="form-control"
                                        placeholder="Years of Experience " />
                                    @error('years_of_experience')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="shift_preference" class="form-label">Shift Preference <span
                                            style="color: red;">*</span></label>
                                    <input type="checkbox" value="days" name="shift_preference[]"
                                        class="mx-1 @error('shift_preference')
                                    error
                                @enderror"
                                        placeholder="" />Days
                                    <input type="checkbox" value="nights" name="shift_preference[]"
                                        class="mx-1 @error('shift_preference')
                                    error
                                @enderror"
                                        placeholder="" />Nights
                                    <input type="checkbox" value="Weekends" name="shift_preference[]"
                                        class="mx-1 @error('shift_preference')
                                    error
                                @enderror"
                                        placeholder="" />Weekends
                                    <input type="checkbox" value="Weekdays" name="shift_preference[]"
                                        class="mx-1 @error('shift_preference')
                                    error
                                @enderror"
                                        placeholder="" />Weekdays
                                    <input type="checkbox" value="No
                                Preference"
                                        name="shift_preference[]"
                                        class="mx-1 @error('shift_preference')
                                    error
                                @enderror"
                                        placeholder="" />No
                                    Preference
                                    @error('shift_preference')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="shifts_per_month" class="form-label">How many shifts/Month<span
                                            style="color: red;">*</span></label>
                                    <input type="number" class="form-control" name="shifts_per_month"
                                        placeholder="How many shifts/Month" />
                                    @error('shifts_per_month')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span
                                            style="color: red;">*</span></label>
                                    <input type="text" name="email" class="form-control"
                                        placeholder="Enter Email" />
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone<span
                                            style="color: red;">*</span></label>
                                    <input type="text" name="phone_number" class="form-control"
                                        placeholder="Enter Phone" />
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <p class="mb-5 text-center fw-lighter">
                                    By clicking "Submit," you are opting into receiving text
                                    messages regarding your inquiry with Hayes Locums. Message and
                                    data rates may apply. Message frequency may vary. You can opt
                                    out by responding STOP at any time. View our Terms and
                                    Conditions for more details.
                                </p>
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
    <section class="wow fadeIn">
        <div class="px-3 py-5 container-lg">
            <div class="row">
                <!-- Title and description -------------------------------------------------->
                <div class="col-md-6 pe-0 pe-md-3">
                    <div class="gap-2 d-flex flex-column justify-content-center">
                        <h1 class="text-center">YOUR RECRUITMENT PARTNER</h1>
                        <h3 class="text-center">
                            As an experienced locum healthcare recruitment agency, we know
                            each facility's needs are unique.
                        </h3>
                        <p class="text-center">
                            You expect locum tenens staffing companies to listen, understand
                            your search, and deliver only qualified healthcare providers.
                            Assisting you with locum tenens staffing and providing
                            award-winning service is our commitment to you. You can trust us
                            to put you and your patients first, every time.
                        </p>
                    </div>
                </div>
                <!-- Title and description -->
                <!-- Title and description -------------------------------------------------->
                <div class="col-md-6">
                    <img src="{{ asset('web/images/video.jpg') }}"
                        class="rounded shadow img-fluid object-fit-cover h-100" alt="Image not found" />
                </div>
                <!-- Title and description -->
            </div>
        </div>
    </section>
    <!-- RECRUITMENT PARTNER -->
    <!-- Features -------------------------------------------------->
    <section id="sectionBackground" class="wow fadeIn">
        <div class="px-3 py-5 container-lg">
            <div class="row">
                <!-- Title -------------------------------------------------->
                <div class="col-md-6">
                    <h1 class="text-white main-title">
                        <span class="text-primary lh-lg">DEDICATED TEAM </span>WITH A FOCUSED
                        APPROACH
                    </h1>
                </div>
                <!-- Title -->
                <!-- description -------------------------------------------------->
                <div class="col-md-6">
                    <div class="gap-2 text-white d-flex flex-column justify-content-center align-items-center">
                        <h3>
                            At Hayes Locums, we know that every facility is unique. That’s
                            why we spend time listening to your needs and understanding the
                            requirements of your search—so we can deliver the best possible
                            candidate.
                        </h3>
                        <p>
                            Your search is led by a dedicated team that puts your and your
                            patients' needs first. Once we know your requirements, our
                            specialty-specific consultants work closely with you to find the
                            right provider from our nationwide network. While your
                            consultant is your main point of contact, our entire team is
                            committed to developing long-term relationships, delivering
                            exemplary levels of service, and doing everything they can to
                            fill your position.
                        </p>
                    </div>
                </div>
                <!-- description -->
                <!-- Benefit1 -------------------------------------------------->
                <div class="col-md-6">
                    <p class="gap-1 d-inline-flex w-100">
                        <button class="btn btn-outline-primary border-light w-100" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false"
                            aria-controls="collapse-1">
                            <div class="flex-row px-3 d-flex justify-content-between text-light">
                                <div>Available 24/7</div>
                                <div><i class="fa-solid fa-arrow-down-short-wide"></i></div>
                            </div>
                        </button>
                    </p>
                    <div class="collapse" id="collapse-1">
                        <div class="text-white card card-body" style="background-color: #2b304150">
                            Contact Hayes Locums to fill your most urgent medical staffing
                            needs at any time of the day or night. Our team will work
                            quickly and intelligently to find the ideal provider match so
                            you can cover gaps in care as soon as possible.
                        </div>
                    </div>
                </div>
                <!-- Benefit 1 -->
                <!-- Benefit 2 -------------------------------------------------->
                <div class="col-md-6">
                    <p class="gap-1 d-inline-flex w-100">
                        <button class="btn btn-outline-primary border-light w-100" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false"
                            aria-controls="collapse-2">
                            <div class="flex-row px-3 d-flex justify-content-between text-light">
                                <div>Credentialing & Licensing Support</div>
                                <div><i class="fa-solid fa-arrow-down-short-wide"></i></div>
                            </div>
                        </button>
                    </p>
                    <div class="collapse" id="collapse-2">
                        <div class="text-white card card-body" style="background-color: #2b304150">
                            Our credentialing and licensing teams guide candidates through
                            the process of obtaining licenses and hospital privileges to
                            ensure that they fulfill your facility's specific requirements.
                            They assist with paperwork, including Provider Enrollment, and
                            serve as liaisons between state medical boards, your
                            credentialing team, and the healthcare provider.
                        </div>
                    </div>
                </div>
                <!-- Benefit 2 -->
                <!-- Benefit 3 -------------------------------------------------->
                <div class="col-md-6">
                    <p class="gap-1 d-inline-flex w-100">
                        <button class="btn btn-outline-primary border-light w-100" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false"
                            aria-controls="collapse-3">
                            <div class="flex-row px-3 d-flex justify-content-between text-light">
                                <div>Risk Management</div>
                                <div><i class="fa-solid fa-arrow-down-short-wide"></i></div>
                            </div>
                        </button>
                    </p>
                    <div class="collapse" id="collapse-3">
                        <div class="text-white card card-body" style="background-color: #2b304150">
                            We have a Risk Management Department that serves as a liaison
                            between our providers, facilities, and insurance carrier should
                            any adverse event take place on an assignment.
                        </div>
                    </div>
                </div>
                <!-- Benefit 3 -->
                <!-- Benefit 4 -------------------------------------------------->
                <div class="col-md-6">
                    <p class="gap-1 d-inline-flex w-100">
                        <button class="btn btn-outline-primary border-light w-100" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false"
                            aria-controls="collapse-4">
                            <div class="flex-row px-3 d-flex justify-content-between text-light">
                                <div>A-Rated Insurance</div>
                                <div><i class="fa-solid fa-arrow-down-short-wide"></i></div>
                            </div>
                        </button>
                    </p>
                    <div class="collapse" id="collapse-4">
                        <div class="text-white card card-body" style="background-color: #2b304150">
                            We contract with one of the nation's leading malpractice
                            insurance carriers.
                        </div>
                    </div>
                </div>
                <!-- Benefit 4 -->
                <!-- Benefit 5 -------------------------------------------------->
                <div class="col-md-6">
                    <p class="gap-1 d-inline-flex w-100">
                        <button class="btn btn-outline-primary border-light w-100" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="false"
                            aria-controls="collapse-5">
                            <div class="flex-row px-3 d-flex justify-content-between text-light">
                                <div>Certified Travel Team</div>
                                <div><i class="fa-solid fa-arrow-down-short-wide"></i></div>
                            </div>
                        </button>
                    </p>
                    <div class="collapse" id="collapse-5">
                        <div class="text-white card card-body" style="background-color: #2b304150">
                            Our in-house travel team is a certified travel agency. From
                            flights to rental cars, housing and beyond, they have the
                            expertise to ensure your provider arrives on time and ready to
                            work.
                        </div>
                    </div>
                </div>
                <!-- Benefit 5 -->
                <!-- Benefit 6 -------------------------------------------------->
                <div class="col-md-6">
                    <p class="gap-1 d-inline-flex w-100">
                        <button class="btn btn-outline-primary border-light w-100" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="false"
                            aria-controls="collapse-6">
                            <div class="flex-row px-3 d-flex justify-content-between text-light">
                                <div>Specialty-Specific Consultants</div>
                                <div><i class="fa-solid fa-arrow-down-short-wide"></i></div>
                            </div>
                        </button>
                    </p>
                    <div class="collapse" id="collapse-6">
                        <div class="text-white card card-body" style="background-color: #2b304150">
                            Hayes consultants work on dedicated specialty teams, becoming
                            experts in their field. Our consultants are laser-focused on
                            finding the right candidates for each position, and creating
                            strong relationships with providers.
                        </div>
                    </div>
                </div>
                <!-- Benefit 6 -->
            </div>
        </div>
    </section>
    <!-- Features -->
    <!-- Locum events -------------------------------------------------->
    {{-- <div class="bg-light wow fadeIn">
        <div class="px-3 py-5 container-lg">
            <div class="row">
                <!-- Title -------------------------------------------------->
                <div class="col-12">
                    <div>
                        <h1 class="mb-0 lh-sm fw-bold">Locums</h1>
                        <h1 class="mt-0 lh-sm text-primary fw-bold">News + Events</h1>
                    </div>
                </div>
                <!-- Title -->
                <!-- News -------------------------------------------------->
                <!-- New 1 -------------------------------------------------->
                <div class="mb-5 col-md-4 mb-md-0">
                    <div class="gap-3 d-flex flex-column">
                        <img src="{{ asset('web/images/Hayes-Locums-Blog-Shrinkflation-October-5-768x374.jpg') }}"
                            class="rounded img-fluid" alt="Image not found" />
                        <h4 class="mb-0">INDUSTRY TRENDS</h4>
                        <p>
                            5 Ways Physician Shortages Are Causing Patients to Wait Longer
                            for Less Care
                        </p>
                    </div>
                </div>
                <!-- New 1 -->
                <!-- New 2 -------------------------------------------------->
                <div class="mb-5 col-md-4 mb-md-0">
                    <div class="gap-3 d-flex flex-column">
                        <img src="{{ asset('web/images/Hayes-Locums-August-5-IMLC-1-768x374.png') }}"
                            class="rounded img-fluid" alt="Image not found" />
                        <h4 class="mb-0">Locums Resources</h4>
                        <p>5 Common Questions About the IMLC</p>
                    </div>
                </div>
                <!-- New 2 -->
                <!-- New 3 -------------------------------------------------->
                <div class="mb-5 col-md-4 mb-md-0">
                    <div class="gap-3 d-flex flex-column">
                        <img src="{{ asset('web/images/Hayes-Locums-Blog-OBGYN-October-5-768x374.jpg') }}"
                            class="rounded img-fluid" alt="Image not found" />
                        <h4 class="mb-0">Industry Trends, Locums Resources</h4>
                        <p>The ObGyn Locums Experience</p>
                    </div>
                </div>
                <!-- New 3 -->
                <!-- News -->
            </div>
        </div>
    </div> --}}
    <!-- Locum events -->
    <!-- Testimonials -------------------------------------------------->
    {{-- <div id="reviewsSectionBackground">
      <div class="container gap-4 py-5 d-flex flex-column align-items-center">
        <!-- comma svg -------------------------------------------------->
        <div>
          <img
            src="{{asset('web/images/comma.svg')}}"
            alt="Image not found"
            class="rounded img-fluid"
          />
        </div>
        <!-- comma svg -->
        <!-- Title -------------------------------------------------->
        <h2 class="text-center text-light">
          Don't take our word for it. Take theirs.
        </h2>
        <!-- Title -->
        <!-- Coursel -------------------------------------------------->
        <div id="carouselExampleIndicators" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <!-- <img src="..." class="d-block w-100" alt="..." /> -->
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
              <!-- <img src="..." class="d-block w-100" alt="..." /> -->
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
              <!-- <img src="..." class="d-block w-100" alt="..." /> -->
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
        </div>
        <!-- Coursel -->
      </div>
    </div> --}}
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
    <!-- Footer -------------------------------------------------->
@endsection
