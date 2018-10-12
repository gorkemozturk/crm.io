@extends('layouts.app')

@section('title')
    {{ __('Takvim') }}
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/jquery-ui-1.10.0.custom.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/jquery.ui.timepicker.css') }}" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <div class="ui segments">
        <div class="ui center aligned segment">
            {{ __('Planı Düzenle') }}
        </div>
        <div class="ui segment">
            <form id="update-form" action="{{ route('schedule.update', $schedule->id) }}" method="POST" class="ui form">
                @csrf
                @method('PUT')
                <div class="three fields">
                    <div class="field {{ $errors->has('meeting_at') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Tarih') }}</label>
                        <input id="datepicker" type="text" name="meeting_at" autocomplete="off" value="{{ $schedule->meeting_at }}">
                        @if ($errors->has('meeting_at'))
                            <div class="ui negative message">
                                {{ $errors->first('meeting_at') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('started_at') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Başlangıç Zamanı') }}</label>
                        <input class="timepicker" type="text" name="started_at" autocomplete="off" value="{{ $schedule->started_at }}">
                        @if ($errors->has('started_at'))
                            <div class="ui negative message">
                                {{ $errors->first('started_at') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('finished_at') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Bitiş Zamanı') }}</label>
                        <input class="timepicker" type="text" name="finished_at" autocomplete="off" value="{{ $schedule->finished_at }}">
                        @if ($errors->has('finished_at'))
                            <div class="ui negative message">
                                {{ $errors->first('finished_at') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="three fields">
                    <div class="field {{ $errors->has('schedule_type_id') ? 'error' : '' }}">
                        <label>{{ __('Plan Tipi') }}</label>
                        <select name="schedule_type_id" class="ui dropdown">
                            @foreach($scheduleTypes as $type)
                                <option value="">{{ __('Lütfen Seçiniz') }}</option>
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('schedule_type_id'))
                            <div class="ui negative message">
                                {{ $errors->first('schedule_type_id') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="ui right aligned segment">
            <a href="{{ route('schedule.index') }}" class="ui basic button">{{ __('Geri Dön') }}</a>
            <button onclick="event.preventDefault();document.getElementById('update-form').submit();" class="ui positive basic button" type="submit">
                Kaydet
            </button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.dropdown').dropdown();
    </script>
    <script type="text/javascript" src="{{ asset('js/jquery-1.9.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.ui.timepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.ui.core.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.ui.position.min.js') }}"></script>
    <script>
        $('.timepicker').timepicker();
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
        });
    </script>
@endsection