@extends('vendor.mail.html.layout')
@section('content')
    <p>Hi {!! $first_name !!}</p>
    <a href="{!! route('auth.email_verified',['putrezasetup'=>$activate_key,'activate_key'=>"plotyedse"]) !!}">click here to verified your email</a>
@endsection
