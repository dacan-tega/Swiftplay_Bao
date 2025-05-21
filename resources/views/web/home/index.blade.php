@extends('layouts.web')

@section('title', config('setting')['software_name'].' - Casino Online | Welcome to Website!')
@section('seo')
<link rel="canonical" href="{{ url()->current() }}" />
<meta name="description"
    content="{{ trans('home_index.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('home_index.the_best_online') }}">
<meta name="keywords" content="{{ config('setting')['software_name'] }}, {{ trans('home_index.online') }}">

<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="website" />
<meta property="og:title"
    content="{{ config('setting')['software_name'] }} - {{ trans('home_index.Betting') }} | {{ trans('home_index.Slot') }} " />
<meta property="og:description"
    content="{{ trans('home_index.welcome_to') }} {{ config('setting')['software_name'] }} - {{ trans('home_index.the_best_online') }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name"
    content="{{ config('setting')['software_name'] }} - {{ trans('home_index.Betting') }} | {{ trans('home_index.Slot') }}" />
<meta property="og:image" content="{{ asset('/assets/images/banner-1.png') }}" />
<meta property="og:image:secure_url" content="{{ asset('/assets/images/banner-1.png') }}" />
<meta property="og:image:width" content="1024" />
<meta property="og:image:height" content="571" />

<meta name="twitter:title"
    content="{{ config('setting')['software_name'] }} - {{ trans('home_index.Betting') }} | {{ trans('home_index.Slot') }}">
<meta name="twitter:description"
    content="{{ trans('home_index.welcome_to') }}  {{ config('setting')['software_name'] }} - {{ trans('home_index.the_best_online') }}">
<meta name="twitter:image" content="{{ asset('/assets/images/banner-1.png') }}">
<!-- {{ trans('home_index.Replace') }} -->
<meta name="twitter:url" content="{{ url('/') }}"> <!-- {{ trans('home_index.Replace_link') }}  -->
<!-- Splide CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

<!-- Splide JS -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

@endsection

@push('styles')
<!--<link rel="stylesheet" href="{{ asset('assets/css/splide-core.min.css') }}">-->
<!--<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">-->
<!-- <link href="{{asset('assets/css/style_index.css')}}" rel="stylesheet"  type="text/css"> -->
@endpush

@section('content')
<div class="container-fluid">
    <div class="">
        @include('includes.navbar_top')
        @include('includes.navbar_left')
<div class="page__content2">
       <div class="md:w-4/6 2xl:w-4/6 mx-auto t-4">
                <section id="image-carousel" class="splide" aria-label="">
                    <div class="splide__track">
                        <!-- <div class="splide-banner">
                        {{ trans('home_index.Get_10_free_spins') }} <span style="margin-left: 10px"><i class="fa-solid fa-fire"></i></span>
                    </div> -->
                        <ul class="splide__list">
                            @foreach(\App\Models\Banner::where('type', 'carousel')->get() as $banner)
                            <li class="splide__slide">
                                <a href="{{ $banner->link }}" target="_blank">
                                    <img src="{{ asset('storage/'.$banner->image) }}" alt="">
                                </a>
                            </li>
                            @endforeach
                        </ul>


                    </div>
                    <div class="splide__arrows">
                        <button class="splide__arrow splide__arrow--prev">
                            &lt;
                            <!-- Icon or text for previous -->
                        </button>
                        <button class="splide__arrow splide__arrow--next">
                            &gt;
                            <!-- Icon or text for next -->
                        </button>
                    </div>
                </section>
                <section class="carousel" dir="ltr" aria-label="Gallery" tabindex="0">
                    <div class="carousel__viewport">
                        <ol class="carousel__track"
                            style="transform: translateX(0px); width: 100%; transition: all 0ms ease 0s;">
                            @foreach(\App\Models\Banner::where('type', 'carouselmini')->get() as $banner)
                            <li class="carousel__slide carousel__slide--visible carousel__slide--prev"
                                aria-hidden="false" style="width: 33.3333%;">
                                <div class="carousel__item min-h-[60px] md:min-h-[150px] rounded w-full mr-4">  
                                                                    
                                    <div class="w-full h-full rounded">
                                        @if($banner->id == 4)
                                              <img  data-game="aviator" data-lang="en" src="{{ asset('storage/'.$banner->image) }}" alt=""
                                            class="h-full w-full rounded  launch ">
                                        
                                        
                                        @else
                                    <img src="{{ asset('storage/'.$banner->image) }}" alt=""
                                            class="h-full w-full rounded">
                                            @endif                                
                                    </div>                                      
                                </div>
                            </li>
                            @endforeach                       
                    </div>
                </section>
            </div>
