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
            <form id="update-form" action="{{ route('directory.update', $client->id) }}" method="POST" class="ui form">
                @method('PUT')
                @csrf
                <div class="two fields">
                    <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Kişi Adı') }}</label>
                        <input type="text" name="name" value="{{ $client->name }}" autocomplete="off">
                        @if ($errors->has('name'))
                            <div class="ui negative message">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('E-mail Adı') }}</label>
                        <input type="text" name="email" value="{{ $client->email }}" autocomplete="off">
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
                        <input type="text" name="phone" value="{{ $client->phone }}" autocomplete="off">
                        @if ($errors->has('phone'))
                            <div class="ui negative message">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('birthday') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Doğum Tarihi') }}</label>
                        <input type="text" name="birthday" value="{{ $client->birthday }}" autocomplete="off">
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
                        <input type="text" name="country" value="{{ $client->country }}" autocomplete="off">
                        @if ($errors->has('country'))
                            <div class="ui negative message">
                                {{ $errors->first('country') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('city') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('Şehir') }}</label>
                        <input type="text" name="city" value="{{ $client->city }}" autocomplete="off">
                        @if ($errors->has('city'))
                            <div class="ui negative message">
                                {{ $errors->first('city') }}
                            </div>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('province') ? 'error' : '' }}">
                        <label style="text-align: left">{{ __('İlçe') }}</label>
                        <input type="text" name="province" value="{{ $client->province }}" autocomplete="off">
                        @if ($errors->has('province'))
                            <div class="ui negative message">
                                {{ $errors->first('province') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="field {{ $errors->has('address') ? 'error' : '' }}">
                    <label style="text-align: left">{{ __('Adres') }}</label>
                    <input type="text" name="address" value="{{ $client->address }}" autocomplete="off">
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