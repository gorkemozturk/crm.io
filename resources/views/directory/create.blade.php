@extends('layouts.app')

@section('title')
    {{ __('Yeni Kişi Yarat') }}
@endsection

@section('content')
    <div class="ui segments">
        <div class="ui center aligned segment">
            {{ __('Yeni Kişi Yarat') }}
        </div>
        <div class="ui segment">
            <form id="store-form" action="{{ route('directory.store', Request::route('id')) }}" method="POST" class="ui form">
                @csrf
                <div class="two fields">
                    <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Kişi Adı') }}</label>
                        <input type="text" name="name" placeholder="{{ __('Kişi Adı') }}" autocomplete="off" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <div class="ui negative message">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('E-mail Adı') }}</label>
                        <input type="text" name="email" placeholder="{{ __('E-mail') }}" autocomplete="off" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <div class="ui negative message">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="two fields">
                    <div class="field {{ $errors->has('phone') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Telefon') }}</label>
                        <input type="text" name="phone" placeholder="{{ __('Telefon') }}" autocomplete="off" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <div class="ui negative message">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('birthday') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Doğum Tarihi') }}</label>
                        <input type="text" name="birthday" placeholder="{{ __('Doğum Tarihi') }}" autocomplete="off" value="{{ old('birthday') }}">
                        @if ($errors->has('birthday'))
                            <div class="ui negative message">
                                {{ $errors->first('birthday') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="three fields">
                    <div class="field {{ $errors->has('country') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Ülke') }}</label>
                        <input type="text" name="country" placeholder="{{ __('Ülke') }}" autocomplete="off" value="{{ old('country') }}">
                        @if ($errors->has('country'))
                            <div class="ui negative message">
                                {{ $errors->first('country') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('city') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Şehir') }}</label>
                        <input type="text" name="city" placeholder="{{ __('Şehir') }}" autocomplete="off" value="{{ old('city') }}">
                        @if ($errors->has('city'))
                            <div class="ui negative message">
                                {{ $errors->first('city') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('province') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('İlçe') }}</label>
                        <input type="text" name="province" placeholder="{{ __('İlçe') }}" autocomplete="off" value="{{ old('province') }}">
                        @if ($errors->has('province'))
                            <div class="ui negative message">
                                {{ $errors->first('province') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="field {{ $errors->has('address') ? 'error' : '' }}">
                    <label style="text-align: left">{{ __('Adres') }}</label>
                    <input type="text" name="address" placeholder="{{ __('Adres') }}" autocomplete="off" value="{{ old('address') }}">
                    @if ($errors->has('address'))
                        <div class="ui negative message">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                </div>
            </form>
        </div>
        <div class="ui right aligned segment">
            <a href="{{ route('directory.index') }}" class="ui basic button">{{ __('Geri Dön') }}</a>
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