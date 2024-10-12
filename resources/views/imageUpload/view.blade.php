<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ url('assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>View Uploaded Image & Download</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ url('assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ url('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Content -->
    {{-- {{ dd($data) }} --}}
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('compressFrom') }}" class="btn btn-sm btn-primary">Back To Upload</a>
                <h3 class="text-center my-3">View Image</h3>
            </div>
            <hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ $data['preview_link'] }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{ $data['image_name'] }}</h5>
                                <a href="{{ $data['download_link'] }}" class="btn btn-primary">Download Image</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Image Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <h6>Image Name : </h6>
                                    </div>
                                    <div class="col-8"><span>{{ $data['image_name'] }}</span></div>

                                    <div class="col-4">
                                        <h6>Image Preview Link : </h6>
                                    </div>
                                    <div class="col-8"><span>{{ $data['preview_link'] }}</span></div>

                                    <div class="col-4">
                                        <h6>Image Download Link : </h6>
                                    </div>
                                    <div class="col-8"><span>{{ $data['download_link'] }}</span></div>

                                    <div class="col-4">
                                        <h6>Image Original Size : </h6>
                                    </div>
                                    <div class="col-8"><span>{{ $data['original_size_mb'] }}</span></div>

                                    <div class="col-4">
                                        <h6>Image Compressed Size : </h6>
                                    </div>
                                    <div class="col-8"><span>{{ $data['compressed_size_mb'] }}</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ url('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ url('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ url('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ url('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ url('assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
