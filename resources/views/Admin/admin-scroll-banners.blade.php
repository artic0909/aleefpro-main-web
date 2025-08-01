<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Scrolling Banners</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('../../admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('../../admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('../../admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('../../admin/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('../../admin/images/favicon.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        * {
            a {
                text-decoration: none !important;
            }
        }

        .float-button {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 20px;
            right: 20px;
            background-color: #fd7e14;
            /* Customize (orange used here) */
            color: white;
            font-size: 1.1rem;
            border-radius: 50%;
            text-align: center;
            /* font-size: 28px; */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            line-height: 60px;
            z-index: 999;
            transition: background 0.3s ease;
        }

        .float-button:hover {
            background-color: #e96500;
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="/admin/dashboard" style="font-weight: 900;">ALEEF PRO</a>
                <a class="navbar-brand brand-logo-mini" href="/admin/dashboard"><img src="images/logodeveloper.JPG" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="icon-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="images/logodeveloper.JPG" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="ti-power-off text-primary"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <i class="icon-ellipsis"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">



            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/dashboard">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/scroll-banners">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Scroll Banners</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/offers-add">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Offers Add</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Categories</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/admin/main-category">Main Category</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/admin/sub-category">Sub Category</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/products">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Products</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/blogs">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Blogs</span>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Inquiry</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="/admin/contact-us/inquiry">Contact Us</a></li>
                                <li class="nav-item"><a class="nav-link" href="/admin/cart-inquiry">Cart Inquiry</a></li>
                                <li class="nav-item"><a class="nav-link" href="/admin/product-inquiry">Product Inquiry</a></li>
                                <li class="nav-item"><a class="nav-link" href="/admin/customization-inquiry">Custom Inquiry</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/all-users">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Users</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/all-partners">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Partners</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements1" aria-expanded="false" aria-controls="form-elements1">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Company Details</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements1">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="/admin/faq">FAQ</a></li>
                                <li class="nav-item"><a class="nav-link" href="/admin/about-us">About Us</a></li>
                                <li class="nav-item"><a class="nav-link" href="/admin/social-handels">Social Handels</a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="card col-12">
                            <div class="card-body">
                                <h4 class="card-title">Scrolling Banners</h4>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Banners</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($scrollBanners as $banner)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{ asset('storage/' . $banner->image) }}" class="img-fluid" alt="" style="width: 110px; height: 50px; border-radius: 10px;"></td>
                                                <td><button data-bs-toggle="modal" data-bs-target="#scrollEditModal{{ $banner->id }}" class="btn btn-success">Edit</button></td>
                                                <td><button data-bs-toggle="modal" data-bs-target="#scrollDeleteModal{{ $banner->id }}" class="btn btn-danger">Delete</button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <a type="button" class="float-button" data-bs-toggle="modal" data-bs-target="#scrollAddModal">
                    ADD
                </a>

                <!-- Add Modal -->
                <div class="modal fade" id="scrollAddModal" tabindex="-1" aria-labelledby="scrollAddModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{route('admin.scroll-banners.store')}}" method="POST" class="modal-content" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="scrollAddModalLabel">Add Scrolling Banners</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <input type="file" name="image" id="image" class="form-controll">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- Edit Modal -->
                @foreach($scrollBanners as $banner)
                <div class="modal fade" id="scrollEditModal{{ $banner->id }}" tabindex="-1" aria-labelledby="scrollEditModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{route('admin.scroll-banner.edit', $banner->id)}}" method="POST" class="modal-content" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="scrollEditModalLabel{{ $banner->id }}">Edit Scrolling Banners</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <img src="{{ asset('storage/' . $banner->image) }}" class="img-fluid" alt="" width="100%" style="border-radius: 10px; margin-bottom: 10px;">

                                    <input type="file" name="image" id="image" class="form-controll">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach

                <!-- Delete Modal -->
                @foreach($scrollBanners as $banner)
                <div class="modal fade" id="scrollDeleteModal{{ $banner->id }}" tabindex="-1" aria-labelledby="scrollDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{route('admin.scroll-banner.delete', $banner->id)}}" method="POST" class="modal-content" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">
                                <div>
                                    <h2 class="text-danger">You want to this image?</h2>
                                    <img src="{{ asset('storage/' . $banner->image) }}" class="img-fluid" alt="" width="100%" style="border-radius: 10px; margin-top: 10px;">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach


                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. Premium <a href="https://github.com/artic0909" target="_blank">Saklin admin template</a> - All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Easy-To-Use & made with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://github.com/artic0909" target="_blank">SaklinMustak</a></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('../../admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.select.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('../../admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('../../admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('../../js/template.js') }}"></script>
    <script src="{{ asset('../../js/settings.js') }}"></script>
    <script src="{{ asset('../../js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>