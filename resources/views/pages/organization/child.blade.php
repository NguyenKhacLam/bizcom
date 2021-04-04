@extends('index')
@section('content')
    @include('partials.page_header')
    <div class="row">
        @foreach ($organizations as $item)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <a class="card-body" href="/organization/{{$item->uk}}">
                        <h3 class="card-title">{{$item->name}}</h3>
                        <p class="card-text">{{$item->desc}}</p>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
