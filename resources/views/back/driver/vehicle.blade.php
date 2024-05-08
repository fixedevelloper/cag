@extends('back.layout')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Your Vehicles</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Announcement</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Cars</a></li>
                </ol>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-right">
                    <a class="btn btn-dark" href="{!! route('driver.add_car_modal') !!}"><i class="flaticon-381-plus"></i>ADD CAR</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th style="width:80px;"><strong>#</strong></th>
                                <th><strong>BRAND</strong></th>
                                <th><strong>COLOR</strong></th>
                                <th><strong>NUMBER</strong></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td><strong>{!! $loop->index+1 !!}</strong></td>
                                <td>{!! $item->brand !!}</td>
                                <td><span class="btn btn-block" style="background-color: {!! $item->color !!}"></span></td>
                                <td>{!! $item->number !!}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                        </button>
                                        <div class="dropdown-menu">
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
    <div class="modal fade" id="basicModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                <form  class="identity-upload" method="POST" action="{!! route('driver.add_car_modal') !!}">
                    @csrf
                    <div class="identity-content">
                        <div class="col-12">
                            <label class="form-label">Brand</label>
                            <input name="brand" type="text" class="form-control" placeholder="address">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Number</label>
                            <input name="brand" type="text" class="form-control" placeholder="address">
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
