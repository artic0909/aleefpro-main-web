<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Aleef Pro</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="Free HTML Templates" name="keywords" />
  <meta content="Free HTML Templates" name="description" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet" />
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/serach-responsive.css" rel="stylesheet">
</head>

<body>
  <!-- Topbar Start -->
  <div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
      <div class="col-lg-6 d-none d-lg-block">
        <div class="d-inline-flex align-items-center h-100">
          <a class="text-body mr-3" href="about.html">About</a>
          <a class="text-body mr-3" href="contact.html">Contact</a>
          <a class="text-body mr-3" href="faq.html">FAQs</a>
        </div>
      </div>


      <div class="col-lg-6 text-center text-lg-right">
        <div class="d-inline-flex align-items-center">

          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
              <i class="fa-regular fa-user"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">

              <a href="" class="dropdown-item" type="button"><i class="fa-solid fa-gear"></i> Profile</a>
              <a href="{{ route('customer.logout') }}" class="dropdown-item" type="button"><i class="fa-solid fa-power-off"></i> Logout</a>

            </div>
          </div>

          &nbsp;


          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
              EN
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <button class="dropdown-item" type="button">FR</button>
              <button class="dropdown-item" type="button">AR</button>
              <button class="dropdown-item" type="button">RU</button>
            </div>
          </div>


          <div class="btn-group initial-hide">
            <div style="display: flex; gap: 5px;">
              <form action="">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for products" />
                  <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-primary">
                      <i class="fa fa-search"></i>
                    </span>
                  </div>
                </div>
              </form>

              <a href="" class="btn px-0">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge text-danger border border-warning rounded-circle"
                  style="">0</span>
              </a>
            </div>


          </div>


        </div>
      </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
      <div class="col-lg-4">
        <a href="index.html" class="text-decoration-none d-flex align-items-center">
          <img src="img/logo1.webp" class="img-fluid" width="55" alt="logo" />
          <div class="">
            <span class="h1 text-uppercase text-white bg-org px-2">Aleef</span>
            <span class="h1 text-uppercase text-white bg-blue px-2 ml-n1">Pro</span>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-6 text-left">
        <form action="">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for products" />
            <div class="input-group-append">
              <span class="input-group-text bg-transparent text-primary">
                <i class="fa fa-search"></i>
              </span>
            </div>
          </div>
        </form>


      </div>
      <div class="col-lg-4 col-6 text-right">
        <p class="m-0">Customer Service</p>
        <h5 class="m-0">+012 345 6789</h5>
      </div>
    </div>
  </div>
  <!-- Topbar End -->

  <!-- Navbar Start -->
  <div class="container-fluid bg-blue mb-30">
    <div class="row px-xl-5">
      <div class="col-lg-3 d-none d-lg-block">
        <a class="btn d-flex align-items-center justify-content-between bg-org text-white w-100" data-toggle="collapse"
          href="#navbar-vertical" style="height: 65px; padding: 0 30px">
          <h6 class="text-white m-0">
            <i class="fa fa-bars mr-2"></i>Categories
          </h6>
          <i class="fa fa-angle-down text-white"></i>
        </a>
        <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
          id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999">
          <div class="navbar-nav w-100">
            <div class="nav-item dropdown dropright">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Safety Vests<i
                  class="fa fa-angle-right float-right mt-1"></i></a>
              <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                <a href="" class="dropdown-item">HiVis Tape</a>
                <a href="" class="dropdown-item">Contras Tape</a>
              </div>
            </div>

            <div class="nav-item dropdown dropright">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Safety Vests<i
                  class="fa fa-angle-right float-right mt-1"></i></a>
              <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                <a href="" class="dropdown-item">Safety Shirts</a>
                <a href="" class="dropdown-item">Contras Tape</a>
              </div>
            </div>

            <div class="nav-item dropdown dropright">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Safety Jackets<i
                  class="fa fa-angle-right float-right mt-1"></i></a>
              <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                <a href="" class="dropdown-item">HiVis Tape</a>
                <a href="" class="dropdown-item">Contras Tape</a>
              </div>
            </div>

            <div class="nav-item dropdown dropright">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Rainwear Jackets<i
                  class="fa fa-angle-right float-right mt-1"></i></a>
              <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                <a href="" class="dropdown-item">HiVis Tape</a>
                <a href="" class="dropdown-item">Contras Tape</a>
              </div>
            </div>

            <div class="nav-item dropdown dropright">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Safety Supplies<i
                  class="fa fa-angle-right float-right mt-1"></i></a>
              <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                <a href="" class="dropdown-item">HiVis Headwear</a>
                <a href="" class="dropdown-item">HiVis Gearbags</a>
                <a href="" class="dropdown-item">Safety Gloves</a>
                <a href="" class="dropdown-item">Safety Glasses</a>
                <a href="" class="dropdown-item">Sun Protection</a>
                <a href="" class="dropdown-item">Colling Products</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
      <div class="col-lg-9">
        <nav class="navbar navbar-expand-lg bg-blue navbar-dark py-3 py-lg-0 px-0">
          <a href="" class="text-decoration-none d-block d-lg-none">
            <span class="h1 text-uppercase text-white bg-org px-2">Aleef</span>
            <span class="h1 text-uppercase text-white bg-blue px-2 ml-n1">Pro</span>
          </a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
              <a href="index.html" class="nav-item nav-link active">Home</a>
              <a href="product-categories.html" class="nav-item nav-link">Products</a>
              <a href="blogs.html" class="nav-item nav-link">Blogs</a>
              <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <div class="navbar-nav ml-auto py-0 d-none d-lg-block">

              <a href="" class="btn px-0">
                <i class="fas fa-user text-primary"></i>
                <span class="badge text-success" style="padding-bottom: 2px">✔</span>
              </a>


              <a href="" class="btn px-0 ml-3">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge text-secondary border border-secondary rounded-circle"
                  style="padding-bottom: 2px">0</span>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <!-- Navbar End -->

  <!-- Carousel Start -->
  <div class="container-fluid mb-3">
    <div class="row px-xl-5">
      <div class="col-lg-8">
        <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#header-carousel" data-slide-to="1"></li>
            <li data-target="#header-carousel" data-slide-to="2"></li>
            <li data-target="#header-carousel" data-slide-to="3"></li>
            <li data-target="#header-carousel" data-slide-to="4"></li>
          </ol>
          <div class="carousel-inner" style="border-radius: 10px;">
            <div class="carousel-item position-relative active" style="height: 430px">
              <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover" />
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <!-- <div class="p-3" style="max-width: 700px">
                  <h3 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                    SAFETY VESTS
                  </h3>
                  <p class="mx-md-5 px-5 animate__animated animate__bounceIn" style="font-size: 1.2rem">
                    HiVis & Contrast Tape vests for industrial visibility.
                  </p>
                  <a class="btn btn-org btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                    href="#">Enquiry Now</a>
                </div> -->
              </div>
            </div>
            <div class="carousel-item position-relative" style="height: 430px">
              <img class="position-absolute w-100 h-100" src="img/carousel-2.jpg" style="object-fit: cover" />
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <!-- <div class="p-3" style="max-width: 700px">
                  <h3 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                    SAFETY SHIRTS
                  </h3>
                  <p class="mx-md-5 px-5 animate__animated animate__bounceIn" style="font-size: 1.2rem">
                    Durable HiVis & Contrast shirts for all work zones.
                  </p>
                  <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Enquiry
                    Now</a>
                </div> -->
              </div>
            </div>

            <div class="carousel-item position-relative" style="height: 430px">
              <img class="position-absolute w-100 h-100" src="img/fr.webp" style="object-fit: cover" />
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <!-- <div class="p-3" style="max-width: 700px">
                  <h3 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                    RAINWEAR JACKETS
                  </h3>
                  <p class="mx-md-5 px-5 animate__animated animate__bounceIn" style="font-size: 1.2rem">
                    Waterproof jackets with HiVis & Contrast Tape.
                  </p>
                  <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Enquiry
                    Now</a>
                </div> -->
              </div>
            </div>

            <div class="carousel-item position-relative" style="height: 430px">
              <img class="position-absolute w-100 h-100" src="img/carousel-2.jpg" style="object-fit: cover" />
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <!-- <div class="p-3" style="max-width: 700px">
                  <h3 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                    PROTECTIVE JACKETS
                  </h3>
                  <p class="mx-md-5 px-5 animate__animated animate__bounceIn" style="font-size: 1.2rem">
                    All-weather jackets with high-visibility designs.
                  </p>
                  <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Enquiry
                    Now</a>
                </div> -->
              </div>
            </div>

            <div class="carousel-item position-relative" style="height: 430px">
              <img class="position-absolute w-100 h-100" src="img/carousel-2.jpg" style="object-fit: cover" />
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <!-- <div class="p-3" style="max-width: 700px">
                  <h3 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                    INDUSTRIAL SAFETY WEAR
                  </h3>
                  <p class="mx-md-5 px-5 animate__animated animate__bounceIn" style="font-size: 1.2rem">
                    Explore, inquire, and source safety gear with ease.
                  </p>
                  <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Enquiry
                    Now</a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="product-offer mb-30" style="height: 200px; border-radius: 10px;">
          <img class="img-fluid" src="img/offer-1.jpg" alt="" />
          <div class="offer-text">
            <h6 class="text-white text-uppercase">Save 20%</h6>
            <h3 class="text-white mb-3">Special Offer</h3>
            <a href="" class="btn btn-primary2 text-white" style="border-radius: 5px;">Shop Now</a>
          </div>
        </div>
        <div class="product-offer mb-30" style="height: 200px; border-radius: 10px;">
          <img class="img-fluid" src="img/offer-2.jpg" alt="" />
          <div class="offer-text">
            <h6 class="text-white text-uppercase">Save 20%</h6>
            <h3 class="text-white mb-3">Special Offer</h3>
            <a href="" class="btn btn-primary2 text-white" style="border-radius: 5px;">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Carousel End -->

  <!-- Featured Start -->
  <div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center bg-blue mb-4" style="padding: 30px">
          <h1 class="text-primary m-0 mr-3">
            <i class="fa-solid fa-medal"></i>
          </h1>
          <h5 class="font-weight-semi-bold text-white m-0">
            Certified Apparel
          </h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center bg-blue mb-4" style="padding: 30px">
          <h1 class="text-primary m-0 mr-2">
            <i class="fa-solid fa-boxes-stacked"></i>
          </h1>
          <h5 class="font-weight-semi-bold text-white m-0">Bulk Inquiry</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center bg-blue mb-4" style="padding: 30px">
          <h1 class="text-primary m-0 mr-3">
            <i class="fa-solid fa-file"></i>
          </h1>
          <h5 class="font-weight-semi-bold text-white m-0">
            Product Catalog
          </h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center bg-blue mb-4" style="padding: 30px">
          <h1 class="text-primary m-0 mr-3">
            <i class="fa-solid fa-pen-to-square"></i>
          </h1>
          <h5 class="font-weight-semi-bold text-white m-0">
            Custom Branding
          </h5>
        </div>
      </div>
    </div>
  </div>
  <!-- Featured End -->

  <!-- Categories Start -->
  <div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
      <span class="bg-secondary pr-3">Categories</span>
    </h2>
    <div class="row px-xl-5 pb-3">
      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a class="text-decoration-none" href="products.html">
          <div class="cat-item d-flex align-items-center mb-4" style="box-shadow: 0 0 10px #d8d8d8">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
              <img class="img-fluid" src="img/category.webp" alt="" />
            </div>
            <div class="flex-fill pl-3">
              <h5>HiVis Shirts</h5>
              <span class="text-body">100 Products</span>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a class="text-decoration-none" href="products.html">
          <div class="cat-item d-flex align-items-center mb-4" style="box-shadow: 0 0 10px #d8d8d8">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
              <img class="img-fluid" src="img/category2.webp" alt="" />
            </div>
            <div class="flex-fill pl-3">
              <h5>HiVis Shirts</h5>
              <span class="text-body">100 Products</span>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a class="text-decoration-none" href="products.html">
          <div class="cat-item d-flex align-items-center mb-4" style="box-shadow: 0 0 10px #d8d8d8">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
              <img class="img-fluid" src="img/category3.webp" alt="" />
            </div>
            <div class="flex-fill pl-3">
              <h5>HiVis Shirts</h5>
              <span class="text-body">100 Products</span>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a class="text-decoration-none" href="products.html">
          <div class="cat-item d-flex align-items-center mb-4" style="box-shadow: 0 0 10px #d8d8d8">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
              <img class="img-fluid" src="img/category4.webp" alt="" />
            </div>
            <div class="flex-fill pl-3">
              <h5>HiVis Shirts</h5>
              <span class="text-body">100 Products</span>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a class="text-decoration-none" href="products.html">
          <div class="cat-item d-flex align-items-center mb-4" style="box-shadow: 0 0 10px #d8d8d8">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
              <img class="img-fluid" src="img/category5.webp" alt="" />
            </div>
            <div class="flex-fill pl-3">
              <h5>HiVis Shirts</h5>
              <span class="text-body">100 Products</span>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a class="text-decoration-none" href="products.html">
          <div class="cat-item d-flex align-items-center mb-4" style="box-shadow: 0 0 10px #d8d8d8">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
              <img class="img-fluid" src="img/category6.webp" alt="" />
            </div>
            <div class="flex-fill pl-3">
              <h5>HiVis Shirts</h5>
              <span class="text-body">100 Products</span>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a class="text-decoration-none" href="products.html">
          <div class="cat-item d-flex align-items-center mb-4" style="box-shadow: 0 0 10px #d8d8d8">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
              <img class="img-fluid" src="img/category7.webp" alt="" />
            </div>
            <div class="flex-fill pl-3">
              <h5>HiVis Shirts</h5>
              <span class="text-body">100 Products</span>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a class="text-decoration-none" href="products.html">
          <div class="cat-item d-flex align-items-center mb-4" style="box-shadow: 0 0 10px #d8d8d8">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
              <img class="img-fluid" src="img/category8.webp" alt="" />
            </div>
            <div class="flex-fill pl-3">
              <h5>HiVis Shirts</h5>
              <span class="text-body">100 Products</span>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a class="text-decoration-none" href="products.html">
          <div class="cat-item d-flex align-items-center mb-4" style="box-shadow: 0 0 10px #d8d8d8">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
              <img class="img-fluid" src="img/category9.webp" alt="" />
            </div>
            <div class="flex-fill pl-3">
              <h5>HiVis Shirts</h5>
              <span class="text-body">100 Products</span>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a class="text-decoration-none" href="products.html">
          <div class="cat-item d-flex align-items-center mb-4" style="box-shadow: 0 0 10px #d8d8d8">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
              <img class="img-fluid" src="img/category10.webp" alt="" />
            </div>
            <div class="flex-fill pl-3">
              <h5>HiVis Shirts</h5>
              <span class="text-body">100 Products</span>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a class="text-decoration-none" href="products.html">
          <div class="cat-item d-flex align-items-center mb-4" style="box-shadow: 0 0 10px #d8d8d8">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
              <img class="img-fluid" src="img/category11.webp" alt="" />
            </div>
            <div class="flex-fill pl-3">
              <h5>HiVis Shirts</h5>
              <span class="text-body">100 Products</span>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a class="text-decoration-none" href="products.html">
          <div class="cat-item d-flex align-items-center mb-4" style="box-shadow: 0 0 10px #d8d8d8">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
              <img class="img-fluid" src="img/category12.webp" alt="" />
            </div>
            <div class="flex-fill pl-3">
              <h5>HiVis Shirts</h5>
              <span class="text-body">100 Products</span>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
  <!-- Categories End -->

  <!-- Offer Start -->
  <div class="container-fluid pt-5 pb-3">
    <div class="row px-xl-5">
      <div class="col-md-6">
        <div class="product-offer mb-30" style="height: 300px">
          <img class="img-fluid" src="img/offer-1.jpg" alt="" />
          <div class="offer-text">
            <h6 class="text-white text-uppercase">Save 20%</h6>
            <h3 class="text-white mb-3">Special Offer</h3>
            <a href="" class="btn btn-primary2">Shop Now</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="product-offer mb-30" style="height: 300px">
          <img class="img-fluid" src="img/offer-2.jpg" alt="" />
          <div class="offer-text">
            <h6 class="text-white text-uppercase">Save 20%</h6>
            <h3 class="text-white mb-3">Special Offer</h3>
            <a href="" class="btn btn-primary2">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Offer End -->

  <!-- Products Start -->
  <div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
      <span class="bg-secondary pr-3">Safety Products</span>
    </h2>
    <div class="row px-xl-5">

      <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <div class="product-item bg-light mb-4">
          <div class="product-img position-relative overflow-hidden">
            <img class="img-fluid w-100" src="img/category.webp" alt="" />

          </div>
          <div class="text-center py-4 p-3">
            <a class="h6 text-decoration-none text-cl" href="">DV2183 Enhanced Visibility Identification HiVis Contrast
              Mesh
              Safety Vest</a>
            <div class="d-flex align-items-center justify-content-center mt-2">
              <h5>₹999.00</h5>
              <h6 class="text-muted ml-2"><del>₹1053.00</del></h6>
            </div>
            <div class="d-flex align-items-center justify-content-center mb-1">
              <small class="fa fa-star text-primary mr-1"></small>
              <small class="fa fa-star text-primary mr-1"></small>
              <small class="fa fa-star text-primary mr-1"></small>
              <small class="fa fa-star text-primary mr-1"></small>
              <small class="fa fa-star text-primary mr-1"></small>
            </div>

            <div class="product-actions mt-3" style="display: flex; justify-content: space-evenly;">
              <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>

              <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>

              <a class="btn btn-outline-dark btn-square" href=""><i class="fa-solid fa-pen-to-square"></i></a>

              <a class="btn btn-outline-dark btn-square" href=""><i class="fa-solid fa-circle-info"></i></a>
            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
  <!-- Products End -->



  <!-- Vendor Start -->
  <div class="container-fluid py-5">
    <div class="row px-xl-5">
      <div class="col">
        <div class="owl-carousel vendor-carousel">
          <div class="bg-light p-4">
            <img src="img/vendor-1.jpg" alt="" />
          </div>
          <div class="bg-light p-4">
            <img src="img/vendor-2.jpg" alt="" />
          </div>
          <div class="bg-light p-4">
            <img src="img/vendor-3.jpg" alt="" />
          </div>
          <div class="bg-light p-4">
            <img src="img/vendor-4.jpg" alt="" />
          </div>
          <div class="bg-light p-4">
            <img src="img/vendor-5.jpg" alt="" />
          </div>
          <div class="bg-light p-4">
            <img src="img/vendor-6.jpg" alt="" />
          </div>
          <div class="bg-light p-4">
            <img src="img/vendor-7.jpg" alt="" />
          </div>
          <div class="bg-light p-4">
            <img src="img/vendor-8.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Vendor End -->

  <!-- Footer Start -->
  <div class="container-fluid bg-blue text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
      <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
        <img src="img/logo1.jpg" class="img-fluid fade-edges" width="400" alt="logo" />
        <p class="mb-2 mt-2">
          <i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street,
          New York, USA
        </p>
        <p class="mb-2">
          <i class="fa fa-envelope text-primary mr-3"></i>info@example.com
        </p>
        <p class="mb-0">
          <i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890
        </p>
      </div>
      <div class="col-lg-8 col-md-12">
        <div class="row">
          <div class="col-md-4 mb-5">
            <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
            <div class="d-flex flex-column justify-content-start">
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Links</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Links</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Links</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Links</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Links</a>
              <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Links</a>
            </div>
          </div>
          <div class="col-md-4 mb-5">
            <h5 class="text-secondary text-uppercase mb-4">Usefull Links</h5>
            <div class="d-flex flex-column justify-content-start">
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Links</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Links</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Links</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Links</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Links</a>
              <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Links</a>
            </div>
          </div>
          <div class="col-md-4 mb-5">
            <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
            <p>Send us your email &amp; get latest updates!</p>
            <form action="">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Your Email Address" />
                <div class="input-group-append">
                  <button class="btn btn-primary2">SEND</button>
                </div>
              </div>
            </form>
            <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
            <div class="d-flex">
              <a class="btn btn-primary2 btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
              <a class="btn btn-primary2 btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-primary2 btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
              <a class="btn btn-primary2 btn-square" href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, 0.1) !important">
      <div class="col-md-6 px-xl-0">
        <p class="mb-md-0 text-center text-md-left text-secondary">
          &copy; <a class="text-primary" href="#">Domain</a>. All Rights
          Reserved. Designed by
          <a class="text-primary" href="">Aleef Pro Factory Showroom</a>
        </p>
      </div>
      <div class="col-md-6 px-xl-0 text-center text-md-right">
        <img class="img-fluid" src="img/payments.png" alt="" />
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary2 back-to-top"><i class="fa fa-angle-double-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Javascript File -->
  <script src="mail/jqBootstrapValidation.min.js"></script>
  <script src="mail/contact.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>