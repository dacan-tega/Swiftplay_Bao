<x-filament-panels::page>
    <iframe class="" src="{{ route('luckytank.admin.setting') }}" frameborder="0" width="100%" id="myIframe" onload="iframeLoaded()"></iframe>
</x-filament-panels::page>

<script>
    function iResize() {
        var iFrameID = document.getElementById('myIframe');
        if (iFrameID) {
            iFrameID.height = "";
            iFrameID.height = (iFrameID.contentWindow.document.body.scrollHeight + 30) + "px";
        }
        console.log(iFrameID.height);
    }

    function iframeLoaded() {
        setTimeout(iResize, 500);
    }
    window.addEventListener('resize', function(event) {
        iframeLoaded();
    });
    if (window.addEventListener) {
        window.addEventListener("message", onMessage, false);
    } else if (window.attachEvent) {
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