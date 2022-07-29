@extends('customer/home')
@section('main-section')
<link rel="stylesheet" href="{{ asset(mix('customer-resources/sass/base/client.css')) }}">
<client-profile-component :client="{{$client}}">
</client-profile-component>

@endsection