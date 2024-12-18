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
          <img src="images/logo.png" alt="logo" style="height: 80px" />
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
              <a
                class="nav-link fw-bold"
                aria-current="page"
                href="search_jobs.html"
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
                    >Why Hayes Locums</a
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
              <a class="nav-link fw-bold" aria-current="page" href="#"
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
    <!-- connect with consultant  -------------------------------------------------->
    <section id="connectWithConsultant">
      <div class="container-lg px-3 py-5">
        <div class="mb-3">
          <div class="row g-0">
            <!-- card  -------------------------------------------------->
            <div class="col-md-6 mt-4 mt-md-0 bg-transparent">
              <div
                class="card p-3 mx-2 rounded-3 text-white shadow-lg mb-3"
                style="background-color: #2b304150"
              >
                <div class="card-body">
                  <h3 class="card-title">
                    LOCUM HEALTHCARE RECRUITMENT FOR MEDICAL FACILITIES
                  </h3>
                  <h1
                    class="card-title text-uppercase main-title"
                    style="line-height: 0.8em"
                  >
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
            <div class="col-md-6 border shadow-lg rounded-3 bg-white p-3">
              <form>
                <div class="d-flex flex-row w-100 gap-2 mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First Name"
                  />
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last Name"
                  />
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Title" />
                </div>
                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Facility Name"
                  />
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Email" />
                </div>
                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Phone Number"
                  />
                </div>
                <hr class="my-4 border-top border-primary" />
                <div class="mb-3">
                  <div class="dropdown">
                    <button
                      class="btn btn-outline-dark w-100 text-start border py-2 dropdown-toggle"
                      type="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      style="color: gray"
                    >
                      Select a Profession
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li>
                        <a class="dropdown-item" href="#">Another action</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#"
                          >Something else here</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="dropdown">
                    <button
                      class="btn btn-outline-dark w-100 text-start border py-2 dropdown-toggle"
                      type="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      style="color: gray"
                    >
                      Select a Speciality
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li>
                        <a class="dropdown-item" href="#">Another action</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#"
                          >Something else here</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
                <hr class="my-4 border-top border-primary" />
                <div class="mb-3">
                  <textarea
                    type="text"
                    class="form-control"
                    placeholder="Any Other Comments?"
                  ></textarea>
                </div>
                <p class="mb-5 text-center fw-lighter">
                  By clicking "Submit," you are opting into receiving text
                  messages regarding your inquiry with Hayes Locums. Message and
                  data rates may apply. Message frequency may vary. You can opt
                  out by responding STOP at any time. View our Terms and
                  Conditions for more details.
                </p>
                <div class="mb-3 d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary btn-lg px-5">
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
    <section>
      <div class="container-lg px-3 py-5">
        <div class="row">
          <!-- Title and description -------------------------------------------------->
          <div class="col-md-6 pe-0 pe-md-3">
            <div class="d-flex flex-column justify-content-center gap-2">
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
            <img
              src="images/video.jpg"
              class="img-fluid rounded shadow object-fit-cover h-100"
              alt="Image not found"
            />
          </div>
          <!-- Title and description -->
        </div>
      </div>
    </section>
    <!-- RECRUITMENT PARTNER -->
    <!-- Features -------------------------------------------------->
    <section id="sectionBackground">
      <div class="container-lg px-3 py-5">
        <div class="row">
          <!-- Title -------------------------------------------------->
          <div class="col-md-6">
            <h1 class="main-title text-white">
              <span class="text-primary">DEDICATED TEAM </span>WITH A FOCUSED
              APPROACH
            </h1>
          </div>
          <!-- Title -->
          <!-- description -------------------------------------------------->
          <div class="col-md-6">
            <div
              class="d-flex flex-column gap-2 justify-content-center align-items-center text-white"
            >
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
            <p class="d-inline-flex gap-1 w-100">
              <button
                class="btn btn-outline-primary border-primary w-100"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse-1"
                aria-expanded="false"
                aria-controls="collapse-1"
              >
                <div class="d-flex flex-row justify-content-between px-3">
                  <div>Available 24/7</div>
                  <div><i class="fa-solid fa-arrow-down-short-wide"></i></div>
                </div>
              </button>
            </p>
            <div class="collapse" id="collapse-1">
              <div
                class="card card-body text-white"
                style="background-color: #2b304150"
              >
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
            <p class="d-inline-flex gap-1 w-100">
              <button
                class="btn btn-outline-primary border-primary w-100"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse-2"
                aria-expanded="false"
                aria-controls="collapse-2"
              >
                <div class="d-flex flex-row justify-content-between px-3">
                  <div>Credentialing & Licensing Support</div>
                  <div><i class="fa-solid fa-arrow-down-short-wide"></i></div>
                </div>
              </button>
            </p>
            <div class="collapse" id="collapse-2">
              <div
                class="card card-body text-white"
                style="background-color: #2b304150"
              >
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
            <p class="d-inline-flex gap-1 w-100">
              <button
                class="btn btn-outline-primary border-primary w-100"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse-3"
                aria-expanded="false"
                aria-controls="collapse-3"
              >
                <div class="d-flex flex-row justify-content-between px-3">
                  <div>Risk Management</div>
                  <div><i class="fa-solid fa-arrow-down-short-wide"></i></div>
                </div>
              </button>
            </p>
            <div class="collapse" id="collapse-3">
              <div
                class="card card-body text-white"
                style="background-color: #2b304150"
              >
                We have a Risk Management Department that serves as a liaison
                between our providers, facilities, and insurance carrier should
                any adverse event take place on an assignment.
              </div>
            </div>
          </div>
          <!-- Benefit 3 -->
          <!-- Benefit 4 -------------------------------------------------->
          <div class="col-md-6">
            <p class="d-inline-flex gap-1 w-100">
              <button
                class="btn btn-outline-primary border-primary w-100"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse-4"
                aria-expanded="false"
                aria-controls="collapse-4"
              >
                <div class="d-flex flex-row justify-content-between px-3">
                  <div>A-Rated Insurance</div>
                  <div><i class="fa-solid fa-arrow-down-short-wide"></i></div>
                </div>
              </button>
            </p>
            <div class="collapse" id="collapse-4">
              <div
                class="card card-body text-white"
                style="background-color: #2b304150"
              >
                We contract with one of the nation's leading malpractice
                insurance carriers.
              </div>
            </div>
          </div>
          <!-- Benefit 4 -->
          <!-- Benefit 5 -------------------------------------------------->
          <div class="col-md-6">
            <p class="d-inline-flex gap-1 w-100">
              <button
                class="btn btn-outline-primary border-primary w-100"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse-5"
                aria-expanded="false"
                aria-controls="collapse-5"
              >
                <div class="d-flex flex-row justify-content-between px-3">
                  <div>Certified Travel Team</div>
                  <div><i class="fa-solid fa-arrow-down-short-wide"></i></div>
                </div>
              </button>
            </p>
            <div class="collapse" id="collapse-5">
              <div
                class="card card-body text-white"
                style="background-color: #2b304150"
              >
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
            <p class="d-inline-flex gap-1 w-100">
              <button
                class="btn btn-outline-primary border-primary w-100"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse-6"
                aria-expanded="false"
                aria-controls="collapse-6"
              >
                <div class="d-flex flex-row justify-content-between px-3">
                  <div>Specialty-Specific Consultants</div>
                  <div><i class="fa-solid fa-arrow-down-short-wide"></i></div>
                </div>
              </button>
            </p>
            <div class="collapse" id="collapse-6">
              <div
                class="card card-body text-white"
                style="background-color: #2b304150"
              >
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
    <div class="bg-light">
      <div class="container-lg px-3 py-5">
        <div class="row">
          <!-- Title -------------------------------------------------->
          <div class="col-12">
            <div>
              <h1 class="lh-sm mb-0 fw-bold">Locums</h1>
              <h1 class="lh-sm mt-0 text-primary fw-bold">News + Events</h1>
            </div>
          </div>
          <!-- Title -->
          <!-- News -------------------------------------------------->
          <!-- New 1 -------------------------------------------------->
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="d-flex flex-column gap-3">
              <img
                src="images/Hayes-Locums-Blog-Shrinkflation-October-5-768x374.jpg"
                class="img-fluid rounded"
                alt="Image not found"
              />
              <h4 class="mb-0">INDUSTRY TRENDS</h4>
              <p>
                5 Ways Physician Shortages Are Causing Patients to Wait Longer
                for Less Care
              </p>
            </div>
          </div>
          <!-- New 1 -->
          <!-- New 2 -------------------------------------------------->
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="d-flex flex-column gap-3">
              <img
                src="images/Hayes-Locums-August-5-IMLC-1-768x374.png"
                class="img-fluid rounded"
                alt="Image not found"
              />
              <h4 class="mb-0">Locums Resources</h4>
              <p>5 Common Questions About the IMLC</p>
            </div>
          </div>
          <!-- New 2 -->
          <!-- New 3 -------------------------------------------------->
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="d-flex flex-column gap-3">
              <img
                src="images/Hayes-Locums-Blog-OBGYN-October-5-768x374.jpg"
                class="img-fluid rounded"
                alt="Image not found"
              />
              <h4 class="mb-0">Industry Trends, Locums Resources</h4>
              <p>The ObGyn Locums Experience</p>
            </div>
          </div>
          <!-- New 3 -->
          <!-- News -->
        </div>
      </div>
    </div>
    <!-- Locum events -->
    <!-- Testimonials -------------------------------------------------->
    <div id="reviewsSectionBackground">
      <div class="container py-5 d-flex flex-column align-items-center gap-4">
        <!-- comma svg -------------------------------------------------->
        <div>
          <img
            src="images/comma.svg"
            alt="Image not found"
            class="img-fluid rounded"
          />
        </div>
        <!-- comma svg -->
        <!-- Title -------------------------------------------------->
        <h2 class="text-light text-center">
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
                  class="w-50 d-block text-light text-center fw-bold"
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
                  class="w-50 d-block text-light text-center fw-bold"
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
                  class="w-50 d-block text-light text-center fw-bold"
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
    </div>
    <!-- Testimonials -->
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
