@extends('layouts.app')

@section('content')




    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-inner">

            @foreach($images as $image)

                <div class="carousel-item {{$loop->first?'active':''}} bg-light" data-bs-interval="10000">
                    <img src="{{$image->src}}" class="d-block w-25 m-auto" alt="...">
                    <div class="carousel-caption d-none d-md-block text-danger">
                        <h5 >FILENAME</h5>
                        <p>{{$image->name}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection

