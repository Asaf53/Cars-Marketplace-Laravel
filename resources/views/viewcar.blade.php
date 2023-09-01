@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h6>Published: {{ $car->created_at->format('d/m/Y H:i') }}</h6>
                <div class="row">
                    <div class="col-md-9">
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
                            <button class="carousel-control-prev" type="button" data-bs-target="#car{{ $car->id }}"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#car{{ $car->id }}"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $car->manufacturers->brand . ' ' . $car->models->name }}</b>
                                </h5>
                                <h6 class="blue"><a href="https://maps.google.com/?q={{ $car->states->state }}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="#0d6efd" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                        <path
                                            d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                    </svg>{{ $car->states->state }}</a></h6>
                                <hr>
                                <h5 class="card-title"><b>$ {{ number_format($car->price, 0) }}</b></h5>
                                <h6><b>{{ $car->users->name }}</b></h6>
                                <h6><b>Phone: <a href="tel:{{ $car->users->phone }}">{{ $car->users->phone }}</a></b></h6>
                                <div class="d-grid">
                                    <a href="mailto:{{ $car->users->email }}" class="btn btn-danger text-center"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                            <path d="M3 7l9 6l9 -6" />
                                        </svg> Write Email</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 mt-4">
                        <div class="border bg-white ps-2 py-3 w-100">
                            <div class="d-grid">
                                <div class="row row-cols-2 row-cols-md-3">
                                    <div class="col d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-road"
                                            width="45" height="45" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 19l4 -14" />
                                            <path d="M16 5l4 14" />
                                            <path d="M12 8v-2" />
                                            <path d="M12 13v-2" />
                                            <path d="M12 18v-2" />
                                        </svg>
                                        <div class="d-flex flex-column">
                                            <span><small>Mileage</small></span>
                                            <h5><b>{{ number_format($car->mileage, 0) }}&nbsp;km</b></h5>
                                        </div>
                                    </div>
                                    <div class="col d-flex"><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-calendar-event" width="45"
                                            height="45" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                            <path d="M16 3l0 4" />
                                            <path d="M8 3l0 4" />
                                            <path d="M4 11l16 0" />
                                            <path d="M8 15h2v2h-2z" />
                                        </svg>
                                        <div class="d-flex flex-column">
                                            <span><small>First Registration</small></span>
                                            <h5><b>{{ $car->years->year }}</b></h5>
                                        </div>
                                    </div>
                                    <div class="col d-flex"><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-gauge" width="45" height="45"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M13.41 10.59l2.59 -2.59" />
                                            <path d="M7 12a5 5 0 0 1 5 -5" />
                                        </svg>
                                        <div class="d-flex flex-column">
                                            <span><small>Power</small></span>
                                            <h5><b>{{ round($car->power / 1.36) . ' kW' . ' (' . $car->power . ')' }}
                                                    Hp</b></h5>
                                        </div>
                                    </div>
                                    <div class="col d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-manual-gearbox" width="45"
                                            height="45" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M12 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M19 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M5 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M12 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M5 8l0 8" />
                                            <path d="M12 8l0 8" />
                                            <path d="M19 8v2a2 2 0 0 1 -2 2h-12" />
                                        </svg>
                                        <div class="d-flex flex-column">
                                            <span><small>Gearbox</small></span>
                                            <h5><b>{{ $car->gearboxs->gearbox }}</b></h5>
                                        </div>
                                    </div>
                                    <div class="col d-flex"><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-user" width="45" height="45"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        </svg>
                                        <div class="d-flex flex-column">
                                            <span><small>Owner</small></span>
                                            <h5><b>{{ $car->users->name }}</b></h5>
                                        </div>
                                    </div>
                                    <div class="col d-flex"><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-gas-station" width="45"
                                            height="45" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 11h1a2 2 0 0 1 2 2v3a1.5 1.5 0 0 0 3 0v-7l-3 -3" />
                                            <path d="M4 20v-14a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v14" />
                                            <path d="M3 20l12 0" />
                                            <path d="M18 7v1a1 1 0 0 0 1 1h1" />
                                            <path d="M4 11l10 0" />
                                        </svg>
                                        <div class="d-flex flex-column">
                                            <span><small>Fuel</small></span>
                                            <h5><b>{{ $car->fuels->fuel }}</b></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 mt-4">
                        <div class="border p-3 bg-white w-100">
                            <h5><b>Car Description</b></h5>
                            <hr>
                            <p>{{ $car->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 mt-4">
                        <div class="border p-3 bg-white w-100">
                            <h5><b>Technical data</b></h5>
                            <hr>
                            <div class="d-grid">
                                <div class="row">
                                    <div class="col-6"><b>Category</b></div>
                                    <div class="col-6">{{ $car->bodystyles->style }}</div>
                                </div>
                                <div class="row bg-gray">
                                    <div class="col-6"><b>Mileage</b></div>
                                    <div class="col-6">{{ number_format($car->mileage, 0) }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><b>Condition</b></div>
                                    <div class="col-6">{{ $car->conditions->Condition }}</div>
                                </div>
                                <div class="row bg-gray">
                                    <div class="col-6"><b>Power</b></div>
                                    <div class="col-6">
                                        {{ round($car->power / 1.36) . ' kW' . ' (' . $car->power . ')' }} Hp
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><b>Fuel</b></div>
                                    <div class="col-6">{{ $car->fuels->fuel }}</div>
                                </div>
                                <div class="row bg-gray">
                                    <div class="col-6"><b>Gearbox</b></div>
                                    <div class="col-6">{{ $car->gearboxs->gearbox }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><b>Registration</b></div>
                                    <div class="col-6">{{ $car->years->year }}</div>
                                </div>
                                <div class="row bg-gray">
                                    <div class="col-6"><b>Colour</b></div>
                                    <div class="col-6">{{ $car->colors->color }}</div>
                                </div>
                            </div>
                        </div>
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
