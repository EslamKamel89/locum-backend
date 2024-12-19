@extends('web.layouts.layout')
@section('content')
<section id="searchSection" class="bg-light">
    <div class="px-3 py-5 container-lg">
      <div class="row">
        <!-- search title-------------------------------------------------->
        <div class="gap-0 col-md-6 d-flex flex-column">
          <h3>Locum Tenens Jobs Search</h3>
          <h1 class="main-title">Start your search for locums jobs.</h1>
          <p>
            Take the first step toward finding your ideal match by scrolling
            through our open locum tenens locums tenens jobs below. Once you
            find a job that meets your qualifications and needs, fill out our
            form to tell us a little bit about yourself, and one of our
            consultants will follow up with more information.
          </p>
        </div>
        <!-- search title-->
        <!-- Search dropdowns  -------------------------------------------------->
        <div class="col-md-6">
          <div
            class="gap-3 mt-3 d-flex flex-column justify-content-center align-items-center mt-lg-0"
          >
            <!-- dropdown 1  -------------------------------------------------->
            <div
              class="border shadow dropdown border-1 w-75 rounded-2"
              style="min-width: 250px"
              id="dropdown"
            >
              <button
                class="btn btn-light dropdown-toggle w-100"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Search By Profession
              </button>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="#">Emergency Physician</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    Emergency Advanced Practice Professionals (PA, NP)</a
                  >
                </li>
              </ul>
            </div>
            <!-- dropdown 1  -->
            <!-- dropdown 2  -------------------------------------------------->
            <div
              class="border shadow dropdown border-1 w-75 rounded-2"
              style="min-width: 250px"
              id="dropdown"
            >
              <button
                class="btn btn-light dropdown-toggle disabled w-100"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Pick a Speciality
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </div>
            <!-- dropdown 2  -->
            <!-- dropdown 3  -------------------------------------------------->
            <div
              class="border shadow dropdown border-1 w-75 rounded-2"
              style="min-width: 250px"
              id="dropdown"
            >
              <button
                class="btn btn-light dropdown-toggle disabled w-100"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                All Locations
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </div>
            <!-- dropdown 3  -->
            <!-- Search button  -------------------------------------------------->
            <button class="btn btn-primary disabled">
              <i class="text-white fa-solid fa-magnifying-glass me-2"></i>
              Search Locum Jobs
            </button>
            <!-- Search button  -->
          </div>
        </div>
        <!-- Search dropdowns  -->
      </div>
    </div>
  </section>
  <!-- search -->
  <!-- search cards -------------------------------------------------->
  <section id="searchCards">
    <div class="px-3 py-5 container-lg">
      <!-- <div class="gap-2 d-flex flex-column flex-md-row"> -->
      <div class="row">
        <!-- Card 1 -------------------------------------------------->
        <div class="p-2 col-md-6">
          <div class="text-center card h-100">
            <div
              class="gap-3 card-body d-flex flex-column justify-content-between align-items-start"
            >
              <div class="flex-row gap-2 mt-2 d-flex align-items-baseline">
                <div class="me-1">
                  <img src="{{asset('web/images/bag.svg')}}" alt="Image not found" />
                </div>
                <h6 class="text-uppercase">Locums Job</h6>
              </div>
              <h2 class="card-title text-start">
                Locum Tenens Gastroenterologist Opportunity in Illinois
              </h2>
              <div>
                <button class="btn btn-dark">TODAY</button>
              </div>
              <p class="card-text text-start">
                We are seeking a board-certified Gastroenterologist for a
                locum tenens position at a leading medical facility in
                Illinois.
              </p>
              <div><a href="#" class="link-dark fw-bold">LEARN MORE</a></div>
              <div
                class="d-flex justify-content-between align-items-baseline w-100"
              >
                <div class="flex-row gap-2 d-flex justify-content-start">
                  <p>Physician</p>
                  <p>Illinois</p>
                </div>
                <a href="#" class="btn btn-primary">I'm Interested</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 1 -->
        <!-- Card 1 -------------------------------------------------->
        <div class="p-2 col-md-6">
          <div class="text-center card h-100">
            <div
              class="gap-3 card-body d-flex flex-column justify-content-between align-items-start"
            >
              <div class="flex-row gap-2 mt-2 d-flex align-items-baseline">
                <div class="me-1">
                  <img src="{{asset('web/images/bag.svg')}}" alt="Image not found" />
                </div>
                <h6 class="text-uppercase">Locums Job</h6>
              </div>
              <h2 class="card-title text-start">
                Locum Tenens Gastroenterologist Opportunity in Illinois
              </h2>
              <div>
                <button class="btn btn-dark">TODAY</button>
              </div>
              <p class="card-text text-start">
                We are seeking a board-certified Gastroenterologist for a
                locum tenens position at a leading medical facility in
                Illinois.
              </p>
              <div><a href="#" class="link-dark fw-bold">LEARN MORE</a></div>
              <div
                class="d-flex justify-content-between align-items-baseline w-100"
              >
                <div class="flex-row gap-2 d-flex justify-content-start">
                  <p>Physician</p>
                  <p>Illinois</p>
                </div>
                <a href="#" class="btn btn-primary">I'm Interested</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 1 -->
        <!-- Card 1 -------------------------------------------------->
        <div class="p-2 col-md-6">
          <div class="text-center card h-100">
            <div
              class="gap-3 card-body d-flex flex-column justify-content-between align-items-start"
            >
              <div class="flex-row gap-2 mt-2 d-flex align-items-baseline">
                <div class="me-1">
                  <img src="{{asset('web/images/bag.svg')}}" alt="Image not found" />
                </div>
                <h6 class="text-uppercase">Locums Job</h6>
              </div>
              <h2 class="card-title text-start">
                Locum Tenens Gastroenterologist Opportunity in Illinois
              </h2>
              <div>
                <button class="btn btn-dark">TODAY</button>
              </div>
              <p class="card-text text-start">
                We are seeking a board-certified Gastroenterologist for a
                locum tenens position at a leading medical facility in
                Illinois.
              </p>
              <div><a href="#" class="link-dark fw-bold">LEARN MORE</a></div>
              <div
                class="d-flex justify-content-between align-items-baseline w-100"
              >
                <div class="flex-row gap-2 d-flex justify-content-start">
                  <p>Physician</p>
                  <p>Illinois</p>
                </div>
                <a href="#" class="btn btn-primary">I'm Interested</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 1 -->
        <!-- Card 1 -------------------------------------------------->
        <div class="p-2 col-md-6">
          <div class="text-center card h-100">
            <div
              class="gap-3 card-body d-flex flex-column justify-content-between align-items-start"
            >
              <div class="flex-row gap-2 mt-2 d-flex align-items-baseline">
                <div class="me-1">
                  <img src="{{asset('web/images/bag.svg')}}" alt="Image not found" />
                </div>
                <h6 class="text-uppercase">Locums Job</h6>
              </div>
              <h2 class="card-title text-start">
                Locum Tenens Gastroenterologist Opportunity in Illinois
              </h2>
              <div>
                <button class="btn btn-dark">TODAY</button>
              </div>
              <p class="card-text text-start">
                We are seeking a board-certified Gastroenterologist for a
                locum tenens position at a leading medical facility in
                Illinois.
              </p>
              <div><a href="#" class="link-dark fw-bold">LEARN MORE</a></div>
              <div
                class="d-flex justify-content-between align-items-baseline w-100"
              >
                <div class="flex-row gap-2 d-flex justify-content-start">
                  <p>Physician</p>
                  <p>Illinois</p>
                </div>
                <a href="#" class="btn btn-primary">I'm Interested</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 1 -->
      </div>
    </div>
  </section>
  <!-- search cards -->

  <!-- Pagination -------------------------------------------------->
  <section>
    <div class="w-full px-3 py-5 container-lg d-flex justify-content-end">
      <nav aria-label="Page navigation">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
    </div>
  </section>
  <!-- Pagination -->
  <!-- custoemr service -------------------------------------------------->
  <section class="pt-5 bg-light">
    <div class="px-3 py-5 container-lg">
      <div class="row">
        <!-- item 1 -------------------------------------------------->
        <div class="mb-5 col-md-6 d-flex justify-content-center mb-md-0">
          <div
            class="p-5 border rounded shadow-lg w-75 border-secondary rounded-5 text-bg-secondary d-flex flex-column justify-content-center align-items-center"
          >
            <div class="mb-5 w-100 position-relative">
              <img
                src="{{asset('web/images/Hayes-Consultant-Sidebar@2x.png')}}"
                alt="Image not found"
                class="rounded-circle position-absolute start-50 translate-middle"
                width="100"
                height="100"
                style="top: -50px"
              />
            </div>
            <h1 class="text-center">TALK WITH A CONSULTANT</h1>
            <p class="text-center">
              Let our specialized consultants help you.
            </p>
            <button
              class="gap-2 mx-auto my-2 btn btn-primary hstack"
              style="width: fit-content"
            >
              <i class="text-white fa-solid fa-phone"></i>
              <span>717-578-4737</span>
            </button>
          </div>
        </div>
        <!-- item 1 -->
        <!-- item 2 -------------------------------------------------->
        <div class="mt-5 col-md-6 d-flex justify-content-center mt-md-0">
          <div
            class="p-5 border rounded shadow-lg w-75 border-primary rounded-5 text-bg-primary d-flex flex-column justify-content-center align-items-center"
          >
            <div class="mb-5 w-100 position-relative">
              <img
                src="{{asset('web/images/Hayes-JobAlerts.png')}}"
                alt="Image not found"
                class="rounded-circle position-absolute start-50 translate-middle"
                width="100"
                height="100"
                style="top: -50px"
              />
            </div>
            <h1 class="text-center">SIGN UP FOR LOCUMS JOB ALERTS</h1>
            <p class="text-center">
              We'll keep you updated with new opportunities.
            </p>
            <button
              class="gap-2 mx-auto my-2 btn btn-dark hstack"
              style="width: fit-content"
            >
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

@endsection
