@extends('index')
@section('content')
    @include('partials.page_header')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="image-card">
                <h3 class="section-title">Số lượng: 5</h3>
                {{-- <p>Cards include a few options for working with images. Choose from appending “image caps” at either end of a card, overlaying images with card content, or simply embedding the image in a card.</p> --}}
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <img class="card-img-top img-fluid" src="src/assets/images/card-img.jpg" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">Card title</h3>
                    <p class="card-text">Vestibuluimis in faucibus orci luctus et ultrices posuere cubilia Curis ipsum in augue posuere congue.</p>
                    <a href="{{url('/organization/1')}}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <img class="card-img-top img-fluid" src="src/assets/images/card-img.jpg" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">Card title</h3>
                    <p class="card-text">Vestibuluimis in faucibus orci luctus et ultrices posuere cubilia Curis ipsum in augue posuere congue.</p>
                    <a href="{{url('/organization/1')}}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <img class="card-img-top img-fluid" src="src/assets/images/card-img.jpg" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">Card title</h3>
                    <p class="card-text">Vestibuluimis in faucibus orci luctus et ultrices posuere cubilia Curis ipsum in augue posuere congue.</p>
                    <a href="{{url('/organization/1')}}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    <div/>
@endsection
