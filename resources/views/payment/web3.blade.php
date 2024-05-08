@extends('auth.layout')

@section('content')

    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-xl-8 col-md-8">

            <div class="auth-form card">
                <div class="card-header">
                    <h4 class="card-title">Review</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Address</td>
                            <td>{!! $wallet->address !!}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>{!! $trade->quantity !!}  {!! $trade->crypto->name !!}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark btn-block">Process</button>
                </div>
            </div>


        </div>
    </div>
    <a href="{!! route('back.trade') !!}" class="scroll-to-top scroll-to-target"><span class="icofont-arrow-left"></span></a>
@endsection

