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
                    <div class="float-right"> <h3 class="mb-0">Hóa đơn #{{$bill->id}}</h3>
                    Ngày tạo: {{date("d-m-Y", strtotime($bill->created_at))}}</div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h5 class="mb-3">Người nộp:</h5>
                            <h3 class="text-dark mb-1">{{$bill->senderInfo->name}}</h3>

                            <div>Tổ chức: <span class="font-weight-bold">{{$bill->senderInfo->organization}}</span></div>
                            <div>Email: {{$bill->senderInfo->email}}</div>
                            <div>SĐT: +{{$bill->senderInfo->phone}}</div>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="mb-3">Người nhận:</h5>
                            <h3 class="text-dark mb-1">{{$bill->receiverInfo->name}}</h3>
                            <div>Tổ chức: <span class="font-weight-bold">{{$bill->receiverInfo->organization}}</span></div>
                            <div>Email: {{$bill->receiverInfo->email}}</div>
                            <div>SĐT: +{{$bill->receiverInfo->phone}}</div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p>{{$bill->description}}</p>
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
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($bill->itemsList as $item)
                                    <tr>
                                        <td class="center">{{$i + 1}}</td>
                                        <td class="left strong">{{$item->name}}</td>
                                        <td class="left">{{$item->short_desc}}</td>
                                        <td class="right">{{number_format($item->unit_price)}}</td>
                                        <td class="center">{{$item->quantity}}</td>
                                        <td class="right">{{number_format($item->unit_price * $item->quantity)}}</td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
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
                                            <strong class="text-dark">VAT ({{$bill->tax}}%)</strong>
                                        </td>
                                        <td class="right">{{number_format($bill->amount - $bill->amount)}}</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong class="text-dark">Tổng</strong>
                                        </td>
                                        <td class="right">
                                            <strong class="text-dark">{{number_format($bill->total)}}</</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <p class="mb-0">Tạo bởi <a href="#" class="text-danger">{{$bill->created_by}}</a> - {{date("d-m-Y", strtotime($bill->created_at))}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
