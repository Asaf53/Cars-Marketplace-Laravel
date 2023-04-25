@extends('layouts.app')

@section('content')

    <div class="container w-100 w-lg-50">
        <div class="row gap-2">
            <div class="col-3 bg-danger order-first">

            </div>
            @foreach ($cars as $car)
                <div class="col-8 bg-gray order-last">
                    <div class="p-2">
                        <h1>{{ $car->brand }}</h1>
                        <h1>{{ $car->model }}</h1>
                        <h1>{{ $car->Condition }}</h1>
                        <h1>{{ $car->style }}</h1>
                        <h1>{{ $car->color }}</h1>
                        <h1>{{ $car->year }}</h1>
                        <h1>{{ $car->name }}</h1>
                        <h1>{{ $car->email }}</h1>
                    </div>
                </div>
            @endforeach

        </div>



        {{-- <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> --}}
    </div>
@endsection

@extends('layouts.footer')
