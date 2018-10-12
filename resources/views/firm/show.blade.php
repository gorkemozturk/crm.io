@extends('layouts.app')

@section('title')
    {{ $firm->name }}
@endsection

@section('content')
    <div class="ui segments">
        <div class="ui center aligned segment">
            {{ $firm->name }}
        </div>
        <div class="ui right aligned segment">
            <a href="{{ route('directory.create', $firm->id) }}" class="ui positive basic button">
                {{ __('Yeni Kişi Ekle') }}
            </a>
        </div>
        <div class="ui fitted segment">
            <table class="ui celled two column table">
                <tbody>
                    <tr>
                        <td colspan="2" class="center aligned">{{ __('Firma Genel Bilgileri') }}</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td style="background: #fafafa">{{ __('Firma Adı') }}</td>
                        <td>{{ $firm->name }}</td>
                    </tr>
                    <tr>
                        <td style="background: #fafafa">{{ __('Sektör') }}</td>
                        <td>{{ $firm->sector->name }}</td>
                    </tr>
                    <tr>
                        <td style="background: #fafafa">{{ __('Websitesi') }}</td>
                        <td>{{ $firm->website }}</td>
                    </tr>
                    <tr>
                        <td style="background: #fafafa">{{ __('E-Mail') }}</td>
                        <td>{{ $firm->email }}</td>
                    </tr>
                    <tr>
                        <td style="background: #fafafa">{{ __('Sektör') }}</td>
                        <td>dsds </td>
                    </tr>
                    <tr>
                        <td style="background: #fafafa">{{ __('Klasman') }}</td>
                        <td>
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
                    </tr>
                    <tr>
                        <td style="background: #fafafa">{{ __('Telefon') }}</td>
                        <td>{{ $firm->phone }}</td>
                    </tr>
                    <tr>
                        <td style="background: #fafafa">{{ __('Faks') }}</td>
                        <td>{{ $firm->fax }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.button').popup();
    </script>
@endsection