@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Trade Detail
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
                        <li class="breadcrumb-item">Trades</li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Customer</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dl>
                                <dt>Name</dt>
                                <dd>{!! $item->user->first_name.' '.$item->user->last_name !!}</dd>
                                <dt>Email</dt>
                                <dd>{!! $item->user->email !!} </dd>
                                <dt>Phone</dt>
                                <dd>{!! $item->user->phone !!} </dd>
                                <dt>Country</dt>
                                <dd>{!! $item->user->country->name !!} </dd>
                                <dt>City</dt>
                                <dd>{!! $item->user->city !!} </dd>
                                <dt>Wallet Address</dt>
                                <dd>{!! \App\Helpers\Helper::getWalletHome($item->crypto->id,$item->user->id)->address !!} </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt>Photo</dt>
                                <dd><img src="{!! asset("storage/".$item->user->photo) !!}" alt="Photo" width="100"></dd>
                                <dt>Address</dt>
                                <dd>{!! $item->user->address !!}</dd>
                                <dt>Balance</dt>
                                <dd>{!! $item->user->balance !!} FCFA</dd>
                                <dt>Date born</dt>
                                <dd>{!! $item->user->date_born !!} </dd>

                            </dl>
                        </div>
                    </div>



                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Trade</h4>
                    </div>
                </div>
                <div class="card-body">
                    <dl>
                        <dt>Crypto</dt>
                        <dd><img class="img-20" src="{!! $item->crypto->iconUrl !!}">{!! $item->crypto->name !!}</dd>
                        <dt>Amount</dt>
                        <dd>{!! $item->amount !!} FCFA</dd>
                        <dt>Quantity</dt>
                        <dd>{!! $item->quantity !!}</dd>
                        <dt>Type de transaction</dt>
                        <dd>
                            @if($item->type_trade==\App\Models\Trading::TRADE_SELL)
                                <span class="text-danger">
                                     <i class="fa fa-arrow-down"></i>
                                    Sold
                                   </span>
                            @elseif($item->type_trade==\App\Models\Trading::TRADE_BUY)
                                <span class="text-success">
                                     <i class="fa fa-arrow-up"></i>
                                    Buy
                                   </span>
                            @else
                                <span class="text-warning">
                                     <i class="fa fa-arrow-right"></i>
                                    Transfer
                                   </span>
                            @endif
                        </dd>
                        <dt>Status</dt>
                        <dd>{!! $item->status !!}</dd>
                    </dl>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Actions</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="{!! \App\Models\Trading::PENDING !!}" @if($item->status== \App\Models\Trading::PENDING) selected @endif>{!! \App\Models\Trading::PENDING !!}</option>
                                    <option value="{!! \App\Models\Trading::PROCESSING !!}" @if($item->status== \App\Models\Trading::PROCESSING) selected @endif>{!! \App\Models\Trading::PROCESSING !!}</option>
                                    <option value="{!! \App\Models\Trading::ACCEPTED !!}" @if($item->status== \App\Models\Trading::ACCEPTED) selected @endif>{!! \App\Models\Trading::ACCEPTED !!}</option>
                                    <option value="{!! \App\Models\Trading::DENIED !!}" @if($item->status== \App\Models\Trading::DENIED) selected @endif>{!! \App\Models\Trading::DENIED !!}</option>
                                </select>
                        </div>
                        <div>
                            <h4 class="mt-3">Proof</h4>
                            <img src="{!! $item->proof !!}" width="100%" height="100px">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-sm btn-dark">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

