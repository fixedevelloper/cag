@extends('auth.layout')

@section('content')
    <div class="row no-gutters">
        <div class="col-xl-12">
            <div class="auth-form">
                <div class="mini-logo text-center my-4">
                    <a href="{!! route('home') !!}"><img src="{!! asset('back/images/logo.png') !!}" alt=""></a>
                    <h4 class="card-title mt-3">Verify your Email</h4>
                </div>
                <div class="auth-form card">
                    <div class="card-body">
                        <form action="#" class="identity-upload">
                            <div class="identity-content">
                                <div class="text-center mb-3">
                                    <img src="{!! asset('admin/fonts/feather/mail.svg') !!}" alt="" width="50">
                                </div>
                                <p>We sent verification email to <strong
                                        class="text-dark">{!! $user->email !!}</strong>. Click the link inside to
                                    get started!</p>
                                <a href="{!! route('back.dashboard') !!}">Go to Dashboard</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn btn-primary" href="{!! route('auth.signin') !!}">Email didn't arrive?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
