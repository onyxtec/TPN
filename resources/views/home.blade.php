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
    <footer-component>
    </footer-component>
</div>

@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" integrity="sha512-24XP4a9KVoIinPFUbcnjIjAjtS59PUoxQj3GNVpWc86bCqPuy3YxAcxJrxFCxXe4GHtAumCbO2Ze2bddtuxaRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){
   feather.replace();  
});
</script>
@endpush