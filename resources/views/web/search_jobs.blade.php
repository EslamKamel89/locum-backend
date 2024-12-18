<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css" />
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
    <title>Locum</title>
    <style></style>
  </head>
  <body>
    <!-- Navigation  -------------------------------------------------->
    <div class="bg-primary text-white">
      <div
        class="container-lg d-flex justify-content-end gap-2 align-items-sm-center pt-3"
      >
        <!-- link 1  -------------------------------------------------->
        <p>
          <a
            href="#"
            class="link-body-emphasis link-offset-2 link-underline-opacity-0 text-white mx-2"
            >Why Ampm</a
          >
        </p>
        <!-- link 1  -->
        <!-- link 2  -------------------------------------------------->
        <p>
          <a
            href="#"
            class="link-body-emphasis link-offset-2 link-underline-opacity-0 text-white mx-2"
            >Blog</a
          >
        </p>
        <!-- link 2  -->
        <!-- link 3  -------------------------------------------------->
        <p>
          <a
            href="#"
            class="link-body-emphasis link-offset-2 link-underline-opacity-0 text-white mx-2"
            >Contact</a
          >
        </p>
        <!-- link 3  -->
      </div>
    </div>
    <!-- Navigation  -->
    <!-- Navbar  -------------------------------------------------->
    <nav
      id="navbar"
      class="navbar navbar-expand-lg bg-body-tertiary navbar-dark py-4 sticky-top"
    >
      <div class="container-lg">
        <!-- Logo  -------------------------------------------------->
        <a class="navbar-brand text-light" href="index.html">
          <img
            src="images/logo.png"
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
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <!-- Search  -------------------------------------------------->
            <li class="nav-item">
              <a class="nav-link fw-bold" aria-current="page" href="#"
                >Search Jobs</a
              >
            </li>
            <!-- Search  -->
            <!-- Locum tennes dropdown  -------------------------------------------------->
            <li class="nav-item dropdown">
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
                  <a class="dropdown-item text-white" href="#"
                    >Why AMPm Locums</a
                  >
                </li>
                <li>
                  <a class="dropdown-item text-white" href="#"
                    >What is Locum Tenens</a
                  >
                </li>
                <li>
                  <a class="dropdown-item text-white" href="#"
                    >How Locum Tenens Works</a
                  >
                </li>
                <li>
                  <a class="dropdown-item text-white" href="#"
                    >Benefits of Locum Tenens</a
                  >
                </li>
                <li>
                  <a class="dropdown-item text-white" href="#">FAQ</a>
                </li>
              </ul>
            </li>
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
                  <a class="dropdown-item text-white" href="#"
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
              class="btn btn-primary hstack gap-2 mx-lg-2 my-2 my-lg-0"
              style="width: fit-content"
            >
              <i class="fa-solid fa-phone text-white"></i>
              <span>717-578-4737</span>
            </button>
            <!-- Call Button  -->
          </ul>
        </div>
        <!-- Collapsable menu  -->
      </div>
    </nav>
    <!-- Navbar  -->
    <!-- search -------------------------------------------------->
    <section id="searchSection" class="bg-light">
      <div class="container-lg px-3 py-5">
        <div class="row">
          <!-- search title-------------------------------------------------->
          <div class="col-md-6 d-flex flex-column gap-0">
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
              class="d-flex flex-column justify-content-center align-items-center gap-3 mt-3 mt-lg-0"
            >
              <!-- dropdown 1  -------------------------------------------------->
              <div
                class="dropdown border border-1 w-75 rounded-2 shadow"
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
                class="dropdown border border-1 w-75 rounded-2 shadow"
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
                class="dropdown border border-1 w-75 rounded-2 shadow"
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
                <i class="fa-solid fa-magnifying-glass text-white me-2"></i>
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
      <div class="container-lg px-3 py-5">
        <!-- <div class="d-flex flex-column flex-md-row gap-2"> -->
        <div class="row">
          <!-- Card 1 -------------------------------------------------->
          <div class="col-md-6 p-2">
            <div class="card text-center h-100">
              <div
                class="card-body d-flex flex-column justify-content-between align-items-start gap-3"
              >
                <div class="mt-2 d-flex flex-row align-items-baseline gap-2">
                  <div class="me-1">
                    <img src="images/bag.svg" alt="Image not found" />
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
                  <div class="d-flex flex-row justify-content-start gap-2">
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
          <div class="col-md-6 p-2">
            <div class="card text-center h-100">
              <div
                class="card-body d-flex flex-column justify-content-between align-items-start gap-3"
              >
                <div class="mt-2 d-flex flex-row align-items-baseline gap-2">
                  <div class="me-1">
                    <img src="images/bag.svg" alt="Image not found" />
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
                  <div class="d-flex flex-row justify-content-start gap-2">
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
          <div class="col-md-6 p-2">
            <div class="card text-center h-100">
              <div
                class="card-body d-flex flex-column justify-content-between align-items-start gap-3"
              >
                <div class="mt-2 d-flex flex-row align-items-baseline gap-2">
                  <div class="me-1">
                    <img src="images/bag.svg" alt="Image not found" />
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
                  <div class="d-flex flex-row justify-content-start gap-2">
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
          <div class="col-md-6 p-2">
            <div class="card text-center h-100">
              <div
                class="card-body d-flex flex-column justify-content-between align-items-start gap-3"
              >
                <div class="mt-2 d-flex flex-row align-items-baseline gap-2">
                  <div class="me-1">
                    <img src="images/bag.svg" alt="Image not found" />
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
                  <div class="d-flex flex-row justify-content-start gap-2">
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
      <div class="container-lg px-3 py-5 d-flex justify-content-end w-full">
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
    <section class="bg-light pt-5">
      <div class="container-lg px-3 py-5">
        <div class="row">
          <!-- item 1 -------------------------------------------------->
          <div class="col-md-6 d-flex justify-content-center mb-5 mb-md-0">
            <div
              class="w-75 border border-secondary rounded-5 shadow-lg text-bg-secondary rounded p-5 d-flex flex-column justify-content-center align-items-center"
            >
              <div class="w-100 mb-5 position-relative">
                <img
                  src="images/Hayes-Consultant-Sidebar@2x.png"
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
                class="btn btn-primary hstack gap-2 my-2 mx-auto"
                style="width: fit-content"
              >
                <i class="fa-solid fa-phone text-white"></i>
                <span>717-578-4737</span>
              </button>
            </div>
          </div>
          <!-- item 1 -->
          <!-- item 2 -------------------------------------------------->
          <div class="col-md-6 d-flex justify-content-center mt-5 mt-md-0">
            <div
              class="w-75 border border-primary rounded-5 shadow-lg text-bg-primary rounded p-5 d-flex flex-column justify-content-center align-items-center"
            >
              <div class="w-100 mb-5 position-relative">
                <img
                  src="images/Hayes-JobAlerts.png"
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
                class="btn btn-dark hstack gap-2 my-2 mx-auto"
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
    <footer class="text-bg-secondary pt-5 pb-3">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h5>Contact Us</h5>
            <p>
              <i class="fa fa-map-marker"></i> 9 Samia Gamel, Mansoura, Egypt<br />
              <i class="fa fa-phone"></i> +123 456 7890<br />
              <i class="fa fa-envelope"></i> eslam@admin.com
            </p>
          </div>
          <div class="col-md-4">
            <h5>Useful Links</h5>
            <ul class="list-unstyled">
              <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h5>Follow Us</h5>
            <div class="d-flex gap-2">
              <a href="#"> <i class="fa-brands fa-facebook"></i></a>
              <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin"></i></a>
              <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <h5 class="mt-4">Subscribe</h5>
            <form>
              <div class="form-group">
                <input
                  type="email"
                  class="form-control mb-2"
                  placeholder="Enter your email"
                />
              </div>
              <button type="submit" class="btn btn-primary">Subscribe</button>
            </form>
          </div>
        </div>
        <div class="text-center mt-4">
          <p>&copy; 2024 Medical Locum Website. All Rights Reserved.</p>
        </div>
      </div>
    </footer>
    <!-- Footer -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