</div>
        <div class="page__content" style="">
        <div class="md:w-4/6 2xl:w-4/6 mx-auto ">     
           <script>
            document.addEventListener('DOMContentLoaded', function() {
                new Splide('#image-carousel', {
                    type: 'loop',
                    perPage: 1,
                    perMove: 1,
                    arrows: true, // Enable the next and previous arrows
                    pagination: false, // Optional: Disable pagination if not needed
                }).mount();
            });
            </script>
            <!-- Search -->
          <form id="searchForm" action="{{ url('/') }}" method="GET">
    <div class="input-group input-search-group">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
               placeholder="{{ trans('home_index.Search') }}" aria-label="{{ trans('home_index.To_look') }}"
               aria-describedby="button-search">
        <button class="input-group-text" id="button-search" type="submit">
            <i class="fa-duotone fa-magnifying-glass"></i>
        </button>
    </div>
</form>
        
            <!-- {{ trans('home_index.Platform') }} -->
            @if(count($gamesExclusives) > 0)
            <div class="mt-5">
                @include('includes.title', ['link' => url('/games?tab=exclusives'), 'title' => 'Home Games', 'icon' =>
                'fa-regular fa-gamepad-modern'])
            </div>

            <div class="row mt-2">
                @foreach(\App\Models\Banner::where('type', 'home')->get() as $banner)
                <div class="col-lg-4 mb-3">
                    <a href="{{ $banner->link }}"><img src="{{ asset('storage/'.$banner->image) }}" alt=""
                            class="img-fluid rounded-4 w-full "></a>
                </div>
                @endforeach
            </div>
            <div class="d-steam-cards js-steamCards">
                @foreach($gamesExclusives as $gamee)
                <a href="{{ route('web.vgames.show', ['game' => $gamee->uuid]) }}" onclick="{{ $game->active == 0 ? 'return false;' : '' }}" class="d-steam-card-wrapper {{ $game->active == 0 ? 'active' : '' }}">
                    <div class="d-steam-card js-steamCard" style="background-image: url('storage/{{ $gamee->cover }}')">
                    </div>
                </a>
                @endforeach
            </div>
            @endif
            <br>
           
            @if(count($providers) > 0)
            @foreach($providers as $provider)
            @include('includes.title', ['link' => url('/games?provider='.$provider->code.'&tab=fivers'), 'title' =>
            $provider->name, 'icon' => 'fa-duotone fa-gamepad-modern'])
            <div class="row row-cols-3 row-cols-md-6 mt-3">
                @foreach($provider->games->where('status', 1) as $gameProvider)
                <div class="col mb-3">
                    <a href="{{ route('web.fivers.show', ['code' => $gameProvider->game_code]) }}" class="">
                        <img src="{{ asset('storage/'.$gameProvider->banner) }}" alt="{{ $gameProvider->game_name }}"
                            class="w-full rounded-3">
                    </a>
                </div>
                @endforeach
            </div>
            @endforeach
            @endif
            <!-- Slotegrator -->
            @if(count($games) > 0)
            @include('includes.title', ['link' => url('/games?tab=all'), 'title' => 'House Games', 'icon' => 'fa-duotone
            fa-gamepad-modern'])

            <div class="row mt-3">
            @foreach($games as $game)
                @if($game->name === 'Aviator')
                    <a href="" target="_blank" class="d-steam-card-wrapper   launch" data-game="aviator" data-lang="en">
                        <img src="{{ asset('storage/'.$game->image) }}" alt="{{ $game->title }}" class="img-fluid rounded-3">
                    </a>
                @elseif($game->name === 'Spaceman')
                    <a href="" target="_blank" class="d-steam-card-wrapper launch" data-game="spaceman" data-lang="en">
                        <img src="{{ asset('storage/'.$game->image) }}" alt="{{ $game->title }}" class="img-fluid rounded-3">
                    </a>
                @else
                    <a href="{{ route('web.fivers.show', ['code' => $game->uuid]) }}" onclick="{{ $game->active == 0 ? 'return false;' : '' }}" target="_blank" class="d-steam-card-wrapper {{ $game->active == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/'.$game->image) }}" alt="{{ $game->title }}" class="img-fluid rounded-3">
                    </a>
                @endif
            @endforeach

                
            </div>
            @endif
            
               @if(count($games) > 0)
            @foreach($categories as $category)
         
            @include('includes.title', ['link' => url('/games?tab=' . urlencode($category->name)),'title' => $category->name_content,'icon' => 'fa-duotone fa-gamepad-modern'])
            <div class="row mt-3">
            @foreach($games->where('category_id', $category->id) as $game)
            @if($game->name === 'Aviator')
            <a target="_blank" class="d-steam-card-wrapper launch" data-game="aviator" data-lang="en">
                <img src="{{ asset('storage/'.$game->image) }}" alt="{{ $game->title }}" class="img-fluid rounded-3">
            </a>
            @elseif($game->name === 'Spaceman')
                <a href="" target="_blank" class="d-steam-card-wrapper launch" data-game="spaceman"  data-lang="en">
                    <img src="{{ asset('storage/'.$game->image) }}" alt="{{ $game->title }}" class="img-fluid rounded-3">
                </a>
            @else
                <a href="{{ route('web.fivers.show', ['code' => $game->uuid]) }}" onclick="{{ $game->active == 0 ? 'return false;' : '' }}" target="_blank" class="d-steam-card-wrapper {{ $game->active == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/'.$game->image) }}" alt="{{ $game->title }}" class="img-fluid rounded-3">
                </a>
            @endif
            @endforeach
           
            </div>
         @endforeach
         @endif
            
             
            @if(count($games) > 0)
            @include('includes.title', ['link' => url('/games?tab=all'), 'title' => 'Other Games', 'icon' =>
            'fa-duotone fa-gamepad-modern'])

           <div class="row mt-3">
                @foreach($slotgen as $game)
                        @if($game->title == "Lucky Tank") 
                        <a href="{{route('web.'.$game->name.'.site.launch')}}" target="_blank" class="d-steam-card-wrapper">                        
                        @else 

                        <a href="{{route('web.'.$game->name.'.site.launch')}}" target="_blank" class="d-steam-card-wrapper">
                            
                            @endif
                            <img src="{{ $game->logo }}" alt="{{ $game->title }}" class="img-fluid rounded-3">
                        </a>
                @endforeach
            </div>
            @endif
            
                
            <div class="mt-5">
                @include('includes.title', ['link' => url('como-funciona'), 'title' => 'F.A.Q', 'icon' => 'fa-light
                fa-circle-info', 'labelLink' => 'know more'])
            </div>
            @include('web.home.sections.faq')
            @include('includes.footer')
        </div>
    </div>
</div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <a class="btn btn-info" href="#" id="playGame" target="_blank">Open Game</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        var searchInput = document.querySelector('input[name="search"]');
        if (!searchInput.value.trim()) {
            event.preventDefault();  
        }
    });
</script>
<script src="{{ asset('assets/js/splide.min.js') }}"></script>
 
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elemento = document.getElementById('splide-soccer');

    if (elemento) {
        new Splide('#splide-soccer', {
            type: 'loop',
            drag: 'free',
            focus: 'center',
            autoplay: 'play',
            perPage: 3,
            arrows: false,
            pagination: false,
            breakpoints: {
                640: {
                    perPage: 1,
                },
            },
            autoScroll: {
                speed: 1,
            },
        }).mount();
    }

    new Splide('#image-carousel', {
        arrows: false,
        pagination: false,
        type: 'loop',
        autoplay: 'play',
    }).mount();
});
</script>
<script>
    $(document).ready(function () {
        const apiUrl = 'https://toopdemo.slotgen.com/api';
        const gameUrl = 'https://toopdemo.slotgen.com';

        const showErrFunc = function (message) {
            alert(message);
            $('#err-msgs').text(message);
            $('#err').show();
        };

        // Khi click vào thẻ game
        $('.launch').click(function (event) {
            event.preventDefault();
            $('#err').hide();

            // Lấy thông tin game và ngôn ngữ từ dữ liệu của thẻ
            const game = $(this).data("game");
            const lang = $(this).data("lang");

            const loginApi = `${apiUrl}/users/launchGameSlotgen?lang=${lang}&game=${game}`;

            // Gọi API để lấy đường dẫn chơi game
            $.ajax({
                type: 'GET',
                url: loginApi,
                success: function (response) {
                    console.log("Response data: ", response); // Log dữ liệu phản hồi để kiểm tra
                    if (response.success) {
                        const playUrl = response.data.gamePath;

                        // Cập nhật link game vào nút trong modal
                        $('#playGame').attr('href', playUrl);

                        // Hiển thị modal
                        $('#myModal').modal('show');
                    } else {
                        showErrFunc(response.message);
                    }
                },
                contentType: "application/json",
                dataType: 'json',
                error: function (responseData, textStatus, errorThrown) {
                    const msg = JSON.parse(responseData.responseText);
                    showErrFunc(msg.message);
                }
            });
        });
    });
