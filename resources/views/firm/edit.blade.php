@extends('layouts.app')

@section('title')
    {{ __('Firmalar') }}
@endsection

@section('content')
    <div class="ui segments">
        <div class="ui center aligned segment">
            {{ __('Firmalar') }}
        </div>
        <div class="ui segment">
            <form id="update-form" action="{{ route('firms.update', $firm->id) }}" method="POST" class="ui form">
                @csrf
                @method('PUT')
                <div class="two fields">
                    <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Firma Adı') }}</label>
                        <input type="text" name="name" placeholder="Firma Adı" autocomplete="off" value="{{ $firm->name }}">
                        @if ($errors->has('name'))
                            <div class="ui negative message">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('E-mail Adı') }}</label>
                        <input type="text" name="email" placeholder="E-mail" autocomplete="off" value="{{ $firm->email }}">
                        @if ($errors->has('email'))
                            <div class="ui negative message">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="two fields">
                    <div class="field {{ $errors->has('fax') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Faks') }}</label>
                        <input type="text" name="fax" placeholder="Faks" autocomplete="off" value="{{ $firm->fax }}">
                        @if ($errors->has('fax'))
                            <div class="ui negative message">
                                {{ $errors->first('fax') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('phone') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Telefon') }}</label>
                        <input type="text" name="phone" placeholder="Telefon" autocomplete="off" value="{{ $firm->phone }}">
                        @if ($errors->has('phone'))
                            <div class="ui negative message">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="two fields">
                    <div class="field {{ $errors->has('website') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Website') }}</label>
                        <input type="text" name="website" placeholder="Website" autocomplete="off" value="{{ $firm->website }}">
                        @if ($errors->has('website'))
                            <div class="ui negative message">
                                {{ $errors->first('website') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('division') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Klasman') }}</label>
                        <select class="ui dropdown" name="division">
                            <option value="1" @if($firm->division === 1) selected @endif>A</option>
                            <option value="2" @if($firm->division === 2) selected @endif>B</option>
                            <option value="3" @if($firm->division === 3) selected @endif>C</option>
                            <option value="4" @if($firm->division === 4) selected @endif>D</option>
                        </select>
                        @if ($errors->has('division'))
                            <div class="ui negative message">
                                {{ $errors->first('division') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="ui right aligned segment">
            <a href="{{ route('firms.index') }}" class="ui basic button">{{ __('Geri Dön') }}</a>
            <button onclick="event.preventDefault();document.getElementById('update-form').submit();" class="ui positive basic button" type="submit">
                Kaydet
            </button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('select.dropdown').dropdown();
    </script>
@endsection