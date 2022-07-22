@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/partials/page-headerfooter.css')) }}">
    <div>
        {{-- @if (Auth::guard('client')->user())
            <header-component :user={{ Auth::guard('client')->user()->id }}>
            </header-component>
        @else
            <header-component>
            </header-component>
        @endif --}}
        <div>
        </div>
        {{-- <footer-component>
        </footer-component> --}}
    </div>
@endsection
<script type="text/javascript" src="https://a.flexbooker.com/js/lib/iframeResizer.min.js"></script><iframe id="flexbookeriframe" src="https://a.flexbooker.com/reserve/peernetwork"
    style="width:100%;min-height:450px"></iframe>
<script>
    iFrameResize({
        log: false
    }, '#flexbookeriframe')
</script>
