<div class="ui secondary pointing compact menu">
  <a class="item">{{ __('Aktiviteler') }}</a>
  <a href="{{ route('member.list') }}" class="{{ Request::is('myteam/members') ? 'active' : '' }} item">{{ __('Üyeler') }}</a>
  <a href="{{ route('member.application') }}" class="{{ Request::is('myteam/applications') ? 'active' : '' }} item">{{ __('Başvurular') }}</a>
</div>
