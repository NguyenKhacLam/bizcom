@extends('index')
@section('content')
    <div class="d-flex align-content-center mb-3">
        <a href="{{url()->previous()}}" class="btn btn-primary">Quay lại</a>
    </div>
    @include('partials.page_header')
    <div class="card">
        <div class="card-body">
            <form action="" id='createBillForm' method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="type" class="col-form-label">Loại đơn</label>
                        <select name="type" id="" class="form-control">
                            <option value="income">Doanh thu</option>
                            <option value="expense">Chi phí</option>
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="tax" class="col-form-label">Thuế</label>
                        <input id="tax" name="tax" max="50" type="number" class="form-control @error('tax') is-invalid @enderror" placeholder="Thuế" value=0>

                        @error('tax')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="created_by" class="col-form-label">Người tạo</label>
                        <input id="created_by" name="created_by" type="text" class="form-control @error('created_by') is-invalid @enderror" placeholder="Người tạo" disabled value="{{auth()->user()->username}}">

                        @error('created_by')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="created_at" class="col-form-label">Ngày tạo</label>
                        <input id="created_at" name="created_at" type="date" placeholder="Ngày thành lập" class="form-control @error('created_at') is-invalid @enderror" disabled value="{{date("Y-m-d")}}">

                        @error('created_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3"></textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <h5>Người nộp</h5>

                        <label for="sender" class="col-form-label">Tên</label>
                        <input id="sender" name="sender" type="text" placeholder="Tên người nộp" class="form-control @error('sender') is-invalid @enderror">

                        <label for="sender_phone" class="col-form-label">SĐT</label>
                        <input id="sender_phone" name="sender_phone" type="text" placeholder="Sđt người nộp" class="form-control @error('sender_phone') is-invalid @enderror">

                        <label for="sender_email" class="col-form-label">Email</label>
                        <input id="sender_email" name="sender_email" type="text" placeholder="Email người nộp" class="form-control @error('sender_email') is-invalid @enderror">

                        <label for="sender_org" class="col-form-label">Tổ chức</label>
                        <input id="sender_org" name="sender_org" type="text" placeholder="Tổ chức người nộp" class="form-control @error('sender_org') is-invalid @enderror">
                    </div>
                    <div class="col-md-6">
                        <h5>Người nhận</h5>

                        <label for="receiver" class="col-form-label">Tên</label>
                        <input id="receiver" name="receiver" type="text" placeholder="Tên người nhận" class="form-control @error('receiver') is-invalid @enderror">

                        <label for="receiver_phone" class="col-form-label">SĐT</label>
                        <input id="receiver_phone" name="receiver_phone" type="text" placeholder="Sđt người nhận" class="form-control @error('receiver_phone') is-invalid @enderror">

                        <label for="receiver_email" class="col-form-label">Email</label>
                        <input id="receiver_email" name="receiver_email" type="text" placeholder="Email người nhận" class="form-control @error('receiver_email') is-invalid @enderror">

                        <label for="receiver_org" class="col-form-label">Tổ chức</label>
                        <input id="receiver_org" name="receiver_org" type="text" placeholder="Tổ chức người nhận" class="form-control @error('receiver_org') is-invalid @enderror">
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <h5 class="card-header d-flex align-items-center">
                                Danh sách vật phẩm
                                <button type="button" class="ml-3 btn btn-primary" data-toggle="modal" data-target="#addItemModal">Thêm</button>
                            </h5>
                            <div class="card-body">
                                <table class="table" id="itemsList">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Mô tả ngăn</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><strong>Thuế</strong></td>
                                            <td id="taxRate">0%</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><strong>Tổng</strong></td>
                                            <td id="total">0</td>
                                        </tr>
                                      </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group mt-3">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </div>
            </form>
        </div>
    <div/>
    <div class="modal" id="addItemModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Thêm vật phẩm</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" id='addItemForm'>
                    <div class="form-group">
                        <label for="name" class="col-form-label">Tên</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="Tên" required>
                    </div>
                    <div class="form-group">
                        <label for="short_desc" class="col-form-label">Mô tả ngắn</label>
                        <textarea id="short_desc" name="short_desc" class="form-control" placeholder="Mô tả ngắn"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="unit_price" class="col-form-label">Đơn giá</label>
                        <input id="unit_price" name="unit_price" type="numver" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-form-label">Số lượng</label>
                        <input id="quantity" name="quantity" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>

          </div>
        </div>
@endsection
@section('optionaljs')
    <script src="src/assets/libs/js/pages/bills.js"></script>
@endsection
