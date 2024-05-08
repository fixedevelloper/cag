@extends('back.layout')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Your announcement</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Announcement</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">List</a></li>
                </ol>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th style="width:80px;"><strong>#</strong></th>
                                <th><strong>DATE</strong></th>
                                <th><strong>FROM</strong></th>
                                <th><strong>TO</strong></th>
                                <th><strong>PLACE</strong></th>
                                <th><strong>PRICE</strong></th>
                                <th><strong>STATUS</strong></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td><strong>{!! $loop->index !!}</strong></td>
                                <td>{!! \Carbon\Carbon::parse($item->date_start)->format("D,M,Y") !!} {!! $item->time_start!!}</td>
                                <td>{!! $item->city_from->name !!}</td>
                                <td>{!! $item->city_to->name !!}</td>
                                <td>{!! $item->number_person !!}</td>
                                <td>{!! $item->price !!}</td>
                                <td><span class="badge light badge-success">Successful</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Detail</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
