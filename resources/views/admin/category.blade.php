@extends('layouts.app')

@section('content')
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="h3">Category</h4>
        <small class="text-muted float-end"><span class="text-muted float-end fw-bold mx-1"> Category
            </span></small>
    </div>
    <div class="col-12 mb-4">
        <h6 class="text-muted mt-3">Carousel Category</h6>
        <div class="swiper" id="swiper-3d-coverflow-effect">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url(../../assets/img/elements/15.jpg); border-radius: 10px;">
                    Slide 1
                </div>
                <div class="swiper-slide" style="background-image: url(../../assets/img/elements/7.jpg); border-radius: 10px;">
                    Slide 2
                </div>
                <div class="swiper-slide" style="background-image: url(../../assets/img/elements/10.jpg); border-radius: 10px;">
                    Slide 3
                </div>
                <div class="swiper-slide" style="background-image: url(../../assets/img/elements/14.jpg); border-radius: 10px;">
                    Slide 4
                </div>
                <div class="swiper-slide" style="background-image: url(../../assets/img/elements/13.jpg); border-radius: 10px;">
                    Slide 5
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
@endsection