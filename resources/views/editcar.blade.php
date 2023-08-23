@extends('layouts.app')

@section('content')
    <div class="container w-100 w-lg-50">
        <main>
            <div class="py-5 text-center">
                {{-- <img class="d-block mx-auto mb-4" src="#" alt="Logo" width="72" height="57"> --}}
                <h1>{{ config('app.name', 'Grand Prix Motor') }}</h1>
                <h4>Upload Car</h4>
            </div>

            <div class="row g-2">

                <div class="col-md-6 col-lg-8">
                    <h4 class="mb-3">Car Details</h4>
                    <form class="needs-validation" method="POST" action="{{ route('profiles.update', $car->id ) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="Manufacturer" class="form-label">Manufacturer</label>
                                <select class="form-select" id="Manufacturer" name="Manufacturer" required>
                                    <option class="bg-secondary" selected value={{ $car->manufacturers->id }}>{{ $car->manufacturers->brand }}</option>
                                    @foreach ($manufacturer as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Manufacturer.
                                </div>
                            </div>

                            <div class="col-sm-6 text-capitalize">
                                <label for="Model" class="form-label">Model</label>
                                <select class="form-select" id="Model" name="Model" required>
                                    <option class="bg-secondary" selected value={{ $car->models->id }}>{{ $car->models->name }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Model.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Body" class="form-label">Body Style</label>
                                <select class="form-select" id="Body" name="Bodystyle" required>
                                    <option class="bg-secondary" selected value={{ $car->bodystyles->id }}>{{ $car->bodystyles->style }}</option>
                                    @foreach ($bodystyle as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid Body Style.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Color" class="form-label">Color</label>
                                <select class="form-select" id="Color" name="Color" required>
                                    <option class="bg-secondary" selected value={{ $car->colors->id }}>{{ $car->colors->color }}</option>
                                    @foreach ($color as $key => $value)
                                        <option value="{{ $key }}" style="color: {{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid Color.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Condition" class="form-label">Condition</label>
                                <select class="form-select" id="Condition" name="Condition" required>
                                    <option class="bg-secondary" selected value={{ $car->conditions->id }}>{{ $car->conditions->Condition }}</option>
                                    @foreach ($condition as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Condition.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Year" class="form-label">Year</label>
                                <select class="form-select" id="Year" name="Year" required>
                                    <option class="bg-secondary" selected value={{ $car->years->id }}>{{ $car->years->year }}</option>
                                    @foreach ($year as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Year.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Mileage" class="form-label">Mileage</label>
                                <input type="text" class="form-control" name="Mileage" id="Mileage" value="{{ $car->mileage }}" required>
                                <div class="invalid-feedback">
                                    Please enter a valid Mileage.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="GearBox" class="form-label">Gear Box</label>
                                <select class="form-select" id="GearBox" name="GearBox" required>
                                    <option class="bg-secondary" selected value={{ $car->gearboxs->id }}>{{ $car->gearboxs->gearbox }}</option>
                                    @foreach ($gearbox as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Gear Box.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Fuel" class="form-label">Fuel</label>
                                <select class="form-select" id="Fuel" name="Fuel" required>
                                    <option class="bg-secondary" selected value={{ $car->fuels->id }}>{{ $car->fuels->fuel }}</option>
                                    @foreach ($fuel as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Fuel.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Registration" class="form-label">Registration</label>
                                <select class="form-select" id="Registration" name="Registration" required>
                                    <option class="bg-secondary" selected value={{ $car->registrations->id }}>{{ $car->registrations->registration }}</option>
                                    @foreach ($registration as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Registration.
                                </div>
                            </div>

                            <div class="col-12">
                                <div id="car{{ $car->id }}" class="carousel slide carousel-fade">
                                    <div class="carousel-inner">
                                        @foreach ($car->images as $image)
                                            <div class="carousel-item active">
                                                <a href="{{ $image->id }}" class="position-absolute start-50"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                  </svg></a>
                                                <img src="{{ asset('storage/images/cars/' . $image->image) }}"
                                                    class="d-block w-100" alt="Car Image">
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
                                <span>Car Photos</span>

                                <input type="file" class="form-control" name="images[]" id="imageUpload"
                                    multiple>
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">State</label>
                                <select class="form-select" id="state" name="State" required>
                                    <option class="bg-secondary" selected value={{ $car->states->id }}>{{ $car->states->state }}</option>
                                    @foreach ($state as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="Description" id="description">{{ $car->description }}</textarea>
                            </div>

                            <div class="col-sm-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" name="Price" id="price" value="{{ $car->price }}">
                            </div>
                        </div>

                        <button class="w-100 btn btn-primary btn-lg mt-3" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
<script type="text/javascript">
    $(document).ready(function() {
        $(".carousel .carousel-item").nextAll().removeClass("active");
    });
</script>
{{-- Dependent Drop-Down List --}}
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
                        $('select[name="Model"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="Model"]').append('<option class=" text-uppercase" value="' +
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
{{-- @extends('layouts.footer') --}}
