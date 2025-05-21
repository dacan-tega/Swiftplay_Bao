@extends('layouts.web')

@section('title', $game->game_name . ' - Casino Online | Slot Games and Football Betting')

@section('seo')
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="description" content="{{ $game->game_name }}">
    <meta name="keywords" content="{{ trans('fivers.Sports') }}">

    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $game->game_name }}" />
    <meta property="og:description" content="{{ trans('fivers.welcome_to') }}  {{ config('setting')['software_name'] }} - {{ trans('fivers.the_best_online') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />

    <meta property="og:site_name" content="{{ $game->game_name . ' - Casino Online | {{ trans('fivers.Slot') }} ' }}" />
    <meta property="og:image" content="{{ asset('/storage/' . $game->banner) }}" />
    <meta property="og:image:secure_url" content="{{ asset('/storage/' . $game->banner) }}" />
    <meta property="og:image:width" content="1024" />
    <meta property="og:image:height" content="571" />

    <meta name="twitter:title" content="{{ $game->game_name }}">
    <meta name="twitter:description" content="{{ $game->game_name }}">
    <meta name="twitter:image" content="{{ asset('/storage/' . $game->banner) }}"> <!-- {{ trans('fivers.Replace') }} -->
    <meta name="twitter:url" content="{{ url('/') }}"> <!-- {{ trans('fivers.Replace_link') }} -->
@endsection

@push('styles')

@endpush

@section('content')
    <div class="playgame">
        <div class="playgame-body">
            <iframe src="{{ $gameUrl }}" class="game-full"></iframe>
        </div>
        <div class="action-buttons" style="position: absolute;top: 10px;left: 10px;">
            <a href="{{ url('/') }}" class="w-button btn-small">
                <i class="fa-regular fa-arrow-left mr-3"></i> {{ trans('fivers.To_close') }}
            </a>
        </div>
    </div>

    @include('includes.deposit')
@endsection

@push('scripts')
    <script>

    </script>
@endpush
