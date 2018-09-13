@extends('layouts.app')

@section('title')
  {{ __('Takım Üyeleri') }}
@endsection

@section('content')
<div class="ui right aligned basic horizontally fitted segment">
  <a style="margin: 0" class="ui basic grey button">
    <i class="setting icon"></i>
    {{ __('Ekibi Düzenle') }}
  </a>
</div>

<div class="ui segments">
  <div class="ui center aligned segment">
    {{ __('Ekip Üyeleri') }}
  </div>
  <div class="ui center aligned segment">
    @include('_includes.menu.team')
  </div>
  <div class="ui fitted segment">
    <table class="ui celled striped three column table">
      <thead>
        <tr>
          <th style="border-radius: 0">{{ __('Adı / Soyadı') }}</th>
          <th>{{ __('E-Mail') }}</th>
          <th class="center aligned" style="border-radius: 0">{{ __('İşlem') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($members as $member)
          <tr>
            <td>{{ $member->user->name }}</td>
            <td>{{ $member->user->email }}</td>
            <td class="center aligned">
              <div class="ui mini basic icon buttons">
                <a data-content="{{ __('Özel Mesaj Gönder') }}" data-variation="mini inverted" data-position="top center" class="ui button">
                  <i class="paper plane icon"></i>
                </a>
                <a data-content="{{ __('Takımdan Çıkar') }}" data-variation="mini inverted" data-position="top center" class="ui destroy-{{ $member->id }} button">
                  <i class="close icon"></i>
                </a>
              </div>
            </td>
          </tr>

          <div class="ui mini destroy-{{ $member->id }} modal">
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
                <button type="submit" class="ui negative basic button" onclick="event.preventDefault();document.getElementById('destroy-{{ $member->id }}-form').submit();">
                  <i class="erase icon"></i>
                  {{ __('Takımdan Çıkar') }}
                </button>
                <a class="ui basic grey cancel button">
                  <i class="close icon"></i>
                  {{ __('Vazgeç') }}
                </a>
              </div>
            </div>
          </div>

          <form id="destroy-{{ $member->id }}-form" action="{{ route('member.destroy', $member->id) }}" method="POST" style="display: none;">
            @method('DELETE')
            @csrf
          </form>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="ui center aligned segment">
    {{ __('Toplam Üye') }}: {{ count($members) }}
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$('.button').popup();
@foreach($members as $member)
  $('.destroy-{{ $member->id }}.modal').modal('attach events', '.destroy-{{ $member->id }}.button', 'show').modal('setting', 'transition', 'fade up');
@endforeach
</script>
@endsection
