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
        <div class="w-100" style="border: 1px solid black">


        </div>


        <footer-component>
        </footer-component>
    </div>
@endsection
