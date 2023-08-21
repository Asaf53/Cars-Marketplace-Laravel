@extends('layouts.app')
@section('content')
    @if ($msg = Session::get('alert'))
        <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
            <i class="bx bx-check h5"></i>
            <strong>{{ $msg }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <!-- <th>FirstName</th> -->
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Body Style</th>
                                <th>Price</th>
                                <th>Year</th>
                                <th>Location</th>
                                <th>Fuel</th>
                                <th>Mileage</th>
                                <th>Exterior Color</th>
                                <th>Description</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        @foreach ($cars as $car)
                            <tbody>
                                <tr class="align-middle">
                                    <td>{{ $car->manufacturers->brand }}</td>
                                    <td>{{ $car->models->name }}</td>
                                    <td>{{ $car->bodystyles->style }}</td>
                                    <td>{{ $car->price }}</td>
                                    <td>{{ $car->years->year }}</td>
                                    <td>{{ $car->states->state }}</td>
                                    <td>{{ $car->fuels->fuel }}</td>
                                    <td>{{ $car->mileage }}</td>
                                    <td>{{ $car->colors->color }}</td>
                                    <td>{{ $car->description }}</td>
                                    <td class="w-10">
                                        <div id="car{{ $car->id }}" class="carousel slide carousel-fade">
                                            <div class="carousel-inner">
                                                @foreach ($car->images as $image)
                                                    <div class="carousel-item active">
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
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('profile.destroy', $car->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                        {{-- <a href="{{ route('profile.edit', $car->id) }}" class="btn btn-warning">Edit</a> --}}
                                        {{-- <a href="{{ route('profile.destroy', $car->id) }}" class="btn btn-danger">Delete</a> --}}
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
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
