@extends('slotgen-spaceman::layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">
        Game Setting
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                @if($game == null)
                    {!! Form::open(['route' => 'spaceman.admin.setting-post', 'method' => 'post']) !!}
                    @csrf
                    <!-- Game Code Field -->
                    <h1 class="pull-right">
                        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('spaceman.admin.initialize-data') }}" id="btnSave">Initialize Data</a>
                    </h1>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['route' => 'spaceman.admin.setting-post', 'method' => 'post','enctype' => 'multipart/form-data','files' => true]) !!}
                @csrf
                <div class="form-group col-sm-12">
                    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary pull-right']) !!}

                </div>
                <div class="form-group col-sm-12">
                    <input type="file" id="gamefile" name="gamefile">
                </div>
                <!-- Game Code Field -->                
                <div class="form-group col-sm-12">
                    {!! Form::label('game_title', 'Title: ') !!}
                    {!! Form::text('game_title', $game->title, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Number Roll', 'Number Roll: ') !!}
                    {!! Form::text('number roll', $game->number_roll, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Time Roll', 'Time Roll: ') !!}
                    {!! Form::text('time roll', $game->time_roll, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Multily', 'Multily: ') !!}
                    {!! Form::text('multily', $game->multily, ['class' => 'form-control']) !!}
                </div>
                
                

                {!! Form::close() !!}
                    @endif
            </div>
        </div>
    </div>
    <label>API URL:</label>
    <p>{{ $api_url }}</p>
</div>
</div>
</div>
@endsection