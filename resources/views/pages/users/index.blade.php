@extends('index')
@section('content')
    @include('partials.page_header')
    <div class="row">
        <!-- ============================================================== -->
        <!-- data table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Danh sách nhân viên</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered usersTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Vị trí</th>
                                    <th>Văn phòng</th>
                                    <th>Ngày sinh</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{$user->first_name}} {{$user->last_name}}</th>
                                        <th>
                                            <?php foreach ($user->roles as $item) {?>
                                                <span class="tag tag-yellow">{{$item}}</span>
                                            <?php }?>
                                        </th>
                                        <th>
                                            <?php foreach ($user->organization as $item) {?>
                                                <a href="" class="tag">{{$item->short_name}}</a>
                                            <?php }?>
                                        </th>
                                        <th>{{date("d-m-Y", strtotime($user->dob))}}</th>
                                        <th>{{date("d-m-Y", strtotime($user->created_at))}}</th>
                                        <th>{{$user->status}}</th>
                                        <th style="display: flex">
                                            <a href="{{route('organizations.users.edit_form', $user->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger" data-userid="{{$user->id}}"}><i class="fas fa-trash"></i></button>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tên</th>
                                    <th>Vị trí</th>
                                    <th>Văn phòng</th>
                                    <th>Ngày sinh</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end data table  -->
        <!-- ============================================================== -->
    </div>

    {{-- Modal --}}
    <div class="modal" id="userDetailsModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="first_name" class="col-form-label">Văn phòng</label>
                                        <select class="form-control" id="input-select">
                                            <option>HYS Thăng Long</option>
                                            <option>HYS Tiếng Anh</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="lasr_name" class="col-form-label">Vị trí</label>
                                        <select class="form-control" id="input-select">
                                            <option>Admin</option>
                                            <option>Chủ nhiệm</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="lasr_name" class="col-form-label">Trạng thái</label>
                                        <select class="form-control" id="input-select">
                                            <option>INIT</option>
                                            <option>ACTIVED</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary">Lưu</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

@endsection
