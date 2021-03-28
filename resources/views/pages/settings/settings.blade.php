@extends('index')
@section('content')
    @include('partials.page_header')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card" id="switchcontent">
                <div class="card-body">
                    <form action="#" style="border-radius: 0px;">
                        <div class="form-group row">
                            <label class="col-12 col-sm-2 col-form-label">Giao diện tối</label>
                            <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                <div class="switch-button switch-button-success">
                                    <input type="checkbox" checked="" name="switch16" id="switch16"><span>
                                    <label for="switch16"></label></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-2 col-form-label">Ngôn ngữ</label>
                            <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                <select class="form-control" id="input-select">
                                    <option value="vi">Tiếng Việt</option>
                                    <option value="en">Tiếng Anh</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" style="width: 100%">Lưu</button>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="button" style="width: 100%" id="closeOrganization">Đóng tổ chức</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
