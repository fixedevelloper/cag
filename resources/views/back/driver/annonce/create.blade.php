@extends('back.layout')
@push('css')
    <link href="{!! asset('front/vendor/select2/css/select2.min.css') !!}" rel="stylesheet">
    <style>
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API')}}"></script>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Add Announcement</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Announcements</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 basic-form">
                <form method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header text-right">
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">Date</label>
                                    <input name="date_start" type="date" class="form-control" placeholder="date_start"
                                           required>
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">Time</label>
                                    <input name="time_start" type="time" class="form-control" placeholder="time" min="1"
                                           max="9" required>
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">Depature</label>
                                    <select name="city_from_id" class="form-select wide"
                                            aria-label="Default select example" id="departure-select">
                                        <option selected>Choose...</option>
                                        @foreach($cities as $city)
                                            <option value="{!! $city->id !!}">{!! $city->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">Arrival</label>
                                    <select name="city_to_id" class="form-select wide"
                                            aria-label="Default select example" id="arrival-select">
                                        <option selected>Choose...</option>
                                        @foreach($cities as $city)
                                            <option value="{!! $city->id !!}">{!! $city->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">Price</label>
                                    <input name="price" type="text" class="form-control" placeholder="price" required>
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">Number place</label>
                                    <input name="number_person" type="number" class="form-control"
                                           placeholder="number_person" min="1" max="9" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-right">
                            <h4>Vehicule</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-group">
                                <select class="form-select wide" aria-label="Default select example" name="driver_vehicle_id">
                                    <option selected>Choose...</option>
                                    @foreach($vehicles as $vehicle)
                                        <option value="1">{!! $vehicle->brand  !!}</option>
                                    @endforeach
                                </select>
                                <a class="btn btn-primary" type="button">Add Vehicle</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-right">
                            <h4>Map departure</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">

                                    <div id="map" style="height:450px"></div>

                                    <div id="legend"><h3>Legend</h3></div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <label class="form-label">Assembly point</label>
                                        <div class="input-group mb-3">

                                            <input name="departure_place" type="text" class="form-control" placeholder="date_start"
                                                   >
                                            <button class="btn btn-primary" type="button">Localise</button>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Distance</label>
                                        <input name="distance" type="text" class="form-control"
                                               disabled>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button class="btn btn-primary btn-block mt-3 mb-3">Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <!-- asColorpicker -->
    <script src="{!! asset('front/vendor/select2/js/select2.full.min.js') !!}"></script>
    <script src="{!! asset('front/js/select2-init.js') !!}"></script>
@endpush
