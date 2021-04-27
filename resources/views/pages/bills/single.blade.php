@extends('index')
@section('content')
    <div class="d-flex align-content-center mb-3">
        <a href="{{url()->previous()}}" class="btn btn-primary">Quay lại</a>
    </div>
    @include('partials.page_header')
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header p-4">
                    <div class="pt-2 d-inline-block">
                        <h4 class="text-success">Doanh thu</h4>
                    </div>
                    <div class="float-right"> <h3 class="mb-0">Invoice #1</h3>
                    Date: 3 Dec, 2020</div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h5 class="mb-3">Người nộp:</h5>
                            <h3 class="text-dark mb-1">Gerald A. Garcia</h3>

                            <div>Tổ chức: <span class="font-weight-bold">HYS Thăng Long</span></div>
                            <div>Email: info@gerald.com.pl</div>
                            <div>SĐT: +573-282-9117</div>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="mb-3">Người nhận:</h5>
                            <h3 class="text-dark mb-1">Anthony K. Friel</h3>
                            <div>Tổ chức: <span class="font-weight-bold">CiT</span></div>
                            <div>Email: info@anthonyk.com</div>
                            <div>SĐT: +614-837-8483</div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, assumenda blanditiis deserunt fugiat, nesciunt, fuga repellendus maxime quos iusto atque enim. Maxime necessitatibus placeat nemo impedit optio nobis exercitationem in!</p>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Sản phẩm</th>
                                    <th>Mô tả ngắn</th>
                                    <th class="right">Đơn giá</th>
                                    <th class="center">Số lượng</th>
                                    <th class="right">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="center">1</td>
                                    <td class="left strong">Origin License</td>
                                    <td class="left">Extended License</td>
                                    <td class="right">$1500,00</td>
                                    <td class="center">1</td>
                                    <td class="right">$1500,00</td>
                                </tr>
                                <tr>
                                    <td class="center">2</td>
                                    <td class="left">Custom Services</td>
                                    <td class="left">Instalation and Customization (cost per hour)</td>
                                    <td class="right">$110,00</td>
                                    <td class="center">20</td>
                                    <td class="right">$22.000,00</td>
                                </tr>
                                <tr>
                                    <td class="center">3</td>
                                    <td class="left">Hosting</td>
                                    <td class="left">1 year subcription</td>
                                    <td class="right">$309,00</td>
                                    <td class="center">1</td>
                                    <td class="right">$309,00</td>
                                </tr>
                                <tr>
                                    <td class="center">4</td>
                                    <td class="left">Platinum Support</td>
                                    <td class="left">1 year subcription 24/7</td>
                                    <td class="right">$5.000,00</td>
                                    <td class="center">1</td>
                                    <td class="right">$5.000,00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                        </div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong class="text-dark">VAT (10%)</strong>
                                        </td>
                                        <td class="right">$2,304,00</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong class="text-dark">Tổng</strong>
                                        </td>
                                        <td class="right">
                                            <strong class="text-dark">$20,744,00</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <p class="mb-0">Tạo bởi <a href="#" class="text-danger">Nguyễn Khắc Lâm</a> - 22/04/2021</p>
                </div>
            </div>
        </div>
    </div>
@endsection
