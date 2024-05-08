@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Trades Pending
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
                        <li class="breadcrumb-item">Trades Pending</li>
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
                                <input class="form-control-plaintext" type="search" name="search"
                                       placeholder="Search..">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="coupon-table table table-striped">
                                <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Type</th>
                                    <td></td>
                                    <th>Coin Name</th>
                                    <th>Wallet</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $transaction)
                                    <tr>
                                        <td class="text-center">{!! $loop->index +1 !!}</td>
                                        <td>
                                            @if($transaction->type_trade==\App\Models\Trading::TRADE_SELL)
                                                <span class="text-danger">
                                     <i class="fa fa-arrow-down"></i>
                                    Sold
                                   </span>
                                            @elseif($transaction->type_trade==\App\Models\Trading::TRADE_BUY)
                                                <span class="text-success">
                                     <i class="fa fa-arrow-up"></i>
                                    Buy
                                   </span>
                                            @else
                                                <span class="text-danger">
                                     <i class="fa fa-arrow-left"></i>
                                    Transfer
                                   </span>
                                            @endif
                                        </td>
                                        <td><img src="{!! $transaction->crypto->iconUrl !!}" class="img-50"></td>
                                        <td class="coin-name">{!! $transaction->crypto->name !!}
                                        </td>
                                        <td>Using -
                                            Address {!! \App\Helpers\Helper::getWalletHome($transaction->crypto->id,$transaction->user_id)->address !!}</td>
                                        <td>{!! $transaction->status !!}</td>
                                        <td class="text-danger">{!! $transaction->amount !!} FCFA</td>
                                        <td>{!! $transaction->quantity !!}</td>
                                        <td>

                                            <a class="btn btn-sm btn-dark"
                                               href="{!! route('admin.bc_trade_detail',['id'=>$transaction->id]) !!}"><i
                                                    data-feather="list"></i></a>

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
    </div>
@endsection

