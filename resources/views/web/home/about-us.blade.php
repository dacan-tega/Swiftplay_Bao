@extends('layouts.web')

@section('title', 'About Us - Casino Online | Slot Games and Football Betting')

@section('seo')
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="description" content="{{ trans('homea_bout.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('homea_bout.the_best_online') }}">
    <meta name="keywords" content="{{ trans('homea_bout.Sports') }}">

    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ trans('homea_bout.About') }} - {{ trans('homea_bout.Betting') }} | {{ trans('homea_bout.Slot') }}" />
    <meta property="og:description" content="{{ trans('homea_bout.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('homea_bout.the_best_online') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ trans('homea_bout.About') }} - {{ trans('homea_bout.Betting') }} | {{ trans('homea_bout.Slot') }}" />
    <meta property="og:image" content="{{ asset('/assets/images/banner-1.png') }}" />
    <meta property="og:image:secure_url" content="{{ asset('/assets/images/banner-1.png') }}" />
    <meta property="og:image:width" content="1024" />
    <meta property="og:image:height" content="571" />

    <meta name="twitter:title" content="{{ trans('homea_bout.About') }} - {{ trans('homea_bout.Betting') }} | {{ trans('homea_bout.Slot') }}">
    <meta name="twitter:description" content="{{ trans('homea_bout.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('homea_bout.the_best_online') }}">
    <meta name="twitter:image" content="{{ asset('/assets/images/banner-1.png') }}"> <!-- {{ trans('homea_bout.Replace') }} -->
    <meta name="twitter:url" content="{{ url('/') }}"> <!-- {{ trans('homea_bout.Replace_link') }} -->
@endsection


@push('styles')

@endpush

@section('content')
    <div class="container-fluid">
        @include('includes.navbar_top')
        @include('includes.navbar_left')

        <div class="page__content">
            <br>

            <div class="about-us-description">
                <div class="about-us-img">
                    <img src="{{ asset('/assets/images/sobre-nos.png') }}" alt="" class="img-fluid">
                </div>
                <p>
                    {{ trans('homea_bout.welcome_to') }} <strong>{{ config('setting')['software_name'] }}</strong> {{ trans('homea_bout.1') }}
                </p>
                <p>
                    {{ trans('homea_bout.2') }}
                </p>
                <p>
                    {{ trans('homea_bout.3') }} <strong>{{ config('setting')['software_name'] }}</strong> {{ trans('homea_bout.4') }}
                </p>
                <p>
                    {{ trans('homea_bout.5') }} <strong>{{ config('setting')['software_name'] }}</strong> {{ trans('homea_bout.6') }}
                </p>

                <p>
                    {{ trans('homea_bout.7') }}  <strong>{{ config('setting')['software_name'] }}</strong> {{ trans('homea_bout.8') }} 
                </p>
            </div>
        </div>
    </div>
@endsection

@push('styles')

@endpush
