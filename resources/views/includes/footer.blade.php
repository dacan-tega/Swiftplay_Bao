<div class="footer">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="footer-info">
                <div>
                    <a href="https://swiftplay.slotgen.com/">  <img src="/assets/images/images-fix/license-1 copy.png" alt="" class="footer-logo" width=""></a>
                  
                    <img src="{{ asset('/assets/images/+18.png') }}" alt="" width="38">
                </div>
                <p class="{{ url('/sobre-nos') }}">
                      <strong>{{ config('setting')['software_name'] }}</strong> is a studio that produces online video slot games with RTP (return to player). <br>
                    Every game on this site is either a remake or a new one.<br>
                     We do not embed any links from the original games. <br>
                    Try it out; no registration is required.<br>
                    Every game on this site is for demo purposes only.<br>
                </p>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">

            <div class="footer-right">

                <div class="footer-social">
                    <div class="row">
                        @if(!empty(config('setting')['instagram']))
                            <div class="col">
                                <a href="{{ config('setting')['instagram'] }}" target="_blank">
                                    <img src="{{ asset('/assets/images/social/instagram.png') }}" alt="">
                                </a>
                            </div>
                        @endif

                        @if(!empty(config('setting')['discord']))
                            <div class="col">
                                <a href="{{ config('setting')['discord'] }}">
                                    <img src="{{ asset('/assets/images/social/discord.png') }}" target="_blank" alt="">
                                </a>
                            </div>
                        @endif

                        @if(!empty(config('setting')['telegram']))
                            <div class="col">
                                <a href="{{ config('setting')['telegram'] }}">
                                    <img src="{{ asset('/assets/images/social/telegram.png') }}" target="_blank" alt="">
                                </a>
                            </div>
                        @endif

                        @if(!empty(config('setting')['twitter']))
                            <div class="col">
                                <a href="{{ config('setting')['twitter'] }}">
                                    <img src="{{ asset('/assets/images/social/twitter.png') }}" target="_blank" alt="">
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <p class="mb-0">©{{ date('Y') }} {{ env('APP_NAME') }} {{trans('includes.ALL_RIGHTS_RESERVED')}}</p>
                    <p><small>{{trans('includes.Developed')}} by: <a href="https://wa.me/+84848050522" class="text-success">Slotgen</a></small></p>
                </div>

            </div>
        </div>
    </div>

</div>
