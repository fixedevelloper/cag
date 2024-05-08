@extends('back.layout')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">My Favorites</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">My Favorite</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4>No announcements</h4>
                @foreach($items as $item)
                <div class="col-lg-12 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row m-b-30">
                                <div class="col-md-5 col-xxl-12">
                                    <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                        <div class="new-arrivals-img-contnent">
                                            <img class="img-fluid" src="{!! asset("storage/".$item->driver_vehicle->image_from) !!}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-xxl-12">
                                    <div class="new-arrival-content position-relative">
                                        <h4><a href="#">{!! $item->city_from->name !!} <i class="fa fa-arrow-right"></i> {!! $item->city_to->name !!}</a></h4>
                                        <div class="comment-review star-rating">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-empty"></i></li>
                                                <li><i class="fa fa-star-half-empty"></i></li>
                                            </ul>
                                            <p class="price">{!! $item->price !!} FCFA</p>
                                        </div>
                                        <p>Availability: <span class="item"> 3 places <i class="fa fa-check-circle text-success"></i></span></p>
                                        <p>Date departure: <span class="item"> {{ \Carbon\Carbon::parse($item->date_start)->format('D,M,Y') }} {{ $item->time_start }}</span> </p>
                                        <p>Brand: <span class="item">{!! $item->driver_vehicle->brand !!}</span></p>
                                        <p>Color: <span class="item"><span class="btn" style="background-color: {!! $item->driver_vehicle->color !!}"></span></span></p>
                                        <p class="text-content"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
