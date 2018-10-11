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
            <a href="{{ route('schedule-type.create') }}" class="ui positive basic button">
                {{ __('Yeni Plan Oluştur') }}
            </a>
        </div>
        @if(count($schedules) > 0)
            <div class="ui fitted segment">
                <table class="ui celled two column table">
                    <thead>
                    <tr>
                        <th style="border-radius: 0">{{ __('Plan Adı') }}</th>
                        <th style="border-radius: 0" class="center aligned">{{ __('İşlem') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->name }}</td>
                                <td class="center aligned">
                                    <div class="ui basic mini icon buttons">
                                        <a href="{{ route('schedule-type.edit', $schedule->id) }}" class="ui button" data-variation="mini inverted" data-position="top center" data-content="{{ __('Düzenle') }}">
                                            <i class="edit icon"></i>
                                        </a>
                                        <a class="ui destroy-{{ $schedule->id }} button" data-variation="mini inverted" data-position="top center" data-content="{{ __('Sil') }}">
                                            <i class="close icon"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="ui segment">
                <div class="ui info message">
                    {{ __('Herhangi bir plan bulunamadı.') }}
                </div>
            </div>
        @endif
        <div class="ui center aligned segment">
            {{ __('Toplam Plan') }}: {{ count($schedules) }}
        </div>
    </div>

    @foreach($schedules as $schedule)
        <div class="ui mini destroy-{{ $schedule->id }} modal">
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
                    <button type="submit" class="ui negative basic destroy button" onclick="event.preventDefault();document.getElementById('destroy-{{ $schedule->id }}-form').submit();">
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

        <form id="destroy-{{ $schedule->id }}-form" action="{{ route('schedule-type.destroy', $schedule->id) }}" method="POST" style="display: none;">
            @method('DELETE')
            @csrf
        </form>
    @endforeach
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.button').popup();
        @foreach($schedules as $schedule)
            $('.destroy-{{ $schedule->id }}.modal').modal('attach events', '.destroy-{{ $schedule->id }}.button', 'show').modal('setting', 'transition', 'fade up');
        @endforeach
    </script>
@endsection