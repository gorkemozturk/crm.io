@extends('layouts.app')

@section('title')
    {{ __('Firmalar') }}
@endsection

@section('content')
    <div class="ui segments">
        <div class="ui center aligned segment">
            {{ __('Firmalar') }}
        </div>
        <div class="ui right aligned segment">
            <a href="{{ route('firms.create') }}" class="ui positive basic button">
                {{ __('Yeni Firma Oluştur') }}
            </a>
        </div>
        @if(count($firms) > 0)
            <div class="ui fitted segment">
                <table class="ui celled five column table">
                    <thead>
                        <tr>
                            <th style="border-radius: 0" class="center aligned">{{ __('Klasman') }}</th>
                            <th>{{ __('Firma Adı') }}</th>
                            <th>{{ __('Telefon') }}</th>
                            <th>{{ __('Websitesi') }}</th>
                            <th style="border-radius: 0" class="center aligned">{{ __('İşlem') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($firms as $firm)
                            <tr>
                                <td class="center aligned">
                                    @if($firm->division === 1)
                                        <div class="ui teal label">A</div>
                                    @elseif($firm->division === 2)
                                        <div class="ui orange label">B</div>
                                    @elseif($firm->division === 3)
                                        <div class="ui red label">C</div>
                                    @elseif($firm->division === 4)
                                        <div class="ui purple label">D</div>
                                    @endif
                                </td>
                                <td>{{ $firm->name }}</td>
                                <td>{{ $firm->phone }}</td>
                                <td>{{ $firm->website }}</td>
                                <td class="center aligned">
                                    <div class="ui basic mini icon buttons">
                                        <a href="{{ route('firms.show', $firm->id) }}" class="ui button" data-variation="mini inverted" data-position="top center" data-content="{{ __('Görüntüle') }}">
                                            <i class="unhide icon"></i>
                                        </a>
                                        <a href="{{ route('firms.edit', $firm->id) }}" class="ui button" data-variation="mini inverted" data-position="top center" data-content="{{ __('Düzenle') }}">
                                            <i class="edit icon"></i>
                                        </a>
                                        <button onclick="event.preventDefault();document.getElementById('destroy-{{ $firm->id }}-form').submit();"  class="ui button" data-variation="mini inverted" data-position="top center" data-content="{{ __('Sil') }}">
                                            <i class="remove icon"></i>
                                        </button>
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
                    {{ __('Herhangi bir müşteri bulunmamaktadır.') }}
                </div>
            </div>
        @endif
        <div class="ui center aligned segment">
            {{ __('Toplam Firma') }}: {{ (count($firms)) }}
        </div>
    </div>

    @foreach($firms as $firm)
        <form id="destroy-{{ $firm->id }}-form" action="{{ route('firms.destroy', $firm->id) }}" method="POST" style="display: none;">
            @method('DELETE')
            @csrf
        </form>
    @endforeach
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.button').popup();
    </script>
@endsection