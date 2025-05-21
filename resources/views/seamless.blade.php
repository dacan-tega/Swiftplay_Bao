@extends('layouts.app')

@section('css')
    @include('_css')
@endsection

@section('content')
    <div class="content">
        <iframe src="{{$frameUrl}}" frameborder="0" style="overflow:hidden;width:100%" width="100%" id="myIframe" onload="iframeLoaded()"></iframe>
    </div>
@endsection

@push('scripts')
<script>
        function iResize() {
            var iFrameID = document.getElementById('myIframe');
                if(iFrameID) {
                        iFrameID.height = "";
                        iFrameID.height = (iFrameID.contentWindow.document.body.scrollHeight + 30) + "px";
                }
        }
        function iframeLoaded() {
            setTimeout(iResize, 1000);
        }
        window.addEventListener('resize', function(event) {
            iframeLoaded();
        });
        if (window.addEventListener) {
            window.addEventListener("message", onMessage, false);        
        } 
        else if (window.attachEvent) {
            window.attachEvent("onmessage", onMessage, false);
        }

        function onMessage(event) {
            // Check sender origin to be trusted
            // if (event.origin !== "http://example.com") return;
            var data = event.data;
            if (typeof(window[data.func]) == "function") {
                window[data.func].call(null, data.message);
            }
        }
    </script> 
@endpush
