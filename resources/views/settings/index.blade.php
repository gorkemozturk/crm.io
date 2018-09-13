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
    INDEX SETTINGS
  </div>
  <div class="ui center aligned segment">
    <button onclick="event.preventDefault();document.getElementById('login-form').submit();" class="ui positive basic button" type="submit">
      Giriş Yap
    </button>
  </div>
</div>
@endsection
