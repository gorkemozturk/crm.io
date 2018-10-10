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
        <div class="ui fitted segment">
            <table class="ui celled four column table">
                <thead>
                    <tr>
                        <th>Ad / Soyad</th>
                        <th>E-Mail</th>
                        <th>Telefon</th>
                        <th>Firma</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>
                                @if($client->firm_id === 0)
                                    {{ __('Bağımsız') }}
                                @else
                                    {{ $client->firm->name }}
                                @endif
                            </td>
                            <td>
                                <div class="ui basic mini icon buttons">
                                    <a class="ui button" data-variation="mini inverted" data-position="top center" data-content="{{ __('Görüntüle') }}">
                                        <i class="unhide icon"></i>
                                    </a>
                                    <a href="{{ route('directory.edit', $client->id) }}" class="ui button" data-variation="mini inverted" data-position="top center" data-content="{{ __('Düzenle') }}">
                                        <i class="edit icon"></i>
                                    </a>
                                    <button onclick="event.preventDefault();document.getElementById('destroy-{{ $client->id }}-form').submit();" class="ui button" data-variation="mini inverted" data-position="top center" data-content="{{ __('Sil') }}">
                                        <i class="remove icon"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="ui center aligned segment">
            {{ __('Toplam Kişi') }}: {{ count($clients) }}
        </div>
    </div>

    @foreach($clients as $client)
        <form id="destroy-{{ $client->id }}-form" action="{{ route('directory.destroy', $client->id) }}" method="POST" style="display: none;">
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