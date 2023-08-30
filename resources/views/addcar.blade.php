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
                    <form class="needs-validation" method="post" action="{{ route('storeCar') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="Manufacturer" class="form-label">Manufacturer</label>
                                <select class="form-select" id="Manufacturer" name="Manufacturer" required>
                                    <option value="">Choose Manufacturer</option>
                                    @foreach ($manufacturer as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('Manufacturer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6 text-capitalize">
                                <label for="Model" class="form-label">Model</label>
                                <select class="form-select" id="Model" name="Model" required>
                                </select>
                                @error('Model')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="Body" class="form-label">Body Style</label>
                                <select class="form-select" id="Body" name="Bodystyle" required>
                                    <option value="">Choose Body Syle</option>
                                    @foreach ($bodystyle as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('Bodystyle')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="Color" class="form-label">Color</label>
                                <select class="form-select" id="Color" name="Color" required>
                                    <option value="">Choose Color</option>
                                    @foreach ($color as $key => $value)
                                        <option value="{{ $key }}" style="color: {{ $value }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('Color')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="Condition" class="form-label">Condition</label>
                                <select class="form-select" id="Condition" name="Condition" required>
                                    <option value="">Choose Condition</option>
                                    @foreach ($condition as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('Condition')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="Year" class="form-label">Year</label>
                                <select class="form-select" id="Year" name="Year" required>
                                    <option value="">Choose...</option>
                                    @foreach ($year as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('Year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="Mileage" class="form-label">Mileage</label>
                                <input type="text" class="form-control" name="Mileage" id="Mileage" required>
                                @error('Mileage')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="GearBox" class="form-label">Gear Box</label>
                                <select class="form-select" id="GearBox" name="GearBox" required>
                                    <option value="">Choose...</option>
                                    @foreach ($gearbox as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('GearBox')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="Fuel" class="form-label">Fuel</label>
                                <select class="form-select" id="Fuel" name="Fuel" required>
                                    <option value="">Choose...</option>
                                    @foreach ($fuel as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('Fuel')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="Registration" class="form-label">Registration</label>
                                <select class="form-select" id="Registration" name="Registration" required>
                                    <option value="">Choose...</option>
                                    @foreach ($registration as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('Registration')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <span>Car Photos</span>
                                <input type="file" class="form-control" name="images[]" id="imageUpload" multiple>
                                @error('images')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">State</label>
                                <select class="form-select" id="state" name="State" required>
                                    <option value="">Choose...</option>
                                    @foreach ($state as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('State')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-5">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="Description" id="description"></textarea>
                                @error('Description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" name="Price" id="price">
                                {{-- <div class="form-check">
                                    <input id="euro" name="paymentMethod" type="radio" class="form-check-input"
                                        required>
                                    <label class="form-check-label" for="euro">EURO</label>
                                </div>
                                <div class="form-check">
                                    <input id="mkd" name="paymentMethod" type="radio" class="form-check-input"
                                        required>
                                    <label class="form-check-label" for="mkd">MKD</label>
                                </div> --}}
                                @error('Price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label for="Power" class="form-label">Power</label>
                                <input type="text" class="form-control" name="Power" id="Power">
                                @error('Power')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
@extends('layouts.footer')
