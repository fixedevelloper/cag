@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Customers
                            <small></small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.bc_dashboard')}}">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Customers</li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <form class="form-inline search-form search-box">
                            <div class="form-group">
                                <input class="form-control-plaintext" type="search" name="search" placeholder="Search..">
                            </div>
                        </form>
                    </div>
   </div>

                    <div class="card-body">
                        <div>
                            <div class="table-responsive table-desi">
                                <table class="all-package coupon-table table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            N°
                                        </th>
                                        <th>Photo</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Balance</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr data-row-id="1">
                                            <td>
                                                {!! $loop->index+1 !!}
                                            </td>
                                            <td><img src="{!! asset("storage/".$item->photo) !!}" class="img-60"></td>
                                            <td>{{$item->first_name}}</td>
                                            <td>{{$item->last_name}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->email}}</td>

                                            <td> @if(!is_null($item->country)){{$item->country->name}}@endif</td>
                                            <td>{{$item->balance}}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$items->links('vendor.pagination.custompage')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

