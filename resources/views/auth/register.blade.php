@extends('layouts.app')

@section('title')
  {{ __('Kayıt Ol') }}
@endsection

@section('content')
<div class="ui small center aligned container">
  <div style="width: 360px; display: inline-block;" class="ui segments">
    <div class="ui segment">
      {{ __('Kayıt Ol') }}
    </div>
    <div class="ui segment">
      <form id="register-form" ction="{{ route('register') }}" method="POST" class="ui form">
        @csrf
        <div class="field {{ $errors->has('name') ? 'error' : '' }}">
          <label style="text-align: left">{{ __('Ad / Soyad') }}</label>
          <input type="text" name="name" placeholder="Ad / Soyad">
          @if ($errors->has('name'))
            <div class="ui negative message">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>
        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
          <label style="text-align: left">{{ __('E-Mail Adresi') }}</label>
          <input type="text" name="email" placeholder="E-Mail Adresi">
          @if ($errors->has('email'))
            <div class="ui negative message">
              {{ $errors->first('email') }}
            </div>
          @endif
        </div>
        <div class="field {{ $errors->has('password') ? 'error' : '' }}">
          <label style="text-align: left">{{ __('Şifre') }}</label>
          <input type="password" name="password" placeholder="Şifre">
          @if ($errors->has('password'))
            <div class="ui negative message">
              {{ $errors->first('password') }}
            </div>
          @endif
        </div>
        <div class="field">
          <label style="text-align: left">{{ __('Şifre') }}</label>
          <input type="password" name="password_confirmation" placeholder="Şifre">
        </div>
      </form>
    </div>
    <div class="ui center aligned segment">
      <button onclick="event.preventDefault();document.getElementById('register-form').submit();" class="ui positive basic button" type="submit">
        Kayıt Ol
      </button>
    </div>
  </div>
</div>
@endsection
