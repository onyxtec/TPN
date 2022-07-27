@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset(mix('customer-resources/sass/base/page-headerfooter.css')) }}">
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
            <a href="/bookingform" style="color:white;padding:25px; width:50%" class="client-booking">Book Now</a>
        </div>
        {{-- @dd($client_bookings->bookings[0]) --}}
        <div class="container">
            <h3>Your Appointments</h3>
            {{-- {{$client_bookings}} --}}
            @foreach ($client_bookings->bookings as $bookings)
                <div style="width:100%; border:1px solid black; max-height:50% margin:5px;">

                    @foreach ($bookings as $item)
                        {{ $item }}

                        {{-- <h4 style="display: inline-block">Services:</h4> <span style="display: block">{{$item->serviceNames}}</span>
              <h4 style="display: inline-block">Date:</h4> <span style="display: block">{{$item->bookingDateTime}}</span>
              <h4 style="display: inline-block">Peer:</h4> <span style="display: block">{{$item->employee}}</span> --}}
                    @endforeach
                </div>
            @endforeach



        </div>
        <footer-component>
        </footer-component>
    </div>
@endsection
