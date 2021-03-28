@extends('index')
@section('content')
    @include('partials.page_header')
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Tổng số khách hàng</h5>
                        <h2 class="mb-0"> 10,28,056</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                        <i class="fa fa-eye fa-fw fa-sm text-info"></i>
                    </div>
                </div>
            </div>
        </div>
        {{-- Widgets --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Tổng nhân viên</h5>
                        <h2 class="mb-0"> 24,763</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                        <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Số sản phẩm</h5>
                        <h2 class="mb-0">14</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                        <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Doanh thu</h5>
                        <h2 class="mb-0"> $149.00</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Danh mục sản phẩm</h5>
                <div class="card-body">
                    <div class="ct-chart-category ct-golden-section" style="height: 315px;"></div>
                    <div class="text-center m-t-40">
                        <span class="legend-item mr-3">
                                <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full "></i></span><span class="legend-text">Man</span>
                        </span>
                        <span class="legend-item mr-3">
                            <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Woman</span>
                        </span>
                        <span class="legend-item mr-3">
                            <span class="fa-xs text-info mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Accessories</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {{-- Charts --}}
        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <select class="custom-select">
                            <option selected>Today</option>
                            <option value="1">Weekly</option>
                            <option value="2">Monthly</option>
                            <option value="3">Yearly</option>
                        </select>
                    </div>
                    <h5 class="mb-0">Doanh thu theo sản phẩm</h5>
                </div>
                <div class="card-body">
                    <div class="ct-chart-product ct-golden-section"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Hiệu suất chiến dịch</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table no-wrap p-table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">Chiến dịch</th>
                                    <th class="border-0">Tiếp cận</th>
                                    <th class="border-0">Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Campaign#1</td>
                                    <td>98,789 </td>
                                    <td>$4563</td>
                                </tr>
                                <tr>
                                    <td>Campaign#2</td>
                                    <td>2,789 </td>
                                    <td>$325</td>
                                </tr>
                                <tr>
                                    <td>Campaign#3</td>
                                    <td>1,459 </td>
                                    <td>$225</td>
                                </tr>
                                <tr>
                                    <td>Campaign#4</td>
                                    <td>5,035 </td>
                                    <td>$856</td>
                                </tr>
                                <tr>
                                    <td>Campaign#5</td>
                                    <td>10,000 </td>
                                    <td>$1000</td>
                                </tr>
                                <tr>
                                    <td>Campaign#5</td>
                                    <td>10,000 </td>
                                    <td>$1000</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <a href="#" class="btn btn-outline-light float-right">Chi tiết</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Bills --}}
        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Hóa đơn gần đây</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Image</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Product Id</th>
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Price</th>
                                    <th class="border-0">Order Time</th>
                                    <th class="border-0">Customer</th>
                                    <th class="border-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="m-r-10"><img src="src/assets/images/product-pic.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #1 </td>
                                    <td>id000001 </td>
                                    <td>20</td>
                                    <td>$80.00</td>
                                    <td>27-08-2018 01:22:12</td>
                                    <td>Patricia J. King </td>
                                    <td><span class="badge-dot badge-brand mr-1"></span>InTransit </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="m-r-10"><img src="src/assets/images/product-pic-2.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #2 </td>
                                    <td>id000002 </td>
                                    <td>12</td>
                                    <td>$180.00</td>
                                    <td>25-08-2018 21:12:56</td>
                                    <td>Rachel J. Wicker </td>
                                    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="m-r-10"><img src="src/assets/images/product-pic-3.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #3 </td>
                                    <td>id000003 </td>
                                    <td>23</td>
                                    <td>$820.00</td>
                                    <td>24-08-2018 14:12:77</td>
                                    <td>Michael K. Ledford </td>
                                    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="m-r-10"><img src="src/assets/images/product-pic-4.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #4 </td>
                                    <td>id000004 </td>
                                    <td>34</td>
                                    <td>$340.00</td>
                                    <td>23-08-2018 09:12:35</td>
                                    <td>Michael K. Ledford </td>
                                    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                </tr>
                                <tr>
                                    <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
