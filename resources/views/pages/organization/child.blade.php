@extends('index')
@section('content')
    @include('partials.page_header')
    <div class="row">
        @if (count($organizations) == 0)
            <div class="text-center" style="width: 100%;">
                <h3 class="text-danger">Hiện tại chưa có bất cứ tổ chức con nào</h3>
            </div>
        @else
            @foreach ($organizations as $item)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <a class="card-body" href="{{route('organizations.single', $item->uk)}}">
                            <h3 class="card-title">{{$item->name}}</h3>
                            <p class="card-text">{{$item->desc}}</p>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
