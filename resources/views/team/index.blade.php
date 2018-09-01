@extends('layouts.app')

@section('title')
  {{ __('Ayarlar') }}
@endsection

@section('content')
<div class="ui right aligned basic horizontally fitted segment">
  @if(isset($isMember))
    <a style="margin: 0" class="ui basic grey button">
      <i class="setting icon"></i>
      {{ __('Ekibi Düzenle') }}
    </a>
  @else
    @if(isset($passiveMember))
      <a style="margin: 0" class="ui positive basic disabled button">
        <i class="plus circle icon"></i>
        {{ __('Yeni Ekip Kur') }}
      </a>
    @else
      <a style="margin: 0" class="ui positive basic new team button">
        <i class="plus circle icon"></i>
        {{ __('Yeni Ekip Kur') }}
      </a>
    @endif
  @endif
</div>

@if(isset($passiveMember))
  <div class="ui info message">
    {{ __('Bir ekibe başvurmuşsunuz. Başvurunuza geri dönüş yapılmadan yeni grup kuramazsınız, var olan gruplara katılamazsınız.') }}
  </div>
@endif

<div class="ui segments">
  <div class="ui center aligned segment">
    {{ __('Ekipler') }}
  </div>
  <div class="ui fitted segment">
    @if(isset($isMember))
      üye
    @else
    <table class="ui celled four column table">
      <thead>
        <tr>
          <th style="border-radius: 0">{{ __('Ekip Adı') }}</th>
          <th class="center aligned">{{ __('Üye Sayısı') }}</th>
          <th class="center aligned">{{ __('Kurucu Üye') }}</th>
          <th style="border-radius: 0" class="center aligned">{{ __('İşlem') }}</th>
        </tr>
      </tr></thead>
      <tbody>
        @foreach($teams as $team)
          <tr>
            <td>{{ $team->name }}</td>
            <td class="center aligned">{{ count($team->members) }}</td>
            <td class="center aligned">
              @foreach($team->members as $founder)
                @if($loop->first)
                  {{ $founder->user->name }}
                @endif
              @endforeach
            </td>
            <td class="center aligned">
              <div class="ui basic mini icon buttons">
                @if(isset($passiveMember))
                  <a class="ui disabled button">
                    <i class="check icon"></i>
                  </a>
                @else
                  <a class="ui icon apply-{{ $team->id }} button" class="ui button" data-content="{{ __('Ekibe Başvur') }}" data-variation="mini inverted" data-position="top center">
                    <i class="check icon"></i>
                  </a>
                @endif
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
  <div class="ui center aligned segment">
    @if(isset($isMember))
      üye
    @else
      {{ __('Toplam Ekip Sayısı') }}: {{ count($teams) }}
    @endif
  </div>
</div>

<div class="ui new team mini modal">
  <i class="close icon"></i>
  <div style="margin: 0" class="ui segments">
    <div class="ui secondary center aligned segment">
      {{ __('Yeni Ekip Kur') }}
    </div>
    <div class="ui segment">
      <form id="store-form" action="{{ route('team.store') }}" method="POST" class="ui form">
        @csrf
        <div class="field {{ $errors->has('name') ? 'error' : '' }}">
          <label style="text-align: left">{{ __('Ekip Adı') }}</label>
          <input type="text" name="name" placeholder="{{ __('Ekip Adı') }}">
          @if ($errors->has('name'))
            <div class="ui negative message">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>
        <div class="field {{ $errors->has('body') ? 'error' : '' }}">
          <label style="text-align: left">{{ __('Açıklama') }}</label>
          <textarea name="body" rows="2" placeholder="{{ __('Açıklama') }}"></textarea>
          @if ($errors->has('body'))
            <div class="ui negative message">
              {{ $errors->first('body') }}
            </div>
          @endif
        </div>
      </form>
    </div>
    <div class="ui secondary center aligned actions segment">
      <button onclick="event.preventDefault();document.getElementById('store-form').submit();" class="ui positive basic button">
        <i class="plus circle icon"></i>
        {{ __('Ekibi Kur') }}
      </button>
      <button class="ui grey basic cancel button">
        <i class="close icon"></i>
        {{ __('Vazgeç') }}
      </button>
    </div>
  </div>
</div>

  @foreach($teams as $team)
    <div class="ui mini apply-{{ $team->id }} modal">
      <i class="close icon"></i>
      <div style="margin: 0" class="ui segments">
        <div class="ui center aligned secondary segment">
          Devam Etmek İstediğinize Emin Misiniz?
        </div>
        <div class="ui center aligned segment">
          <div class="ui info icon message">
            <i class="info icon"></i>
            Yaptığınız işlemin geri dönüşü yoktur. Devam etmek istediğinize emin misiniz?
          </div>
        </div>
        <div class="ui center aligned secondary actions segment">
          <button type="submit" class="ui positive basic button" onclick="event.preventDefault();document.getElementById('apply-{{ $team->id }}-form').submit();">
            <i class="check icon"></i>
            Gruba Başvur
          </button>
          <a class="ui basic grey cancel button">
            <i class="close icon"></i>
            Vazgeç
          </a>
        </div>
      </div>
    </div>

    <form id="apply-{{ $team->id }}-form" action="{{ route('member.apply', $team->id) }}" method="POST" style="display: none;">
        @csrf
    </form>
  @endforeach
@endsection

@section('scripts')
<script type="text/javascript">
  $('.button').popup();
  $('.ui.new.team.modal').modal('attach events', '.ui.new.team.button', 'show').modal('setting', 'transition', 'fade up');
  @foreach($teams as $team)
    $('.apply-{{ $team->id }}.modal').modal('attach events', '.apply-{{ $team->id }}.button', 'show').modal('setting', 'transition', 'fade up');
  @endforeach
</script>
@endsection
