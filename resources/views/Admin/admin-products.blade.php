<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Products</title>
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
                                <h4 class="card-title">All Products</h4>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Images</th>
                                                <th>Main Category Name</th>
                                                <th>Sub Category Name</th>
                                                <th>Product Name</th>
                                                <th>Sizes</th>
                                                <th>Colors</th>
                                                <th>Actual Price</th>
                                                <th>Selling Price</th>
                                                <th>Size Chart</th>
                                                <th>Description</th>
                                                <th>Information</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    @php
                                                    $images = json_decode($product->images);
                                                    @endphp

                                                    @if ($images && count($images) > 0)
                                                    <img src="{{ asset('storage/' . $images[0]) }}" class="img-fluid" alt="">
                                                    @else
                                                    <span>No image</span>
                                                    @endif
                                                </td>

                                                <td>{{$product->subCategory->mainCategory->main_category_name}}</td>
                                                <td>{{$product->subCategory->sub_category_name}}</td>
                                                <td>{{$product->product_name}}</td>
                                                <td>{{$product->sizes}}</td>
                                                <td>{{$product->colors}}</td>
                                                <td>{{$product->actual_price}}</td>
                                                <td>{{$product->selling_price}}</td>

                                                <td><img src="{{ asset('storage/' . $product->size_chart_image) }}" class="img-fluid" alt=""></td>
                                                <td><button data-bs-toggle="modal" data-bs-target="#scrollDescriptionModal{{ $product->id }}" class="btn btn-warning">Desccription</button></td>
                                                <td><button data-bs-toggle="modal" data-bs-target="#scrollInfoModal{{ $product->id }}" class="btn btn-info">Info</button></td>
                                                <td><button data-bs-toggle="modal" data-bs-target="#scrollEditModal{{$product->id}}" class="btn btn-success">Edit</button></td>
                                                <td><button data-bs-toggle="modal" data-bs-target="#scrollDeleteModal{{$product->id}}" class="btn btn-danger">Delete</button></td>
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
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <form action="{{ route('admin.product.store') }}" method="POST" class="modal-content" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="scrollAddModalLabel">Add Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="">
                                    <label for="image" class="form-label">Product Images<span class="text-danger">*</span></label>
                                    <input type="file" name="images[]" id="images" class="form-control" multiple required>
                                </div>

                                <div class="mt-3">
                                    <label for="main_category_name" class="form-label">Main Category<span class="text-danger">*</span></label>
                                    <select name="main_category_id" id="main_category_id" class="form-select">
                                        <!-- existing main category show here-->
                                        <option value="" selected>Select Main Category</option>

                                        <!-- normal main category drop down function like add product-->
                                        @foreach ($mainCategories as $mainCategory)
                                        <option value="{{ $mainCategory->id }}">{{ $mainCategory->main_category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <label for="sub_category_id" class="form-label">Sub Category<span class="text-danger">*</span></label>
                                    <select name="sub_category_id" id="sub_category_id" class="form-select">
                                        <!-- existing sub category show here-->
                                        <option value="" selected>Select Sub Category</option>

                                        <!-- normal sub category drop down function show using ajax like add product-->

                                    </select>
                                </div>

                                <div class="mt-3">
                                    <label for="product_name" class="form-label">Product Name<span class="text-danger">*</span></label>
                                    <input type="text" name="product_name" id="product_name" class="form-control" required>
                                </div>

                                <div class="mt-3">
                                    <label for="sizes" class="form-label">Sizes<span class="text-danger">*</span></label>
                                    <input type="text" name="sizes" id="sizes" class="form-control" placeholder="e.g. S,M,L" required>
                                </div>

                                <div class="mt-3">
                                    <label for="colors" class="form-label">Colors<span class="text-danger">*</span></label>
                                    <input type="text" name="colors" id="colors" class="form-control" placeholder="e.g. Red,Blue,Green" required>
                                </div>

                                <div class="mt-3">
                                    <label for="actual_price" class="form-label">Actual Price<span class="text-danger">*</span></label>
                                    <input type="text" name="actual_price" id="actual_price" class="form-control" required>
                                </div>

                                <div class="mt-3">
                                    <label for="selling_price" class="form-label">Selling Price<span class="text-danger">*</span></label>
                                    <input type="text" name="selling_price" id="selling_price" class="form-control" required>
                                </div>

                                <div class="mt-3">
                                    <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                                </div>


                                <div class="mt-3">
                                    <label for="information" class="form-label">Information<span class="text-danger">*</span></label>
                                    <textarea name="information" id="information" class="form-control" rows="3" required></textarea>
                                </div>

                                <div class="mt-3">
                                    <label for="size_chart_image" class="form-label">Size Chart Image<span class="text-danger">*</span></label>
                                    <input type="file" name="size_chart_image" id="size_chart_image" class="form-control" required>
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
                @foreach ($products as $product)
                <div class="modal fade" id="scrollEditModal{{ $product->id }}" tabindex="-1" aria-labelledby="scrollEditModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" class="modal-content" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title" id="scrollEditModalLabel">Edit Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="">
                                    <!-- show all images -->
                                    @php
                                    $images = json_decode($product->images);
                                    @endphp

                                    @if ($images && count($images) > 0)
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach ($images as $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="Product Image" class="img-thumbnail" width="100" height="100">
                                        @endforeach
                                    </div>
                                    @else
                                    <p class="text-muted">No images available.</p>
                                    @endif
                                </div>
                                <div class="mt-3">
                                    <label for="image" class="form-label">Product Images<span class="text-danger">*</span></label>
                                    <input type="file" name="images[]" id="images" class="form-control" multiple>
                                </div>

                                <div class="mt-3">
                                    <label for="main_category_name" class="form-label">Main Category<span class="text-danger">*</span></label>
                                    <select name="main_category_id" class="form-select main-category-select" data-product-id="{{ $product->id }}">
                                        <option value="">Select Main Category</option>
                                        @foreach ($mainCategories as $mainCategory)
                                        <option value="{{ $mainCategory->id }}" {{ $mainCategory->id == $product->subCategory->main_category_id ? 'selected' : '' }}>
                                            {{ $mainCategory->main_category_name }}
                                        </option>
                                        @endforeach
                                    </select>


                                </div>

                                <div class="mt-3">
                                    <label for="sub_category_id" class="form-label">Sub Category<span class="text-danger">*</span></label>
                                    <select name="sub_category_id" id="sub_category_id_{{ $product->id }}" class="form-select sub-category-select">
                                        <option value="">Select Sub Category</option>
                                        @foreach ($subCategories as $subCategory)
                                        @if ($subCategory->main_category_id == $product->subCategory->main_category_id)
                                        <option value="{{ $subCategory->id }}" {{ $subCategory->id == $product->sub_category_id ? 'selected' : '' }}>
                                            {{ $subCategory->sub_category_name }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>

                                </div>

                                <div class="mt-3">
                                    <label for="product_name" class="form-label">Product Name<span class="text-danger">*</span></label>
                                    <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product->product_name }}">
                                </div>

                                <div class="mt-3">
                                    <label for="sizes" class="form-label">Sizes<span class="text-danger">*</span></label>
                                    <input type="text" name="sizes" id="sizes" class="form-control" value="{{ $product->sizes }}">
                                </div>

                                <div class="mt-3">
                                    <label for="colors" class="form-label">Colors<span class="text-danger">*</span></label>
                                    <input type="text" name="colors" id="colors" class="form-control" value="{{ $product->colors }}">
                                </div>

                                <div class="mt-3">
                                    <label for="actual_price" class="form-label">Actual Price<span class="text-danger">*</span></label>
                                    <input type="text" name="actual_price" id="actual_price" value="{{ $product->actual_price }}" class="form-control">
                                </div>

                                <div class="mt-3">
                                    <label for="selling_price" class="form-label">Selling Price<span class="text-danger">*</span></label>
                                    <input type="text" name="selling_price" id="selling_price" value="{{ $product->selling_price }}" class="form-control">
                                </div>

                                <div class="mt-3">
                                    <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                                </div>


                                <div class="mt-3">
                                    <label for="information" class="form-label">Information<span class="text-danger">*</span></label>
                                    <textarea name="information" id="information" class="form-control" rows="3">{{ $product->information }}</textarea>
                                </div>

                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $product->size_chart_image) }}" alt="" class="img-fluid" width="100" height="100">
                                </div>

                                <div class="mt-3">
                                    <label for="size_chart_image" class="form-label">Size Chart Image<span class="text-danger">*</span></label>
                                    <input type="file" name="size_chart_image" id="size_chart_image" class="form-control">
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
                @foreach ($products as $product)
                <div class="modal fade" id="scrollDeleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="scrollDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{route('admin.product.delete', $product->id)}}" method="POST" class="modal-content" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">
                                <div>
                                    <h2 class="text-danger">You want to this Product?</h2>
                                    <h3>{{ $product->product_name }}</h3>

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

                <!-- Description Modal -->
                @foreach ($products as $product)
                <div class="modal fade" id="scrollDescriptionModal{{ $product->id }}" tabindex="-1" aria-labelledby="scrollDescriptionModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="scrollDescriptionModalLabel">Product Description</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <h4 class="text-danger">{{ $product->product_name}}</h4>
                                    <h5>Description: {{ $product->description }}</h5>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Information Modal -->
                @foreach ($products as $product)
                <div class="modal fade" id="scrollInfoModal{{ $product->id }}" tabindex="-1" aria-labelledby="scrollInfoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="scrollInfoModalLabel">Product Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div>
                                    <h4 class="text-danger">{{ $product->product_name}}</h4>
                                    <h5>Information: {{ $product->information }}</h5>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#main_category_id').on('change', function() {
            var mainCategoryId = $(this).val();
            $('#sub_category_id').empty().append('<option value="">Loading...</option>');

            if (mainCategoryId) {
                $.ajax({
                    url: "{{ route('getSubCategories') }}",
                    type: "GET",
                    data: {
                        main_category_id: mainCategoryId
                    },
                    success: function(response) {
                        $('#sub_category_id').empty().append('<option value="">Select Sub Category</option>');
                        $.each(response.subcategories, function(key, subcategory) {
                            $('#sub_category_id').append(
                                `<option value="${subcategory.id}">${subcategory.sub_category_name}</option>`
                            );
                        });
                    },
                    error: function() {
                        $('#sub_category_id').empty().append('<option value="">Error loading data</option>');
                    }
                });
            }
        });
    </script>


    <script>
        $(document).ready(function() {
            // EDIT MODAL: Subcategory update based on main category
            $('.main-category-select').on('change', function() {
                let mainCategoryId = $(this).val();
                let productId = $(this).data('product-id');
                let subCategorySelect = $('#sub_category_id_' + productId);

                subCategorySelect.empty().append('<option value="">Loading...</option>');

                if (mainCategoryId) {
                    $.ajax({
                        url: "{{ route('getSubCategories') }}",
                        type: "GET",
                        data: {
                            main_category_id: mainCategoryId
                        },
                        success: function(response) {
                            subCategorySelect.empty().append('<option value="">Select Sub Category</option>');
                            $.each(response.subcategories, function(key, subcategory) {
                                subCategorySelect.append(
                                    `<option value="${subcategory.id}">${subcategory.sub_category_name}</option>`
                                );
                            });
                        },
                        error: function() {
                            subCategorySelect.empty().append('<option value="">Error loading data</option>');
                        }
                    });
                }
            });
        });
    </script>



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