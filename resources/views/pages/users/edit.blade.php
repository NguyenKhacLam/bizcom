@extends('index')
@section('content')
    <a href="{{url()->previous()}}" class="btn btn-primary mb-2">Quay lại</a>
    @include('partials.page_header')
    <?php
        $current_year = date("Y");
        $birthdate = date("Y", strtotime($user->dob));
        $age = $current_year - $birthdate;

        $role_arr = array();

        foreach($user->roles as $item) {
            array_push($role_arr, $item);
        }
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
                                    <p>Email: <span class="ml-2 font-weight-bold">{{$user->email}}</span></p>
                                    <p>Điện thoại: <span class="ml-2 font-weight-bold">{{$user->phone}}</span></p>
                                    <p>Địa chỉ: <span class="ml-2 font-weight-bold">{{$user->address}}</span></p>
                                    <p>Status: <span class="ml-2 text-success">ACTIVE</span></p>

                                    <div class="d-flex">
                                        Chức vụ:
                                        <form action="{{route('organizations.users.changeRole', $user->id)}}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <select name="roles[]" class="ml-2 form-control" multiple @if(!auth()->user()->can('edit_user')) disabled @endif>
                                                    @foreach ($roles as $item)
                                                    <option value="{{$item->name}}" @if(in_array($item->name, $role_arr)) selected @endif>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Lưu</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
