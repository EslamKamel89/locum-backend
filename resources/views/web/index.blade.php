<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('web/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('web/css/styles.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('web/css/animate.css')}}" />
    <title>AmPm Locum</title>
    <style></style>
  </head>
  <body>
    <!-- Navigation  -------------------------------------------------->
    <div class="text-white bg-primary">
      <div
        class="gap-2 pt-3 container-lg d-flex justify-content-end align-items-sm-center"
      >
        <!-- link 1  -------------------------------------------------->
        <p>
          <a
            href="#"
            class="mx-2 text-white link-body-emphasis link-offset-2 link-underline-opacity-0"
            >Why AmPm</a
          >
        </p>
        <!-- link 1  -->
        <!-- link 2  -------------------------------------------------->
        <p>
          <a
            href="#"
            class="mx-2 text-white link-body-emphasis link-offset-2 link-underline-opacity-0"
            >Blog</a
          >
        </p>
        <!-- link 2  -->
        <!-- link 3  -------------------------------------------------->
        <p>
          <a
            href="#"
            class="mx-2 text-white link-body-emphasis link-offset-2 link-underline-opacity-0"
            >Contact</a
          >
        </p>
        <!-- link 3  -->
      </div>
    </div>
    <!-- Navigation  -->
    <!-- Navbar  -------------------------------------------------->
    <nav
      class="py-2 navbar navbar-expand-lg bg-body-tertiary navbar-dark sticky-top"
      id="navbar"
    >
      <div class="container-lg">
        <!-- Logo  -------------------------------------------------->
        <a class="navbar-brand text-light" href="index.html">
          <img
            src="{{asset('web/images/logo.png')}}"
            alt="Image not found"
            style="height: 80px"
          />
        </a>
        <!-- Logo  -->
        <!-- Hamburger button  -------------------------------------------------->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Hamburger button  -->
        <!-- Collapsable menu  -------------------------------------------------->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
            <!-- Search  -------------------------------------------------->
            <li class="nav-item">
              <a
                class="nav-link fw-bold"
                aria-current="page"
                href="/search_jobs.html"
                >Request Coverage</a
              >
            </li>
            <!-- Search  -->
            <!-- Locum tennes dropdown  -------------------------------------------------->
            <!-- <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle text-light fw-bold"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Locum Tenens
              </a>
              <ul
                class="dropdown-menu dropdown-menu-dark bg-lg-dark"
                style="background-color: transparent"
              >
                <li>
                  <a class="text-white dropdown-item" href="#"
                    >Why Hayes Locums</a
                  >
                </li>
                <li>
                  <a class="text-white dropdown-item" href="#"
                    >What is Locum Tenens</a
                  >
                </li>
                <li>
                  <a class="text-white dropdown-item" href="#"
                    >How Locum Tenens Works</a
                  >
                </li>
                <li>
                  <a class="text-white dropdown-item" href="#"
                    >Benefits of Locum Tenens</a
                  >
                </li>
                <li>
                  <a class="text-white dropdown-item" href="#">FAQ</a>
                </li>
              </ul>
            </li> -->
            <!-- Locum tennes dropdown -->
            <!-- Medicl Providers dropdown  -------------------------------------------------->
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle text-light fw-bold"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                For Medical Providers
              </a>
              <ul
                class="dropdown-menu dropdown-menu-dark bg-lg-dark"
                style="background-color: transparent"
              >
                <li><a class="dropdown-item" href="#">Physicians</a></li>
                <li>
                  <a class="text-white dropdown-item" href="#"
                    >Nurse Practitioners</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="#">Physician Assistants</a>
                </li>
                <li><a class="dropdown-item" href="#">CRNAs</a></li>
                <li>
                  <a class="dropdown-item" href="#"
                    >Certified Anesthesiologist Assistants</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="#">Provider Resources</a>
                </li>
              </ul>
            </li>
            <!-- Medicl Providers dropdown  -->
            <!-- Medicl Facilities  -------------------------------------------------->
            <li class="nav-item">
              <a
                class="nav-link fw-bold"
                aria-current="page"
                href="/for_medical_facilities.html"
                >For Medical Facilities</a
              >
            </li>
            <!-- Medicl Facilities  -->
            <!-- Call Button  -------------------------------------------------->
            <button
              class="gap-2 my-2 btn btn-primary hstack mx-lg-2 my-lg-0"
              style="width: fit-content"
            >
              <i class="text-white fa-solid fa-phone"></i>
              <span>717-578-4737</span>
            </button>
            <!-- Call Button  -->
          </ul>
        </div>
        <!-- Collapsable menu  -->
      </div>
    </nav>
    <!-- Navbar  -->
    <!-- Hero section  -------------------------------------------------->
    <header class="">
      <div
        class="py-5 d-flex justify-content-center"
        style="background-color: #2b304150; height: 77vh"
      >
        <div class="container-lg row">
          <!-- Hero title  -------------------------------------------------->
          <div
            class="mx-auto col-md-6 d-flex flex-column justify-content-center align-items-center align-items-lg-start wow bounceInLeft"
            data-wow-duration="2s"
            style="max-width: 500px"
          >
            <p class="text-uppercase text-light">
              Your full service locum tenens agency
            </p>
            <h1
              class="mt-0 text-center main-title text-uppercase text-light text-md-start lh-1"
            >
              We advocate for the best rates and flexibility for you.
            </h1>
          </div>
          <!-- Hero title  -->
          <!-- Hero dropdown  -------------------------------------------------->

          <!-- Hero dropdown  -->
        </div>
      </div>
    </header>
    <!-- Hero section  -->
    <!-- Features for providers and medical facilities  -------------------------------------------------->
    <div
      id="sectionBackground"
      class="py-5 d-flex justify-content-center w-100"
    >
      <div class="px-5 row container-lg px-md-0">
        <!-- Providers section  -------------------------------------------------->
        <div
          class="px-4 mb-5 col-md-6 mb-md-0 wow bounceInLeft"
          data-wow-duration="2s"
        >
          <div
            class="gap-3 d-flex flex-column justify-content-between align-items-center h-100"
          >
            <img
              src="{{asset('web/images/Hayes-For-Providers-Feature-1.png')}}"
              alt="Image not found"
              class="img-fluid"
            />
            <h3 class="text-white fw-bold text-uppercase">For Providers</h3>
            <p class="text-center text-light fw-lighter">
              AmPm is here for you! We assist you from A to Z, from helping you
              find jobs that fit your preferences, negotiating pay rates and
              bonuses, to assisting with travel and additional needs.
            </p>
            <p class="text-center text-light fw-lighter">
              With over 40 years of collective experience, our job placement
              specialists are dedicated to efficiency, simplifying processes,
              and make tasks more convenient for you.
            </p>
            <button class="btn btn-primary btn-lg">Search Jobs</button>
          </div>
        </div>
        <!-- Providers section  -->
        <!-- medical facilities section  -------------------------------------------------->
        <div class="px-4 col-md-6 wow bounceInRight" data-wow-duration="2s">
          <div
            class="gap-3 d-flex flex-column justify-content-between align-items-center h-100"
          >
            <img
              src="{{asset('web/images/Hayes_ForFacilities-Feature.png')}}"
              alt="Image not found"
              class="img-fluid"
            />
            <h3 class="text-white fw-bold text-uppercase">
              For Medical Facilities
            </h3>
            <p class="text-center text-light fw-lighter">
              AmPm is dedicated to filling your staffing needs. We strive to do
              our best to ensure your team can provide consistent, high-quality
              care without interruption.
            </p>
            <p class="text-center text-light fw-lighter">
              Our services are designed to support your immediate staffing
              needs, with the potential for permanent hire. Our streamlined,
              seamless process makes it easy to onboard
            </p>
            <p class="text-center text-light fw-lighter">
              qualified professionals. We also offer dedicated account
              management and support
            </p>
            <button class="btn btn-primary btn-lg">Request Coverage</button>
          </div>
        </div>
        <!-- medical facilities section  -->
      </div>
    </div>
    <!-- Features for providers and medical facilities  -->
    <!-- About us section  -------------------------------------------------->
    <div class="bg-light">
      <div
        class="px-3 py-5 container-lg d-flex flex-column align-items-center"
        style="max-width: 1000px"
      >
        <div>
          <h1 class="mb-0 text-center lh-sm fw-bold">
            Am to Pm, we are at your service!
          </h1>
          <h1 class="mt-0 text-center lh-sm text-primary fw-bold">
            Turn your time into opportunity - explore Locum Tenens opportunities
            with us.
          </h1>
        </div>
        <h3 class="text-center text-dark">
          We do our best to match you with jobs that best suit you.
        </h3>
        <p class="text-center text-dark" style="max-width: 600px">
          AmPm was founded by locum staffing specialists and an emergency
          physician who have over 40 years of collective experience in the locum
          industry
        </p>
        <p class="text-center text-dark" style="max-width: 600px">
          A key pain point for healthcare providers is securing jobs that both
          maximize pay, and offer an enjoyable work environment that provides
          schedule flexibility.
        </p>
        <p class="text-center text-dark" style="max-width: 600px">
          transfer this savings cost to you. Your passion for providing quality
          care for your patients is appreciated, and deserves to be
          appropriately rewarded.
        </p>
        <p class="text-center text-dark" style="max-width: 600px">
          Far too many locums companies charge faciities higher commissions,
          which leaves less money on the table for doctors and APP's. Instead,
          AmPm takes a smaller commission.
        </p>
        <button class="btn btn-primary btn-lg px-7">About Us</button>
      </div>
    </div>
    <!-- About us section  -->
    <!-- Speciality grid  -------------------------------------------------->

    <!-- Speciality grid   -->
    <!-- video section  -------------------------------------------------->
    <div class="px-3 py-5 container-lg d-flex flex-column align-items-center">
      <div>
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
      <img
        src="{{asset('web/images/Screen-Shot-2023-07-10-at-2.48.49-PM.jpg.webp')}}"
        alt="Image not found"
        class="rounded img-fluid"
      />
    </div>
    <!-- video section  -->

    <!-- Testimonials -------------------------------------------------->
    <div id="reviewsSectionBackground">
      <div class="container gap-4 py-5 d-flex flex-column align-items-center">
        <!-- comma svg -------------------------------------------------->
        <div>
          <img
            src="{{asset('web/images/comma-svg.svg')}}"
            alt="Image not found"
            class="rounded img-fluid"
          />
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
    <!-- Footer -------------------------------------------------->
    <footer class="pt-5 pb-3 text-bg-secondary">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h5>Contact Us</h5>
            <p>
              <!-- <i class="fa fa-map-marker"></i> 9 Samia Gamel, Mansoura, Egypt<br /> -->
              <i class="fa fa-phone"></i> +717-578-4737<br />
              <i class="fa fa-envelope"></i> eslam@admin.com
            </p>
          </div>
          <!-- <div class="col-md-4">
            <h5>Useful Links</h5>
            <ul class="list-unstyled">
              <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div> -->
          <div class="col-md-6">
            <!-- <h5>Follow Us</h5>
            <div class="gap-2 d-flex">
              <a href="#"> <i class="fa-brands fa-facebook"></i></a>
              <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin"></i></a>
              <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div> -->
            <h5 class="mt-4">Subscribe</h5>
            <form>
              <div class="form-group">
                <input
                  type="email"
                  class="mb-2 form-control"
                  placeholder="Enter your email"
                />
              </div>
              <button type="submit" class="btn btn-primary">Subscribe</button>
            </form>
          </div>
        </div>
        <div class="mt-4 text-center">
          <p>&copy; 2024 AmPm Locum Website. All Rights Reserved.</p>
        </div>
      </div>
    </footer>
    <!-- Footer -->
    <script src="{{asset('web/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('web/js/wow.min.js')}}"></script>
    <script>
      new WOW().init();
    </script>
    <script src="{{asset('web/js/script.js')}}"></script>
  </body>
</html>
