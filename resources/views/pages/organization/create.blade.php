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
                <div class="d-flex align-content-center mb-3">
                    <a href="{{url()->previous()}}" class="btn btn-primary">Quay lại</a>
                    <h2 class="pl-3">Tạo tổ chức</h2>
                </div>
                <div class="card">
                    <h5 class="card-header">Tạo tổ chức mới</h5>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="name" class="col-form-label">Tên tổ chức</label>
                                    <input id="name" type="text" class="form-control" placeholder="Tên tổ chức">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="short_name" class="col-form-label">Tên rút gọn</label>
                                    <input id="short_name" type="text" class="form-control" placeholder="Tên rút gọn">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" placeholder="name@example.com" class="form-control">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <small class="text-muted">(999) 999-9999</small>
                                    <input id="phone" type="text" placeholder="Số điện thoại" class="form-control">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="website">Website</label>
                                    <input id="website" type="text" placeholder="Website" class="form-control">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="fouding">Ngày thành lập</label>
                                    <input id="fouding" type="date" placeholder="Ngày thành lập" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="rep_by">Đại diện</label>
                                    <input id="rep_by" type="text" placeholder="Đại diện bởi" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="business">Ngành nghề</label>
                                    <input id="business" type="text" placeholder="Ngành nghề" class="form-control">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="desc">Mô tả</label>
                                    <textarea class="form-control" id="desc" rows="3"></textarea>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="" for="banner">Banner</label>
                                    <input type="file" id="banner">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="" for="banner">Avatar</label>
                                    <input type="file" id="avatar">
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-primary">Tạo</button>
                                </div>
                            </div>
                        </form>
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

    <script src="src/assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>
