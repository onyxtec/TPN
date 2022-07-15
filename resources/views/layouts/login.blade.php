@extends('layouts/fullLayoutMaster')
@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection
@extends('layouts.app')
@section('content')
<login-component>

</login-component>
@endsection

<style>
    .app-content {
        display: none;
    }
    </style>