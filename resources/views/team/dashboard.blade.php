@extends('layouts.app')

@section('title')
  {{ __('Ekibim') }}
@endsection

@section('content')
<div class="ui right aligned basic horizontally fitted segment">
  <a style="margin: 0" class="ui basic grey button">
    <i class="setting icon"></i>
    {{ __('Ekibi Düzenle ') }}
  </a>
</div>

<div class="ui segments">
  <div class="ui center aligned segment">
    {{ __('Ekibim') }}
  </div>
  <div class="ui center aligned segment">
    @include('_includes.menu.team')
  </div>
  <div class="ui segment">
    deneme
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $('.button').popup();
</script>
@endsection
