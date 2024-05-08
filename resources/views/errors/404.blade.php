@extends('back.layout')
@push("styles")
    <!-- date picker -->
    <link rel="stylesheet" type="text/css" href="{{asset("back/date-picker.css")}}">
@endpush
@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>404 page</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">404 page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="p-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="error-section">
                        <h1>404</h1>
                        <h2>page not found</h2>
                        <a href="{{route("home")}}" class="btn btn-solid">back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push("scripts")
    <!-- dare picker js -->
    <script src="{{asset("back/js/date-picker.js")}}"></script>
    <!-- chart js -->
    <script src="{{asset("back/js/chart/apex/apexcharts.js")}}"></script>
    <script src="{{asset("back/js/chart/apex/custom-chart.js")}}"></script>
    <script>

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
        $('#datepicker1').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
@endpush