</script>
<style>
    .modal {
            text-align: center;
            align-content: space-around;
        }
.launch{
    cursor:pointer;
}
        @media screen and (min-width: 768px) { 
        .modal:before {
            display: inline-block;
            vertical-align: middle;
            content: " ";
            height: 100%;
        }
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }

.input-search-group {
            display: flex;
        }
        .input-group-text {
            cursor: pointer;
        }
        @media only screen and (max-width: 768px) {
    .d-steam-card-wrapper {
        flex-basis: 25%;
    }
}

@media only screen and (max-width: 1200px) {
    .d-steam-card-wrapper {
        flex-basis: 20%;
    }
}

.d-steam-card-wrapper {
    max-width: 300px;
    margin: 0;
    flex: 0 1 16.66%;
    padding: 0.6rem;
}

.img-fluid {
    max-width: 100%;
    height: auto;
}
img,
svg {
    vertical-align: middle;
}
/* .page__content{
    max-width:calc(100%);
    width: 100%;
  
} */
.page__content {
    max-width: calc(100% - 235px - 32px);
    width: 100%;
    margin-left: 270px; 
}
@media screen and (max-width: 960px) {
    .page__content {
        max-width: 100%;
        margin-left: 0;
        padding-right: 5px;
        padding-left:0px;
       
    }
}

