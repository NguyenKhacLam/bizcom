@extends('index')
@section('content')
    @include('partials.page_header')
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Doanh thu</h5>
                        <h2 class="mb-0">$149.00</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Chi phí</h5>
                        <h2 class="mb-0">$149.00</h2>
                    </div>
                    <div class="float-right icon-circle-medium icon-box-lg  bg-danger-light mt-1">
                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Lợi nhuận</h5>
                        <h2 class="mb-0">$149.00</h2>
                    </div>
                    <div class="float-right icon-circle-medium icon-box-lg  bg-success-light mt-1">
                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-success"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Hóa đơn</h5>
                <div class="card-body">
                    <canvas id="chartjs_bar"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p style="margin: 0">Danh sách hóa đơn</p>
                        <a href="{{route('organizations.bills.create', 'HYS')}}" class="btn btn-primary">Tạo đơn</a>
                    </div>
                </h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Mô tả ngắn</th>
                                    <th>Số tiền</th>
                                    <th>Thời gian tạo</th>
                                    <th>Tạo bởi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $title_arr = array("Đóng tiền học", "Mua dụng cụ", "Kinh phí sự kiện", "Đóng tiên sự kiện");
                                    $desc_arr = array("Nguyễn Văn A đóng tiền", "Nguyễn Văn A Mua dụng cụ", "Nguyễn Văn A Kinh phí sự kiện", "Nguyễn Văn A đóng tiên sự kiện");
                                    $price_arr = array(-2000000, -3000000, 50000000, 7000000)
                                @endphp

                                @for ($i = 0; $i < 100; $i++)
                                    <tr>
                                        <td>{{$i + 1}}</td>
                                        <td>
                                            @php
                                                $random_title_keys=array_rand($title_arr,3);
                                            @endphp
                                            {{$title_arr[$random_title_keys[1]]}}
                                        </td>
                                        <td>
                                            @php
                                                $random_desc_keys=array_rand($desc_arr,3);
                                            @endphp
                                            {{$desc_arr[$random_desc_keys[0]]}}
                                        </td>
                                        @php
                                            $random_price_keys=array_rand($price_arr,3);
                                            $price = $price_arr[$random_price_keys[1]];
                                        @endphp
                                        <td class="@if($price > 0) text-success @else text-danger @endif">{{number_format($price)}}</td>
                                        <td>2011/04/25</td>
                                        <td>Nguyễn Khắc Lâm</td>
                                        <td>
                                            <a href="{{route('organizations.bills.single', ['HYS', 'sadh'])}}" class="btn btn-primary">Xem</a>
                                            <a href="{{route('organizations.bills.edit', ['HYS', 'sadh'])}}" class="btn btn-success">Sửa</a>
                                            <button class="btn btn-danger" onClick="deleteOrder(1)">Hủy</button>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Mô tả ngắn</th>
                                    <th>Số tiền</th>
                                    <th>Thời gian tạo</th>
                                    <th>Tạo bởi</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('optionaljs')
    <script src="src/assets/libs/js/pages/bills.js"></script>
@endsection
