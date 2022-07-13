@extends('layouts/fullLayoutMaster')
@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection
@extends('layouts.app')
@section('content')
<register-component>

</register-component>
@endsection