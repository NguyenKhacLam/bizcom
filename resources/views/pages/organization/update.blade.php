@extends('index')
@section('content')
    @include('partials.page_header')
    <div class="card">
        <h5 class="card-header">Tạo tổ chức mới</h5>
        <div class="card-body">
            <form action="{{route('organizations.edit', $organization->uk)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{ $organization->id }}">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="name" class="col-form-label">Tên tổ chức</label>
                        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Tên tổ chức" value="{{$organization->name}}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="short_name" class="col-form-label">Tên rút gọn</label>
                        <input id="short_name" name="short_name" type="text" class="form-control @error('short_name') is-invalid @enderror" placeholder="Tên rút gọn" value="{{$organization->short_name}}">

                        @error('short_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" placeholder="name@example.com" class="form-control @error('email') is-invalid @enderror" value="{{$organization->email}}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="phone">Số điện thoại</label>
                        <small class="text-muted">(999) 999-9999</small>
                        <input id="phone" name="phone" type="text" placeholder="Số điện thoại" class="form-control @error('phone') is-invalid @enderror" value="{{$organization->phone}}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="website">Website</label>
                        <input id="website" name="website" type="text" placeholder="Website" class="form-control" value="{{$organization->website}}">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="founding">Ngày thành lập</label>
                        <input id="founding" name="founding" type="date" placeholder="Ngày thành lập" class="form-control @error('founding') is-invalid @enderror" value="{{$organization->founding}}">

                        @error('founding')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="rep_by">Đại diện</label>
                        <input id="rep_by" name="rep_by" type="text" placeholder="Đại diện bởi" class="form-control @error('rep_by') is-invalid @enderror" value="{{$organization->rep_by}}">

                        @error('rep_by')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="business">Ngành nghề</label>
                        <input id="business" name="business" type="text" placeholder="Ngành nghề" class="form-control @error('business') is-invalid @enderror" value="{{$organization->business}}">

                        @error('business')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="parent_id">Tổ chức con của</label>
                        <select name="parent_id" id="parent_id" class="form-control" value="{{$organization->parent_id}}">
                            <option value="">---</option>
                            @foreach ($organizations as $item)
                                <option value="{{$item->id}}" {{$organization->parent_id == $item->id ? 'checked' : ''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="address">Địa chỉ</label>
                        <input id="address" name="address" type="text" placeholder="Địa chỉ" class="form-control @error('address') is-invalid @enderror" value="{{$organization->address}}">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="desc">Mô tả</label>
                        <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" rows="3">{{$organization->desc}}</textarea>

                        @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="" for="banner">Banner</label>
                        <input type="file" class="@error('banner') is-invalid @enderror" id="banner" name="banner">
                        <img src="uploads/{{$organization->banner}}" style="width: 250px; object-fit: contain"/>

                        @error('banner')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="" for="banner">Avatar</label>
                        <input type="file" id="avatar" class="@error('avatar') is-invalid @enderror" name="avatar">
                        <img src="uploads/{{$organization->avatar}}" style="width: 250px; object-fit: contain"/>

                        @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </div>
            </form>
        </div>
    <div/>
@endsection
