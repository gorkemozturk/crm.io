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
    {{ __('Başvurular') }}
  </div>
  <div class="ui center aligned segment">
    @include('_includes.menu.team')
  </div>
  @if(count($applicants) > 0)
    <div class="ui fitted segment">
      <table class="ui celled striped four column table">
        <thead>
          <tr>
            <th style="border-radius: 0">{{ __('Adı / Soyadı') }}</th>
            <th>{{ __('E-Mail') }}</th>
            <th class="center aligned" style="border-radius: 0">{{ __('İşlem') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($applicants as $applicant)
          <tr>
            <td>{{ $applicant->user->name }}</td>
            <td>{{ $applicant->user->email }}</td>
            <td class="center aligned">
              <div class="ui mini basic icon buttons">
                <a data-content="{{ __('Kabul Et') }}" data-variation="mini inverted" data-position="top center" class="ui confirm-{{ $applicant->id }} button">
                  <i class="check icon"></i>
                </a>
                <a data-content="{{ __('Reddet') }}" data-variation="mini inverted" data-position="top center" class="ui destroy-{{ $applicant->id }} button">
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
        {{ __('Herangi bir kullanıcı başvurusu bulunmamaktadır.') }}
      </div>
    </div>
  @endif
  <div class="ui center aligned segment">
    {{ __('Toplam Başvuru') }}: {{ count($applicants) }}
  </div>
</div>

  @foreach($applicants as $applicant)
    <div class="ui mini confirm-{{ $applicant->id }} modal">
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
          <button type="submit" class="ui positive basic button" onclick="event.preventDefault();document.getElementById('confirm-{{ $applicant->id }}-form').submit();">
            <i class="check icon"></i>
            {{ __('Başvuruyu Kabul Et') }}
          </button>
          <a class="ui basic grey cancel button">
            <i class="close icon"></i>
            {{ __('Vazgeç') }}
          </a>
        </div>
      </div>
    </div>

    <form id="confirm-{{ $applicant->id }}-form" action="{{ route('member.confirm', $applicant->id) }}" method="POST" style="display: none;">
      @method('PUT')
      @csrf
    </form>

    <div class="ui mini destroy-{{ $applicant->id }} modal">
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
          <button type="submit" class="ui negative basic button" onclick="event.preventDefault();document.getElementById('destroy-{{ $applicant->id }}-form').submit();">
            <i class="erase icon"></i>
            {{ __('Başvuruyu Reddet') }}
          </button>
          <a class="ui basic grey cancel button">
            <i class="close icon"></i>
            {{ __('Vazgeç') }}
          </a>
        </div>
      </div>
    </div>

    <form id="destroy-{{ $applicant->id }}-form" action="{{ route('member.destroy', $applicant->id) }}" method="POST" style="display: none;">
      @method('DELETE')
      @csrf
    </form>
  @endforeach
@endsection

@section('scripts')
<script type="text/javascript">
  $('.button').popup();
  @foreach($applicants as $applicant)
    $('.confirm-{{ $applicant->id }}.modal').modal('attach events', '.confirm-{{ $applicant->id }}.button', 'show').modal('setting', 'transition', 'fade up');
    $('.destroy-{{ $applicant->id }}.modal').modal('attach events', '.destroy-{{ $applicant->id }}.button', 'show').modal('setting', 'transition', 'fade up');
  @endforeach
</script>
@endsection
