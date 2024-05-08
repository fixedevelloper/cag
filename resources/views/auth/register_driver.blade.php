@extends('auth.layout')

@section('content')

    <div class="row no-gutters">
        <div class="col-xl-12">
            <div class="auth-form">
                <div class="text-center mb-3">
                    <a href="{!! route('home') !!}"><img src="images/logo-full.png" alt="{!! config('app.name') !!}"></a>
                </div>
                <h4 class="text-center mb-4">Sign up your driver account</h4>
                <form method="POSt" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="mb-1"><strong>FirstName</strong></label>
                            <input type="text" class="form-control" placeholder="Name" name="first_name">
                        </div>
                        <div class="form-group col-6">
                            <label class="mb-1"><strong>LastName</strong></label>
                            <input type="text" class="form-control" placeholder="Name" name="last_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="mb-1"><strong>Phone</strong></label>
                        <input type="text" class="form-control" placeholder="Phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label class="mb-1"><strong>Email</strong></label>
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label class="mb-1"><strong>Password</strong></label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Sign Me Up</button>
                    </div>
                </form>
                <div class="new-account mt-3">
                    <p>Already have an account? <a class="text-primary" href="{!! route('auth.signin') !!}">Sign in</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection
