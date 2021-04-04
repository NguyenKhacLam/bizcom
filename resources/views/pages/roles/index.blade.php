@extends('index')
@section('content')
    @include('partials.page_header')
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h3 style="margin-bottom: 0">Số lượng: {{count($roles)}}</h3>
            <div class="d-flex justify-content-between">
                <a href="" class="btn btn-primary">Tạo mới</a>
            </div>
        </div>
        <div class="mt-4 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Danh sách chức vụ</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php $i = 1?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Thời gian tạo</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $item)
                                    <tr>
                                        <th scope="row"><?php echo $i?></th>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <button data-id="{{$item->id}}" data-name="{{$item->name}}" class="btn-edit-role btn btn-success" data-toggle="modal" data-target="#editForm">Sửa</button>
                                            <button class="btn btn-danger">Xóa</button>
                                        </td>
                                    </tr>
                                    <?php $i++?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="editForm">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="content"></div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
    </div>
@endsection
