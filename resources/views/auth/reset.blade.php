@extends('auth.layout')

@section('content')

    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-xl-5 col-md-6">
            <div class="mini-logo text-center my-4">
                <a href="{!! route('home') !!}"
                ><img src="{!! asset('back/images/logo.png') !!}" alt=""
                    /></a>
                <h4 class="card-title mt-3">Reset Password</h4>
            </div>
            <div class="auth-form card">
                <div class="card-body">
                    <form method="POST" class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Email</label>

                            <input type="text" class="form-control" placeholder="***********">
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>

                    <div class="new-account mt-3">
                        <p>Don't get code? <button class="text-primary">Resend</button></p>
                    </div>
                    </form>
                </div>
            </div>
            <div class="privacy-link">
                <a href="signup.html">Have an issue with 2-factor authentication?</a
                >
                <br/>
                <a href="signup.html">Privacy Policy</a>
            </div>
        </div>
    </div>

@endsection
