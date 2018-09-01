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
    <div class="ui secondary pointing compact menu">
      <a class="item">Sektör Ayarları</a>
    </div>
  </div>
  <div class="ui segment">
    <form id="login-form" ction="{{ route('login') }}" method="POST" class="ui form">
      @csrf
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
        <input type="password" name="password" placeholder="Password">
        @if ($errors->has('password'))
          <div class="ui negative message">
            {{ $errors->first('password') }}
          </div>
        @endif
      </div>
    </form>
  </div>
  <div class="ui center aligned segment">
    <button onclick="event.preventDefault();document.getElementById('login-form').submit();" class="ui positive basic button" type="submit">
      Giriş Yap
    </button>
  </div>
</div>
@endsection
