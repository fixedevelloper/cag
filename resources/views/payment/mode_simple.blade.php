@extends('auth.layout')

@section('content')

    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-xl-8 col-md-8">

            <div class="auth-form card">
                <div class="card-header">
                    <h4 class="card-title">  Complete your payment from <span class="text-success">{!! $user->country->name !!}</span> </h4>
                </div>
                <div class="card-body">
                    @if($user->country->iso=="CM")
                        <div class="card h-unset no-shadow">
                            <div class="card-header">
                                <h4 class="card-title">Automatic payment</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                            <span class="me-3 icon-circle bg-warning text-white"
                            ><i class="icofont-question-square"></i
                                ></span>
                                    <div>
                                        <h5 class="mb-0">
                                            You haven't authorized any applications yet.
                                        </h5>
                                        <p>
                                            After connecting an application with your
                                            account, you can manage or revoke its access
                                            here.
                                        </p>
                                        <a class="btn btn-primary">Flutterware</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card h-unset no-shadow">
                            <div class="card-header">
                                <h4 class="card-title">Manuel payment</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                   1- Send your money to number 237 xxx xx xx xx
                                </p>
                                <hr class="dropdown-divider my-4" />
                                <p>
                                  2-  Upload proof
                                </p>
                                <form method="POST" class="row g-3">
                                    <div class="col-12">
                                        <input type="file" class="form-control" placeholder="***********">
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                        @if($user->country->iso=="CG")
                            <div class="card h-unset no-shadow">
                                <div class="card-header">
                                    <h4 class="card-title">Automatic payment</h4>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                            <span class="me-3 icon-circle bg-warning text-white"
                            ><i class="icofont-question-square"></i
                                ></span>
                                        <div>
                                            <h5 class="mb-0">
                                                You haven't authorized any applications yet.
                                            </h5>
                                            <p>
                                                After connecting an application with your
                                                account, you can manage or revoke its access
                                                here.
                                            </p>
                                            <a class="btn btn-primary">ELOKOPAY</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card h-unset no-shadow">
                                <div class="card-header">
                                    <h4 class="card-title">Manuel payment</h4>
                                </div>
                                <div class="card-body">
                                    <p>
                                        1- Send your money to number 237 xxx xx xx xx
                                    </p>
                                    <hr class="dropdown-divider my-4" />
                                    <p>
                                        2-  Upload proof
                                    </p>
                                    <form method="POST" class="row g-3" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12">
                                            <input required type="file" class="form-control" placeholder="***********">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                </div>
            </div>

        </div>
    </div>
    <a href="{!! route('back.wallet') !!}" class="scroll-to-top scroll-to-target"><span class="icofont-arrow-left"></span></a>
@endsection
