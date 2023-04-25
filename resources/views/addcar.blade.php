@extends('layouts.app')

@section('content')
    <div class="container w-100 w-lg-50">
        <main>
            <div class="py-5 text-center">
                {{-- <img class="d-block mx-auto mb-4" src="#" alt="Logo" width="72" height="57"> --}}
                <h1>{{ config('app.name', 'Laravel') }}</h1>
                <h4>Upload Car</h4>
            </div>

            <div class="row g-2">

                <div class="col-md-6 col-lg-8">
                    <h4 class="mb-3">Car Details</h4>
                    <form class="needs-validation" method="post" action="{{ route('storeCar') }}">
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
                                <div class="invalid-feedback">
                                    Please enter a valid Manufacturer.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Model" class="form-label">Model</label>
                                <select class="form-select" id="Model" name="Model" required>
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Model.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Body" class="form-label">Body Style</label>
                                <select class="form-select" id="Body" name="Bodystyle" required>
                                    <option value="">Choose Body Syle</option>
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
                                    <option value="">Choose Color</option>
                                    @foreach ($color as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid Color.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Condition" class="form-label">Condition</label>
                                <select class="form-select" id="Condition" name="Condition" required>
                                    <option value="">Choose Condition</option>
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
                                    <option value="">Choose...</option>
                                    @foreach ($year as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Year.
                                </div>
                            </div>

                            {{--<div class="col-sm-6">
                                <label for="Mileage" class="form-label">Mileage</label>
                                <input type="text" class="form-control" name="Mileage" id="Mileage" required>
                                <div class="invalid-feedback">
                                    Please enter a valid Mileage.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="GearBox" class="form-label">Gear Box</label>
                                <select class="form-select" id="GearBox" required>
                                    <option value="">Choose...</option>
                                    <option>Automatic</option>
                                    <option>Manual</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Gear Box.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Fuel" class="form-label">Fuel</label>
                                <select class="form-select" id="Fuel" required>
                                    <option value="">Choose...</option>
                                    <option>Gasoline</option>
                                    <option>Diesel</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Fuel.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Registration" class="form-label">Registration</label>
                                <select class="form-select" id="Registration" required>
                                    <option value="">Choose...</option>
                                    <option>Macedonia</option>
                                    <option>Other</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please enter a valid Registration.
                                </div>
                            </div>

                            <div class="col-12 bg-secondary rounded bg-gray">
                                <span>Car Photos</span>
                                <input type="file" class="form-control" id="photoUpload">
                                <div class="p-2 d-block">
                                    <img src="foto.jpg" alt="foto" class="w-10">
                                    <a href="#" class=" position-absolute"><i class='bx bx-x-circle'></i></a>
                                </div>
                                <div class="p-2">
                                    <img src="foto.jpg" alt="foto" class="w-10">
                                    <a href="#"><i class='bx bx-x-circle'></i></a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">State</label>
                                <select class="form-select" id="state" required>
                                    <option value="">Choose...</option>
                                    <option>Gostivar</option>
                                    <option>Skopje</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>

                            <div class="col-sm-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" id="price">
                                <div class="form-check">
                                    <input id="euro" name="paymentMethod" type="radio" class="form-check-input"
                                        required>
                                    <label class="form-check-label" for="euro">EURO</label>
                                </div>
                                <div class="form-check">
                                    <input id="mkd" name="paymentMethod" type="radio" class="form-check-input"
                                        required>
                                    <label class="form-check-label" for="mkd">MKD</label>
                                </div>
                            </div> --}}
                        </div>

                        <button class="w-100 btn btn-primary btn-lg mt-3" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="Manufacturer"]').on('change', function() {
            var manufacturerID = $(this).val();
            if(manufacturerID) {
                $.ajax({
                    url: '/model/'+manufacturerID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="Model"]').empty();
                        $.each(data, function(key, value) {
                        $('select[name="Model"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="Model"]').empty();
            }
        });
    });
</script>
@extends('layouts.footer')
