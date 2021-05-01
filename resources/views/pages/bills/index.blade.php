@extends('index')
@section('content')
    @include('partials.page_header')
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Doanh thu</h5>
                        <h2 class="mb-0">{{number_format($income)}} vnd</h2>
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
                        <h2 class="mb-0">{{number_format($expense)}} vnd</h2>
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
                        <h2 class="mb-0">{{number_format($revenue)}} vnd</h2>
                    </div>
                    <div class="float-right icon-circle-medium icon-box-lg  bg-success-light mt-1">
                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-success"></i>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Hóa đơn</h5>
                <div class="card-body">
                    <canvas id="chartjs_bar"></canvas>
                </div>
            </div>
        </div> --}}
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
                                    $i = 0;
                                @endphp
                                @foreach ($bills as $bill)
                                    <tr>
                                        <td>{{$i + 1}}</td>
                                        <td>
                                            {{$bill->title}}
                                        </td>
                                        <td>
                                            {{$bill->description}}
                                        </td>
                                        <td class="@if($bill->type == 'INCOME') text-success @else text-danger @endif">
                                            @if($bill->type == 'INCOME') + @else - @endif
                                            {{number_format($bill->total)}}
                                        </td>
                                        <td>
                                            {{date("d-m-Y", strtotime($bill->created_at))}}
                                        </td>
                                        <td>{{$bill->created_by}}</td>
                                        <td>
                                            <a href="{{route('organizations.bills.single', [$bill->organization_id, $bill->id])}}" class="btn btn-primary">Xem</a>
                                            <a href="{{route('organizations.bills.edit', [$bill->organization_id, $bill->id])}}" class="btn btn-success">Sửa</a>
                                            <button class="btn btn-danger" onClick="deleteOrder({{$bill->id}})">Hủy</button>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach

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
