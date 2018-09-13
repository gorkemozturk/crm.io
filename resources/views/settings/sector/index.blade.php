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
        <div class="ui right aligned segment">
            <a href="{{ route('sector.create') }}" class="ui positive basic button">
                {{ __('Yeni Sektör Oluştur') }}
            </a>
        </div>
        <div class="ui fitted segment">
            <table class="ui celled two column table">
                <thead>
                <tr>
                    <th style="border-radius: 0">{{ __('Sektör Adı') }}</th>
                    <th style="border-radius: 0" class="center aligned">{{ __('İşlem') }}</th>
                </tr>
                </thead>
                <tbody>
                @if(count($sectors) > 0)
                    @foreach($sectors as $sector)
                        <tr>
                            <td>{{ $sector->name }}</td>
                            <td class="center aligned">
                                <div class="ui basic mini icon buttons">
                                    <a href="{{ route('sector.edit', $sector->id) }}" class="ui button" data-variation="mini inverted" data-position="top center" data-content="{{ __('Düzenle') }}">
                                        <i class="edit icon"></i>
                                    </a>
                                    <a class="ui destroy-{{ $sector->id }} button" data-variation="mini inverted" data-position="top center" data-content="{{ __('Sil') }}">
                                        <i class="close icon"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">
                            <div class="ui info message">
                                {{ __('Herhangi bir sektör bulunamadı.') }}
                            </div>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="ui center aligned segment">
            {{ __('Toplam Sektör') }}: {{ count($sectors) }}
        </div>
    </div>

    @foreach($sectors as $sector)
        <div class="ui mini destroy-{{ $sector->id }} modal">
            <i class="close icon"></i>
            <div style="margin: 0" class="ui segments">
                <div class="ui center aligned secondary segment">
                    {{ __('Devam Etmek İstediğinize Emin Misiniz?') }}
                </div>
                <div class="ui center aligned segment">
                    <div class="ui info icon message">
                        <i class="info icon"></i>
                        {{ __('Yaptığınız işlemin geri dönüşü yoktur. Devam etmek istediğinize emin misiniz?') }}
                    </div>
                </div>
                <div class="ui center aligned secondary actions segment">
                    <button type="submit" class="ui negative basic destroy button" onclick="event.preventDefault();document.getElementById('destroy-{{ $sector->id }}-form').submit();">
                        <i class="close icon"></i>
                        {{ __('Sil') }}
                    </button>
                    <a class="ui basic grey cancel button">
                        <i class="close icon"></i>
                        {{ __('Vazgeç') }}
                    </a>
                </div>
            </div>
        </div>

        <form id="destroy-{{ $sector->id }}-form" action="{{ route('sector.destroy', $sector->id) }}" method="POST" style="display: none;">
            @method('DELETE')
            @csrf
        </form>
    @endforeach
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.button').popup();
        @foreach($sectors as $sector)
        $('.destroy-{{ $sector->id }}.modal').modal('attach events', '.destroy-{{ $sector->id }}.button', 'show').modal('setting', 'transition', 'fade up');
        @endforeach
    </script>
@endsection