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
            <form id="store-form" action="{{ route('firms.store') }}" method="POST" class="ui form">
                @csrf
                <div class="two fields">
                    <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Firma Adı') }}</label>
                        <input type="text" name="name" placeholder="Firma Adı" autocomplete="off" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <div class="ui negative message">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('E-mail Adı') }}</label>
                        <input type="text" name="email" placeholder="E-mail" autocomplete="off" value="{{ old('email') }}">
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
                        <input type="text" name="fax" placeholder="Faks" autocomplete="off" value="{{ old('fax') }}">
                        @if ($errors->has('fax'))
                            <div class="ui negative message">
                                {{ $errors->first('fax') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('phone') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Telefon') }}</label>
                        <input type="text" name="phone" placeholder="Telefon" autocomplete="off" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <div class="ui negative message">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="three fields">
                    <div class="field {{ $errors->has('website') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Website') }}</label>
                        <input type="text" name="website" placeholder="Website" autocomplete="off" value="{{ old('website') }}">
                        @if ($errors->has('website'))
                            <div class="ui negative message">
                                {{ $errors->first('website') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('division') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Klasman') }}</label>
                        <select class="ui dropdown" name="division">
                            <option value="">{{ __('Please Select') }}</option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                        </select>
                        @if ($errors->has('division'))
                            <div class="ui negative message">
                                {{ $errors->first('division') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('sector_id') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Sektör') }}</label>
                        <select class="ui dropdown" name="sector_id">
                            <option value="">{{ __('Please Select') }}</option>
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('sector_id'))
                            <div class="ui negative message">
                                {{ $errors->first('sector_id') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="ui right aligned segment">
            <a href="{{ route('firms.index') }}" class="ui basic button">{{ __('Geri Dön') }}</a>
            <button onclick="event.preventDefault();document.getElementById('store-form').submit();" class="ui positive basic button" type="submit">
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