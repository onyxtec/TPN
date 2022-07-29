@extends('customer/home')
@section('main-section')
<link rel="stylesheet" href="{{ asset(mix('customer-resources/sass/base/client.css')) }}">
<peer-profile-component :peer="{{$peer}}">
</peer-profile-component>
@endsection