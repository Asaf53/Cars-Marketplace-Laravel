@extends('layouts.app')

@section('content')
    @if ($msg = Session::get('alert'))
        <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
            <i class="bx bx-check h5"></i>
            <strong>{{ $msg }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container w-100">
        <div class="row gap-1 d-flex justify-content-center">
            <div class="col-md-2 bg-danger height-75">
                
                <div class="sort mt-3">
                    <h6 class="mb-0"><b>Price</b></h6>
                    <div class="d-flex gap-1">
                        <select class="form-select" aria-label="Default select example">
                            <option selected value="">Any</option>
                          </select>
                          <select class="form-select" aria-label="Default select example">
                            <option selected value="">Any</option>
                          </select>
                    </div>
                </div>
                <div class="sort mt-3">
                    <h6 class="mb-0"><b>First registration (date)</b></h6>
                    <div class="d-flex gap-1">
                        <select class="form-select" aria-label="Default select example">
                            <option selected value="">Any</option>
                          </select>
                          <select class="form-select" aria-label="Default select example">
                            <option selected value="">Any</option>
                          </select>
                    </div>
                </div>
                <div class="sort mt-3">
                    <h6 class="mb-0"><b>Kilometre</b></h6>
                    <div class="d-flex gap-1">
                        <select class="form-select" aria-label="Default select example">
                            <option selected value="">Any</option>
                          </select>
                          <select class="form-select" aria-label="Default select example">
                            <option selected value="">Any</option>
                          </select>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="container">
                    <div class="dropdown mb-1">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Sort
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('home', ['sort' => 'price_asc']) }}">Price (lowest
                                    first)</a></li>
                            <li><a class="dropdown-item" href="{{ route('home', ['sort' => 'price_desc']) }}">Price (highest
                                    first)</a></li>
                            <li><a class="dropdown-item" href="{{ route('home', ['sort' => 'mileage_asc']) }}">Mileage
                                    (lowest first)</a></li>
                            <li><a class="dropdown-item" href="{{ route('home', ['sort' => 'mileage_desc']) }}">Mileage
                                    (highest first)</a></li>
                            <li><a class="dropdown-item" href="{{ route('home', ['sort' => 'year_desc']) }}">First
                                    registration (oldest first)</a></li>
                            <li><a class="dropdown-item" href="{{ route('home', ['sort' => 'year_asc']) }}">First
                                    registration (newest first)</a></li>
                            <li><a class="dropdown-item" href="{{ route('home', ['sort' => 'listing_asc']) }}">Listings
                                    (oldest first)</a></li>
                            <li><a class="dropdown-item" href="{{ route('home', ['sort' => 'listing_desc']) }}">Listings
                                    (newest first)</a></li>
                        </ul>
                    </div>
                    <div class="row">
                        @foreach ($cars as $car)
                            <div class="col-sm-12 mb-3">
                                <div class="card d-flex flex-row rounded-0">
                                    <div class="card-image w-35 mw-35">
                                        <div id="car{{ $car->id }}" class="carousel slide carousel-fade">
                                            <div class="carousel-inner">
                                                @foreach ($car->images as $image)
                                                    <div class="carousel-item active">
                                                        <a href="#">
                                                            <img src="{{ asset('storage/images/cars/' . $image->image) }}"
                                                                class="d-block w-100" alt="Car Image">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#car{{ $car->id }}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#car{{ $car->id }}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 ps-3">
                                        <h5 class="card-title text-decoration-underline"><a
                                                href="#">{{ $car->manufacturers->brand . ' ' . $car->models->name . ' ' . $car->years->year }}</a>
                                        </h5>
                                        <h5>$ {{ $car->price }}</h5>
                                        <h6><b>Mileage:</b> {{ $car->mileage }} km</h6>
                                        <h6><b>Year:</b> {{ $car->years->year }}</h6>
                                        {{-- <h5>{{ $car->users->name }}</h5> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="gap-1 bg-gray order-last">
                        <div class="p-2">
                            <h1>{{ $car->id }}</h1>
                            <h1>{{ $car->users->name }}</h1>
                            <h1>{{ $car->manufacturers->brand }}</h1>
                            <h1>{{ $car->models->name }}</h1>
                            <h1>{{ $car->bodystyles->style }}</h1>
                            <h1>{{ $car->colors->color }}</h1>
                            <h1>{{ $car->conditions->Condition }}</h1>
                            <h1>{{ $car->years->year }}</h1>
                            <h1>{{ $car->gearboxs->gearbox }}</h1>
                            <h1>{{ $car->fuels->fuel }}</h1>
                            <h1>{{ $car->states->state }}</h1>
                            <h1>{{ $car->registrations->registration }}</h1>
                            <h1>{{ $car->mileage }}</h1>
                            <h1>{{ $car->description }}</h1>
                            <h1>{{ $car->price }}</h1>
                            <h1>{{ $car->created_at }}</h1>
                            <div style="max-width:100%;list-style:none; transition: none;overflow:hidden;width:500px;height:500px;">
                                <div id="google-maps-canvas" style="height:100%; width:100%;max-width:100%;"><iframe
                                        style="height:100%;width:100%;border:0;" frameborder="0"
                                        src="https://www.google.com/maps/embed/v1/place?q={{ $car->states->state }}&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                                </div><a class="embed-ded-maphtml" href="https://www.bootstrapskins.com/themes"
                                    id="get-map-data">premium bootstrap themes</a>
                                <style>
                                    #google-maps-canvas img.text-marker {
                                        max-width: none !important;
                                        background: none !important;
                                    }
                                    img {
                                        max-width: none
                                    }
                                </style>
                            </div>
                        </div>
                    </div> --}}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".carousel .carousel-item").nextAll().removeClass("active");
        });
    </script>
@endsection

{{-- @extends('layouts.footer') --}}
