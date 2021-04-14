@extends('index')
@section('content')
    <a href="{{url()->previous()}}" class="btn btn-primary mb-2">Quay lại</a>
    @include('partials.page_header')
    <h1>UPDATE</h1>
@endsection
