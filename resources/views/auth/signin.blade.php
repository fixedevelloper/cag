@extends('auth.layout')

@section('content')

    <div class="row no-gutters">
        <div class="col-xl-12">
            <div class="auth-form">
                <div class="text-center mb-3">
                    <a href="{!! route('home') !!}"><img src="images/logo-full.png" alt="CAM-GO"></a>
                </div>
                <h4 class="text-center mb-4">Sign in your account</h4>
                <form method="POSt" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="mb-1"><strong>Email</strong></label>
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label class="mb-1"><strong>Password</strong></label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                        <div class="form-group">
                            <div class="form-check custom-checkbox ms-1">
                                <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                    </div>
                </form>
                <div class="new-account mt-3">
                    <p>Don't have an account? <a class="text-primary" href="{!! route('auth.register') !!}">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection
