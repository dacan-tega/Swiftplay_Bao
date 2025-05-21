@extends('layouts.web')

@section('title', $game->name . ' - Casino Online | Slot Games and Football Betting'')

@section('seo')
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="description" content="{{ $game->description }}">
    <meta name="keywords" content="{{ trans('vgames_play.Sports') }}">

    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $game->name }}" />
    <meta property="og:description" content="{{ trans('vgamesindex.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('vgames_play.the_best_online') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />

    <meta property="og:site_name" content="{{ $game->name . ' {{ trans('vgames_play.title') }} }}" />
    <meta property="og:image" content="{{ asset('/storage/' . $game->cover) }}" />
    <meta property="og:image:secure_url" content="{{ asset('/storage/' . $game->cover) }}" />
    <meta property="og:image:width" content="1024" />
    <meta property="og:image:height" content="571" />

    <meta name="twitter:title" content="{{ $game->name }}">
    <meta name="twitter:description" content="{{ $game->description }}">
    <meta name="twitter:image" content="{{ asset('/storage/' . $game->cover) }}"> <!-- {{ trans('vgames_play.Replace') }}  -->
    <meta name="twitter:url" content="{{ url('/') }}"> <!-- {{ trans('vgames_play.Replace_link') }} -->
@endsection

@push('styles')

@endpush

@section('content')
    <div class="playgame">
        <div class="playgame-body">
            <iframe src="{{ $gameUrl }}/index.html?token={{ $token }}" class="game-full"></iframe>
        </div>
        <div class="action-buttons" style="position: absolute;top: 10px;left: 10px;">
            <a href="{{ url('/') }}" class="w-button btn-small">
                <i class="fa-regular fa-arrow-left mr-3"></i> {{ trans('vgames_play.close') }}
            </a>
        </div>
{{--        <div class="playgame-footer">--}}
{{--            <div class="playgame-footer-buttons">--}}
{{--                <a href="{{ url('/') }}" class="w-button btn-small">--}}
{{--                    <i class="fa-regular fa-arrow-left mr-3"></i> {{ trans('vgames_play.close') }}--}}
{{--                </a>--}}
{{--                <a data-izimodal-open="#deposit-modal" data-izimodal-zindex="20000" data-izimodal-preventclose="" href="" class="w-button btn-small btn-color-1 text-black">--}}
{{--                    <i class="fa-solid fa-plus mr-3"></i> {{ trans('vgames_play.Deposit') }}--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    @include('includes.deposit')
@endsection

@push('scripts')
    <script>

    </script>
@endpush
