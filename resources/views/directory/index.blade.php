@extends('layouts.app')

@section('title')
    {{ __('Rehber') }}
@endsection

@section('content')
    <div class="ui segments">
        <div class="ui center aligned segment">
            {{ __('Rehber') }}
        </div>
        <div class="ui right aligned segment">
            <a href="{{ route('directory.create', 0) }}" class="ui positive basic button">
                {{ __('Yeni Kişi Oluştur') }}
            </a>
        </div>
        <div class="ui center aligned segment">
            {{ __('Toplam Kişi') }}:
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.button').popup();
    </script>
@endsection