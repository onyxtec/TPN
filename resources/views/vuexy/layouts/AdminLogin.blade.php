@extends('vuexy/layouts/fullLayoutMaster')
@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection
@extends('vuexy.layouts.app')
@section('content')
<admin-login-component>
</admin-login-component>
@endsection
<style>
    .app-content {
        display: none;
    }
    </style>