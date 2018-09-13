<div class="ui secondary pointing compact menu">
  <a href="{{ route('settings.index') }}" class="item">{{ __('Item') }}</a>
  <a href="{{ route('sector.index') }}" class="{{ Request::is('settings/sector*') ? 'active' : '' }} item">{{ __('Sektör Ayarları') }}</a>
</div>
