<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{asset('')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="src/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="src/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="src/assets/libs/css/style.css">
    <link rel="stylesheet" href="src/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="src/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="src/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="src/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="src/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="src/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body>
    @include('inc.header')
    <div class="dashboard-main-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">
                <div class="d-flex justify-content-between">
                    <h2>Chọn tổ chức</h2>
                    <a href="{{url('/organization/create')}}" class="btn btn-space btn-primary">Tạo<i class="fa fa-fw fa-plus" aria-hidden="true"></i></a>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="image-card">
                            <h3 class="section-title">Số lượng: 5</h3>
                            {{-- <p>Cards include a few options for working with images. Choose from appending “image caps” at either end of a card, overlaying images with card content, or simply embedding the image in a card.</p> --}}
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="src/assets/images/card-img.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title">Card title</h3>
                                <p class="card-text">Vestibuluimis in faucibus orci luctus et ultrices posuere cubilia Curis ipsum in augue posuere congue.</p>
                                <a href="{{url('/organization/1')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="src/assets/images/card-img.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title">Card title</h3>
                                <p class="card-text">Vestibuluimis in faucibus orci luctus et ultrices posuere cubilia Curis ipsum in augue posuere congue.</p>
                                <a href="{{url('/organization/1')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="src/assets/images/card-img.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title">Card title</h3>
                                <p class="card-text">Vestibuluimis in faucibus orci luctus et ultrices posuere cubilia Curis ipsum in augue posuere congue.</p>
                                <a href="{{url('/organization/1')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                <div/>
            </div>
        </div>
    </div>
    @include('inc.footer')
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="src/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="src/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="src/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="src/assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="src/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="src/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="src/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="src/assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="src/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="src/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="src/assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="src/assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>
