@extends('back.layout')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Your Trips</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Trips</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label class="form-label">Enter code</label>
                <div class="input-group mb-3">
                    <input name="departure_place" type="text" class="form-control" placeholder="CM_02111111"
                    >
                    <button class="btn btn-primary" type="button">Search</button>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Map trip</h4>
                    </div>
                    <div class="card-body">
                        <div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail trip</h4>
                    </div>
                    <div class="card-body">
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

