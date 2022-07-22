@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/partials/page-headerfooter.css')) }}">
    <div>
        @if (Auth::guard('client')->user())
            <header-component :user={{ Auth::guard('client')->user()->id }}>
            </header-component>
        @elseif(Auth::guard('peer')->user())
            <header-component :user={{ Auth::guard('peer')->user()->id }}>
            </header-component>
        @else
        <header-component>
        </header-component>
        @endif

        <div style="display: flex;justify-content:center;align-items:center;padding-top:40px"> 
            <button style="padding:25px; width:50%"><a href="/bookingform" style="color:white;">Book Now</a></button>
        </div>
        <footer-component>
        </footer-component>
    </div>
@endsection