.page__content2 {
    max-width: calc(100% - 235px - 32px);
    width: 100%;
    margin-left: 270px;
    padding-right:5px;
  
}

@media screen and (max-width: 960px) {
    .page__content2 {
        max-width: 100%;
        margin-left: 0;
        padding-right: 5px;
        padding-left:0px;
       
    }
}



.splide__list {
    backface-visibility: hidden;
    display: -ms-flexbox;
    display: flex;
    height: 100%;

    margin: 0 !important;
    padding: 0 !important;

}

.splide__slide2 img {
    width: 100%;
    height: auto;
    margin-bottom: 30px;
    object-fit: cover;
    border-radius: 15px;
}



@media (min-width: 768px) {
    .md\:w-4\/6 {
        width: 66.666667%;
    }
}

/*.p-4 {*/
/*    padding: 5px;*/
/*}*/

.mx-auto {
    margin-left: auto;
    margin-right: auto;
}

@media (min-width: 768px) {
    .md\:min-h-\[150px\] {
        min-height: 150px;
    }
}
.carousel {
position: relative;
text-align: center;
box-sizing: border-box;
touch-action: pan-y;
overscroll-behavior: none;
}
.carousel__viewport {
overflow: hidden;
}
.carousel * {
box-sizing: border-box;
}
.carousel__track {
display: flex;
padding: 0 !important;
position: relative;
}

.carousel * {
box-sizing: border-box;
}
ol, ul, menu {
list-style: none;
margin: 0;
padding: 0;
}
.carousel__slide {
scroll-snap-stop: auto;
flex-shrink: 0;
margin: 0;
position: relative;
display: flex;
justify-content: center;
align-items: center;
}
.carousel * {
box-sizing: border-box;
}
@media (min-width: 768px) {
.md\:min-h-\[150px\] {
min-height: 150px;
}
}

.w-full {
width: 100% !important;
}
.rounded {
border-radius: .25rem;
}
.w-full {
width: 100%;
}
.min-h-\[60px\] {
min-height: 60px;
}
.mr-4 {
margin-right: 1rem;
}
.carousel__pagination {
display: flex;
justify-content: center;
list-style: none;
line-height: 0;
margin: 10px 0 0;
}

.carousel * {
box-sizing: border-box;
}
.carousel__pagination {
position: absolute;
bottom: 15px;
left: 0;
right: 0;
}
@media only screen and (max-width: 768px) {
    .d-steam-card-wrapper {
        flex-basis: 25%;
    }
}
.inner-loop-elementos {
    position: relative;
    display: block;
    width: 100%;
    height: 231px;
    margin-bottom: 20px;
}
.inner-loop-elementos:hover{
    opacity: .8;
}
.inner-loop-elementos img{
    height: 231px;
    object-fit: cover;
    width: 100%;
}
@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
    .page__navbar {
        display: none;
    }

    .d-steam-card-wrapper {
        min-width: 170px;
    }
}
.t-4{
    margin-bottom: 17px;
}
</style>


@endpush