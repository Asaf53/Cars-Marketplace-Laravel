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
            <div class="col-md-2 bg-white border border-grey height-100">
                <form method="get">
                    <div class="sort mt-3">
                        <h6 class="mb-0"><b>Manufacturer</b></h6>
                        <div class="d-flex gap-1">
                            <select class="form-select" aria-label="Default select example" id="Manufacturer"
                                name="Manufacturer">
                                <option selected value="">Any</option>
                                @foreach ($manufacturer as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sort mt-3">
                        <h6 class="mb-0"><b>Model</b></h6>
                        <div class="d-flex gap-1">
                            <select class="form-select" aria-label="Default select example" id="Model" name="Model">
                                <option selected value="">Any</option>
                            </select>
                        </div>
                    </div>
                    <div class="sort mt-3">
                        <h6 class="mb-0"><b>Bodystyle</b></h6>
                        <div class="d-flex gap-1">
                            <select class="form-select" aria-label="Default select example" name="Bodystyle">
                                <option selected value="">Any</option>
                                @foreach ($bodystyle as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sort mt-3">
                        <h6 class="mb-0"><b>Color</b></h6>
                        <div class="d-flex gap-1">
                            <select class="form-select" aria-label="Default select example" name="Color">
                                <option selected value="">Any</option>
                                @foreach ($color as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sort mt-3">
                        <h6 class="mb-0"><b>Conditions</b></h6>
                        <div class="d-flex gap-1">
                            <select class="form-select" aria-label="Default select example" name="Condition">
                                <option selected value="">Any</option>
                                @foreach ($condition as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sort mt-3">
                        <h6 class="mb-0"><b>Registration</b></h6>
                        <div class="d-flex gap-1">
                            <select class="form-select" aria-label="Default select example" name="YearFrom">
                                <option selected value="">Any</option>
                                @foreach ($year as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <select class="form-select" aria-label="Default select example" name="YearTo">
                                <option selected value="1">Any</option>
                                @foreach ($year as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sort mt-3">
                        <h6 class="mb-0"><b>Kilometre</b></h6>
                        <div class="d-flex gap-1">
                            <select class="form-select" aria-label="Default select example" name="KmFrom">
                                <option selected value="">Any</option>
                                <option value="5000">5.000 km</option>
                                <option value="10000">10.000 km</option>
                                <option value="20000">20.000 km</option>
                                <option value="30000">30.000 km</option>
                                <option value="40000">40.000 km</option>
                                <option value="50000">50.000 km</option>
                                <option value="60000">60.000 km</option>
                                <option value="70000">70.000 km</option>
                                <option value="80000">80.000 km</option>
                                <option value="90000">90.000 km</option>
                                <option value="100000">100.000 km</option>
                                <option value="125000">125.000 km</option>
                                <option value="150000">150.000 km</option>
                                <option value="200000">200.000 km</option>
                            </select>
                            <select class="form-select" aria-label="Default select example" name="KmTo">
                                <option selected value="">Any</option>
                                <option value="5000">5.000 km</option>
                                <option value="10000">10.000 km</option>
                                <option value="20000">20.000 km</option>
                                <option value="30000">30.000 km</option>
                                <option value="40000">40.000 km</option>
                                <option value="50000">50.000 km</option>
                                <option value="60000">60.000 km</option>
                                <option value="70000">70.000 km</option>
                                <option value="80000">80.000 km</option>
                                <option value="90000">90.000 km</option>
                                <option value="100000">100.000 km</option>
                                <option value="125000">125.000 km</option>
                                <option value="150000">150.000 km</option>
                                <option value="200000">200.000 km</option>
                                <option value="300000">300.000 km</option>
                                <option value="400000">400.000 km</option>
                                <option value="500000">500.000 km</option>
                            </select>
                        </div>
                    </div>
                    <div class="sort mt-3">
                        <h6 class="mb-0"><b>Power</b></h6>
                        <div class="d-flex gap-1">
                            <select class="form-select" aria-label="Default select example" name="PowerFrom">
                                <option selected value="">Any</option>
                                <option value="10">10 hp</option>
                                <option value="50">50 hp</option>
                                <option value="100">100 hp</option>
                                <option value="150">150 hp</option>
                                <option value="200">200 hp</option>
                                <option value="250">250 hp</option>
                                <option value="300">300 hp</option>
                                <option value="400">400 hp</option>
                                <option value="500">500 hp</option>
                                <option value="600">600 hp</option>
                            </select>
                            <select class="form-select" aria-label="Default select example" name="PowerTo">
                                <option selected value="">Any</option>
                                <option value="10">10 hp</option>
                                <option value="50">50 hp</option>
                                <option value="100">100 hp</option>
                                <option value="150">150 hp</option>
                                <option value="200">200 hp</option>
                                <option value="250">250 hp</option>
                                <option value="300">300 hp</option>
                                <option value="400">400 hp</option>
                                <option value="500">500 hp</option>
                                <option value="600">600 hp</option>
                                <option value="700">700 hp</option>
                                <option value="800">800 hp</option>
                                <option value="900">900 hp</option>
                                <option value="1000">1000 hp</option>
                                <option value="1500">1500 hp</option>
                            </select>
                        </div>
                    </div>
                    <div class="sort mt-3">
                        <h6 class="mb-0"><b>GearBox</b></h6>
                        <div class="d-flex gap-1">
                            <select class="form-select" aria-label="Default select example" name="Gearbox">
                                <option selected value="">Any</option>
                                @foreach ($gearbox as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sort mt-3">
                        <h6 class="mb-0"><b>Fuel</b></h6>
                        <div class="d-flex gap-1">
                            <select class="form-select" aria-label="Default select example" name="Fuel">
                                <option selected value="">Any</option>
                                @foreach ($fuel as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sort mt-3">
                        <h6 class="mb-0"><b>Registration</b></h6>
                        <div class="d-flex gap-1">
                            <select class="form-select" aria-label="Default select example" name="Registration">
                                <option selected value="">Any</option>
                                @foreach ($registration as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary w-100 mt-2 mb-2">Search</button>
                </form>
            </div>
            <div class="col-md-7">
                <div class="container">
                    <div class="dropdown mb-1 d-flex justify-content-between text-center align-items-center">
                        <button class="btn btn-secondary dropdown-toggle rounded-0" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort
                        </button>
                        <span>{{ $count . ' ' }} Ads matching your search</span>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('home', ['sort' => 'price_asc']) }}">Price
                                    (lowest
                                    first)</a></li>
                            <li><a class="dropdown-item" href="{{ route('home', ['sort' => 'price_desc']) }}">Price
                                    (highest
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
                                <div class="card d-flex flex-md-row rounded-0 flex-column">
                                    <div class="card-image w-md-35 mw-md-35">
                                        <div id="car{{ $car->id }}" class="carousel slide carousel-fade">
                                            <div class="carousel-inner">
                                                @foreach ($car->images as $image)
                                                    <div class="carousel-item active">
                                                        <a href="{{ route('cars.show', $car->id) }}">
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
                                                href="{{ route('cars.show', $car->id) }}">{{ $car->manufacturers->brand . ' ' . $car->models->name . ' ' . $car->years->year }}</a>
                                        </h5>
                                        <h5>$ {{ number_format($car->price, 0) }}</h5>
                                        <h6><b>Mileage:</b> {{ number_format($car->mileage, 0) }} km</h6>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".carousel .carousel-item").nextAll().removeClass("active");
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="Manufacturer"]').on('change', function() {
                var manufacturerID = $(this).val();
                if (manufacturerID) {
                    $.ajax({
                        url: '/model/' + manufacturerID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            // $('select[name="Model"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="Model"]').append(
                                    '<option class=" text-uppercase" value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="Model"]').empty();
                }
            });
        });
    </script>
@endsection

{{-- @extends('layouts.footer') --}}
