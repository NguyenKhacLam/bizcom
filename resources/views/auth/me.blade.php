@extends('index')
@section('content')
    @include('partials.page_header')
    <?php
        $current_year = date("Y");
        $birthdate = date("Y", strtotime($user->dob));
        $age = $current_year - $birthdate;
    ?>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="text-center">
                                <img src="/uploads/{{$user->avatar}}" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                            <div class="user-avatar-info">
                                <h2 class="mb-2">{{$user->first_name}} {{$user->last_name}}</h2>
                                <div class="user-genaral-info">
                                    <p class="border-bottom pb-3">
                                        <span class="d-xl-inline-block d-block mb-2">
                                            <i class="fas fa-user mr-2 text-primary"></i>
                                            {{$user->username}}
                                        </span>
                                        <span class="mb-2 ml-xl-4 d-xl-inline-block d-block text-success">{{$role_name}}</span>
                                        <?php $originalDate = $user->created_at ?>
                                        <span class="mb-2 ml-xl-4 d-xl-inline-block d-block">Tham gia ngày: <?php echo date("d-m-Y", strtotime($originalDate))?></span>
                                        <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">{{($user->gender == 0) ? 'Nam' : 'Nữ'}}</span>
                                        <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">{{$age}} tuổi</span>
                                    </p>
                                </div>
                                <div class="mt-2">
                                    <div class="d-flex">
                                        Tổ chức tham gia:
                                        <ul class="d-flex" style="list-style-type: none">
                                            <li><a href="" class="badge badge-light mr-2">HYS</a></li>
                                            <li><a href="" class="badge badge-light mr-2">CiT</a></li>
                                        </ul>
                                    </div>
                                    <p>Status: <span class="ml-2 text-success">ACTIVE</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Chỉnh sửa thông tin
                </div>
                <div class="card-body">
                    <form action="{{route('organizations.users.edit', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="first_name" class="col-form-label">Họ</label>
                                <input id="first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Họ" value="{{$user->first_name}}">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="last_name" class="col-form-label">Tên</label>
                                <input id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Tên" value="{{$user->last_name}}">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="username" class="col-form-label">Tên đăng nhập</label>
                                <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Tên đăng nhập" value="{{$user->username}}">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="phone" class="col-form-label">Số điện thoại</label>
                                <input id="phone" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Số điện thoại" value="{{$user->phone}}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="email" class="col-form-label">Email</label>
                                <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{$user->email}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="gender" class="col-form-label">Giới tính</label>
                                <select name="gender" id="gender" class="form-control" value="{{$user->gender}}">
                                    <option value="">---</option>
                                    <option value="1" {{$user->gender == 1 ? 'selected' : ''}}>Nữ</option>
                                    <option value="0" {{$user->gender == 0 ? 'selected' : ''}}>Nam</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="address" class="col-form-label">Địa chỉ</label>
                                <input id="address" name="address" type="text" class="form-control" placeholder="Địa chỉ" value="{{$user->address}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="facebook" class="col-form-label">Facebook</label>
                                <input id="facebook" name="facebook" type="text" class="form-control" placeholder="Facebook" value="{{$user->fb}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="dob" class="col-form-label">Ngày sinh</label>
                                <input id="dob" name="dob" type="date" class="form-control" placeholder="Ngày sinh" value="{{$user->dob}}">
                            </div>
                            <div class="form-group custom-file mb-3 mt-1" style="width: 98%; margin-left:1%">
                                <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
                                <label class="custom-file-label" for="avatar">Avatar</label>

                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn btn-block btn-primary">Lưu thông tin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
