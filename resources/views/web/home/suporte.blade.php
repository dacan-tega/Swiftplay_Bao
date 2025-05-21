@extends('layouts.web')

@section('title', 'Support- Casino Online | Slot Games and Football Betting')

@section('seo')
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="description" content="{{ trans('home_suporte.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('home_suporte.the_best_online') }}">
    <meta name="keywords" content="{{ trans('home_suporte.Sports') }}">

    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ trans('home_suporte.Support') }} - {{ trans('home_suporte.Betting') }} | {{ trans('home_suporte.Slot') }}" />
    <meta property="og:description" content="{{ trans('home_suporte.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('home_suporte.the_best_online') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ trans('home_suporte.Support') }} - {{ trans('home_suporte.Betting') }} | {{ trans('home_suporte.Slot') }}" />
    <meta property="og:image" content="{{ asset('/assets/images/banner-1.png') }}" />
    <meta property="og:image:secure_url" content="{{ asset('/assets/images/banner-1.png') }}" />
    <meta property="og:image:width" content="1024" />
    <meta property="og:image:height" content="571" />

    <meta name="twitter:title" content="{{ trans('home_suporte.Support') }} - {{ trans('home_suporte.Betting') }} | {{ trans('home_suporte.Slot') }}">
    <meta name="twitter:description" content="{{ trans('home_suporte.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('home_suporte.the_best_online') }}">
    <meta name="twitter:image" content="{{ asset('/assets/images/banner-1.png') }}"> <!-- {{ trans('home_suporte.Replace') }} -->
    <meta name="twitter:url" content="{{ url('/') }}"> <!-- {{ trans('home_suporte.Replace_link') }} -->
@endsection

@push('styles')

@endpush

@section('content')
    <div class="container-fluid">
        @include('includes.navbar_top')
        @include('includes.navbar_left')

        <div class="page__content">

        </div>
    </div>
@endsection

@push('styles')

@endpush
