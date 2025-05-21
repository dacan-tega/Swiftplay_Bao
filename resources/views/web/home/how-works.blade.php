@extends('layouts.web')

@section('title', 'How it works? - Casino Online | Slot Games and Football Betting')

@section('seo')
<link rel="canonical" href="{{ url()->current() }}" />
    <meta name="description" content="{{ trans('home_how.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('home_how.the_best_online') }}">
    <meta name="keywords" content="{{ trans('home_how.Sports') }}">

    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ trans('home_how.How') }} - {{ trans('home_how.Betting') }} | {{ trans('home_how.Slot') }}" />
    <meta property="og:description" content="{{ trans('home_how.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('home_how.the_best_online') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ trans('home_how.How') }} - {{ trans('home_how.Betting') }} | {{ trans('home_how.Slot') }}" />
    <meta property="og:image" content="{{ asset('/assets/images/banner-1.png') }}" />
    <meta property="og:image:secure_url" content="{{ asset('/assets/images/banner-1.png') }}" />
    <meta property="og:image:width" content="1024" />
    <meta property="og:image:height" content="571" />

    <meta name="twitter:title" content="{{ trans('home_how.How') }} - {{ trans('home_how.Betting') }} | {{ trans('home_how.Slot') }}">
    <meta name="twitter:description" content="{{ trans('home_how.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('home_how.the_best_online') }}">
    <meta name="twitter:image" content="{{ asset('/assets/images/banner-1.png') }}"> <!-- {{ trans('home_how.Replace') }} -->
    <meta name="twitter:url" content="{{ url('/') }}"> <!-- {{ trans('home_how.Replace_link') }} -->
@endsection

@push('styles')

@endpush

@section('content')
    <div class="container-fluid">
        @include('includes.navbar_top')
        @include('includes.navbar_left')

        <div class="page__content">
            <br>

            <div class="how-works">
                <h2 class="mt-5">{{ trans('home_how.Common') }}  - {{ config('setting')['software_name'] }}</h2>

                <div class="mt-4">
                    <h4>Check-in</h4>
                    <p><strong>{{ trans('home_how.How_can') }}</strong></p>
                    <p>{{ trans('home_how.To_register') }}</p>

                    <!-- ... {{ trans('home_how.other') }} ... -->

                    <h4>{{ trans('home_how.Bets') }}</h4>
                    <p><strong>{{ trans('home_how.How_do') }}</strong></p>
                    <p>{{ trans('home_how.First') }}</p>

                    <!-- ... {{ trans('home_how.other') }}... -->

                    <h4>{{ trans('home_how.Bets1') }}</h4>
                    <p><strong>{{ trans('home_how.create') }}</strong></p>
                    <p>{{ trans('home_how.Play') }} <strong>{{ config('setting')['software_name'] }}</strong> {{ trans('home_how.requires') }}</p>

                    <!-- ... {{ trans('home_how.other') }} ... -->
                </div>
            </div>

        </div>
    </div>
@endsection

@push('styles')

@endpush
