@extends('layouts.app')

@section('title')
    {{ __('Ayarlar') }}
@endsection

@section('content')
    <div class="ui segments">
        <div class="ui center aligned segment">
            {{ __('Ayarlar') }}
        </div>
        <div class="ui center aligned segment">
            @include('_includes.menu.setting')
        </div>
        <div class="ui segment">
            <form id="update-form" action="{{ route('schedule-type.update', $schedule->id) }}" method="POST" class="ui form">
                @method('PUT')
                @csrf
                <div class="two fields">
                    <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Sector Adı') }}</label>
                        <input type="text" name="name" value="{{ $schedule->name }}" autocomplete="off">
                        @if ($errors->has('name'))
                            <div class="ui negative message">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="ui right aligned segment">
            <a href="{{ route('schedule-type.index') }}" class="ui basic button">{{ __('Geri Dön') }}</a>
            <button onclick="event.preventDefault();document.getElementById('update-form').submit();" class="ui positive basic button" type="submit">
                Kaydet
            </button>
        </div>
    </div>
@endsection
