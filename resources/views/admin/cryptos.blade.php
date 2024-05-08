@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Crypto Money
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
                        <li class="breadcrumb-item">Crypto Money</li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div>
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

                                        </th>
                                        <th>Name</th>
                                        <th>Symbol</th>
                                        <th>Price</th>
                                        <th>Taux Buy</th>
                                        <th>Taux Sell</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr data-row-id="1">
                                            <td>
                                              {{--  {!! $loop->index+1 !!}--}}
                                                <img src="{!! $item->iconUrl !!}" class="img-20">
                                            </td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->symbol}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->taux}}</td>
                                            <td>{{$item->taux_sell}}</td>
                                            <td><a class="btn" href="{!! route('admin.bc_activeOrDesactive',['id'=>$item->id]) !!}">
                                                <i @if($item->status) class="text-success" data-feather="check-circle" @else  class="text-danger" data-feather="x-circle" @endif></i> </td>
                                            </a><td>
                                                <a href="{!! route('admin.bc_taux_modal',['id'=>$item->id]) !!}" class="btn btn-outline-primary btn-sm" rel="modal:open"><i data-feather="minimize"></i></a>
                                            </td>
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
    <!-- exit modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal exit-modal" id="exit_popup" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="media">
                                        <img src="../assets/images/stop.png"
                                             class="stop img-fluid blur-up lazyload me-3" alt="">
                                        <div class="media-body text-start align-self-center">
                                            <div>
                                                <h2>wait!</h2>
                                                <h4>We want to give you
                                                    <b>10% discount</b>
                                                    <span>for your first order</span>
                                                </h4>
                                                <h5>Use discount code at checkout</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add to cart modal popup end-->

@endsection

