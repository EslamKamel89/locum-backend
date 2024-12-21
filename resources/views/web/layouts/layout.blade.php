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
    <link rel="icon" href="{{asset('web/images/logo.png')}}">
  </head>
  <body>
    <!-- Navigation  -------------------------------------------------->
    {{-- <div class="text-white bg-primary">
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
    </div> --}}
    <!-- Navigation  -->
    <!-- Navbar  -------------------------------------------------->
    <nav
      class="py-2 navbar navbar-expand-lg bg-body-tertiary navbar-dark sticky-top"
      id="navbar"
    >
      <div class="container-lg">
        <!-- Logo  -------------------------------------------------->
        <a class="navbar-brand text-light" href="{{route('home')}}">
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
                href="{{route('facilities.create')}}"
                >Request Coverage
                </a>

            </li>

            <!-- Medicl Providers dropdown  -------------------------------------------------->
            <li class="nav-item ">
              <a
                class="nav-link text-light fw-bold"
                href="{{route('providers.create')}}"
                role="button"
                data-toggle="modal"
                data-target="#exampleModal"
              >
                For Medical Providers
              </a>

            </li>
            <!-- Medicl Providers dropdown  -->
            <!-- Medicl Facilities  -------------------------------------------------->
            <li class="nav-item">
              <a
                class="nav-link fw-bold"
                aria-current="page"
                href="{{route('facilities.create')}}"
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
@yield('content')
    <!-- Footer -------------------------------------------------->
    <footer class="pt-5 pb-3 text-bg-secondary text-light" style="background-image: url({{asset('web/images/hexagon-bg-blue-1024x1024.jpg')}})">
      <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5><img src="{{asset('web/images/logo.png')}}" width="75" height="75" alt=""></h5>
                <p>
                    AmPm Locum is a medical staffing agency that provides temporary
                    and permanent staffing solutions to medical facilities and
                    medical providers.
                </p>
            </div>
          <div class="col-md-4">
            <h5>Contact Us</h5>
            <p>
              <!-- <i class="fa fa-map-marker"></i> 9 Samia Gamel, Mansoura, Egypt<br /> -->
              <i class="fa fa-phone"></i> +717-578-4737<br />
              <i class="fa fa-envelope"></i> <a href="mailto:maeamyers@gmail.com">maeamyers@gmail.com</a>
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
          <div class="col-md-4">
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
    <script src="{{asset('web/js/jquery-3.7.1.js')}}"></script>
    <script src="{{asset('web/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('web/js/wow.min.js')}}"></script>
    <script>
      new WOW().init();
    </script>
@include('web.ajax.ajax')
    <script src="{{asset('web/js/script.js')}}"></script>
  </body>
</html>
