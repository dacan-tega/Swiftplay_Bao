@extends('layouts.web')

@section('title', 'Games - Casino Online | Slot Games and Football Betting')

@section('seo')
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="description" content="{{ trans('vgames_index.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('vgames_index.the_best_online') }}">
    <meta name="keywords" content="{{ trans('vgames_index.Sports') }}">

    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ trans('vgames_index.title') }}" />
    <meta property="og:description" content="{{ trans('vgames_index.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('vgames_index.the_best_online') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ trans('vgames_index.title') }}" />
    <meta property="og:image" content="{{ asset('/assets/images/banner-1.png') }}" />
    <meta property="og:image:secure_url" content="{{ asset('/assets/images/banner-1.png') }}" />
    <meta property="og:image:width" content="1024" />
    <meta property="og:image:height" content="571" />

    <meta name="twitter:title" content="{{ trans('vgames_index.title') }}">
    <meta name="twitter:description" content="{{ trans('vgames_index.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('vgames_index.the_best_online') }}">
    <meta name="twitter:image" content="{{ asset('/assets/images/banner-1.png') }}"> <!-- {{ trans('vgames_index.Replace') }} -->
    <meta name="twitter:url" content="{{ url('/') }}"> <!-- {{ trans('vgames_index.Replace_link') }} -->
@endsection

@push('styles')

@endpush

@section('content')
    <div class="container">
        @include('includes.navbar_left')

        <div class="page__content">
            @include('includes.navbar_top')

        </div>
    </div>
@endsection

@push('scripts')

@endpush
