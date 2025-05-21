@extends('layouts.web')

@push('styles')

@endpush
<link href="/assets/css/style_index.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">
        @include('includes.navbar_top')
        @include('includes.navbar_left')

        <div class="page__content">
        <div class="md:w-4/6 2xl:w-4/6 mx-auto p-4">
            <div class="row">
                <div class="col-lg-6">
                    <h2>{{trans('game_list.All_the_games')}}</h2>
                </div>
                <div class="col-lg-6">

                    <form action="{{ route('web.game.list') }}" class="w-full" method="GET">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" name="searchTerm" class="form-control" placeholder="{{trans('game_list.Enter_the_name')}}" value="{{ $search }}">

                            <span class="input-group-text" style="padding-right: 5px;">
                                <button type="submit" class="px-4">
                                {{trans('game_list.Look_for')}}
                                </button>
                            </span>
                        </div>
                        @foreach(request()->except(['searchTerm', 'page']) as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                    </form>

                </div>
            </div>

            <div class="row">
                @if($tab == 'fivers')
                    <div class="d-steam-cards js-steamCards">
                        @foreach($games as $game)
                            <a href="{{ route('web.fivers.show', ['code' => $game->game_code]) }}" class="d-steam-card-wrapper">
                                <div class="d-steam-card js-steamCard" style="background-image: url('storage/{{ $game->banner }}')"></div>
                            </a>
                        @endforeach
                    </div>
                @endif

                @if($tab == 'exclusives')
                    <div class="d-steam-cards js-steamCards">
                        @foreach($games as $gamee)
                            <a href="{{ route('web.vgames.show', ['game' => $gamee->uuid]) }}" class="d-steam-card-wrapper">
                                <div class="d-steam-card js-steamCard" style="background-image: url('storage/{{ $gamee->cover }}')"></div>
                            </a>
                        @endforeach
                    </div>
                @endif

                @if($tab == 'all')
                    @foreach($games as $game)
                            <a href="{{ route('web.fivers.show', ['code' => $game->uuid]) }}" target="_blank" class="d-steam-card-wrapper">
                                <img src="{{ asset('storage/'.$game->image) }}" alt="{{ $game->name }}" class="img-fluid rounded-3">
                            </a>
                    @endforeach
                @endif
                
                @foreach($categories as $category)
            @if($tab == $category->name)
                @foreach($games->filter(function ($game) use ($category) {
                    // Check if the category is not null before accessing its name
                    return $game->category && $game->category->name === $category->name;
                }) as $game)
                     <a href="{{ route('web.fivers.show', ['code' => $game->uuid]) }}" target="_blank" class="d-steam-card-wrapper">
                        <img src="{{ asset('storage/'.$game->image) }}" alt="{{ $game->name }}" class="img-fluid rounded-3">
                     </a>
                @endforeach
            @endif
        @endforeach


            
            </div>

            <br><br>
            <div class="mt-6">
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    {{ $games->links() }}
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
