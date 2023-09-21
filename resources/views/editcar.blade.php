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
                <div class="col-md-3 order-1">
                    @foreach ($car->images as $image)
                        <form action="{{ route('kotkot', $image->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="mt-3 border-0 bg-transparent position-absolute d-flex justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                    width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                        </form>
                        <img src="{{ asset('storage/images/cars/' . $image->image) }}" class="d-block w-100"
                            alt="Car Image">
                    @endforeach
                </div>

                <div class="col-md-6 col-lg-8">
                    <h4 class="mb-3">Car Details</h4>
                    <form class="needs-validation" method="POST" action="{{ route('profiles.update', $car->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="Manufacturer" class="form-label">Manufacturer</label>
                                <select class="form-select" id="Manufacturer" name="Manufacturer" required>
                                    <option class="bg-secondary" selected value={{ $car->manufacturers->id }}>
                                        {{ $car->manufacturers->brand }}</option>
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
                                    <option class="bg-secondary" selected value={{ $car->models->id }}>
                                        {{ $car->models->name }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Model.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Body" class="form-label">Body Style</label>
                                <select class="form-select" id="Body" name="Bodystyle" required>
                                    <option class="bg-secondary" selected value={{ $car->bodystyles->id }}>
                                        {{ $car->bodystyles->style }}</option>
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
                                    <option class="bg-secondary" selected value={{ $car->colors->id }}>
                                        {{ $car->colors->color }}</option>
                                    @foreach ($color as $key => $value)
                                        <option value="{{ $key }}" style="color: {{ $value }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid Color.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Condition" class="form-label">Condition</label>
                                <select class="form-select" id="Condition" name="Condition" required>
                                    <option class="bg-secondary" selected value={{ $car->conditions->id }}>
                                        {{ $car->conditions->Condition }}</option>
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
                                    <option class="bg-secondary" selected value={{ $car->years->id }}>
                                        {{ $car->years->year }}</option>
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
                                <input type="number" class="form-control" name="Mileage" id="Mileage"
                                    value="{{ $car->mileage }}" required>
                                <div class="invalid-feedback">
                                    Please enter a valid Mileage.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="GearBox" class="form-label">Gear Box</label>
                                <select class="form-select" id="GearBox" name="GearBox" required>
                                    <option class="bg-secondary" selected value={{ $car->gearboxs->id }}>
                                        {{ $car->gearboxs->gearbox }}</option>
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
                                    <option class="bg-secondary" selected value={{ $car->fuels->id }}>
                                        {{ $car->fuels->fuel }}</option>
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
                                    <option class="bg-secondary" selected value={{ $car->registrations->id }}>
                                        {{ $car->registrations->registration }}</option>
                                    @foreach ($registration as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Registration.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="imageUpload" class="form-label">Car Photos</label>
                                <input type="file" class="form-control" name="images[]" id="imageUpload" multiple>
                            </div>

                            <div class="col-sm-6">
                                <label for="state" class="form-label">State</label>
                                <select class="form-select" id="state" name="State" required>
                                    <option class="bg-secondary" selected value={{ $car->states->id }}>
                                        {{ $car->states->state }}</option>
                                    @foreach ($state as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" name="Price" id="price"
                                    value="{{ $car->price }}">
                                <div class="invalid-feedback">
                                    Please enter a valid Price.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="Description" id="description">{{ $car->description }}</textarea>
                                <div class="invalid-feedback">
                                    Please enter a valid Description.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Power" class="form-label">Power</label>
                                <input type="number" class="form-control" name="Power" id="Power"
                                    value="{{ $car->power }}" required>
                                <div class="invalid-feedback">
                                    Please enter a valid Power.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" name="Phone" id="Phone"
                                    value="{{ $car->phone_number }}" required>
                                <div class="invalid-feedback">
                                    Please enter a valid Phone.
                                </div>
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
{{-- @extends('layouts.footer') --}}
