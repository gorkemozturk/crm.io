@extends('layouts.app')

@section('title')
  {{ __('Giriş Yap') }}
@endsection

@section('content')
<div class="ui small center aligned container">
  <div style="width: 360px; display: inline-block;" class="ui segments">
    <div class="ui segment">
      {{ __('Giriş Yap') }}
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
    <div class="ui segment">
      <button onclick="event.preventDefault();document.getElementById('login-form').submit();" class="ui positive basic button" type="submit">
        Giriş Yap
      </button>
    </div>
  </div>
</div>
@endsection
