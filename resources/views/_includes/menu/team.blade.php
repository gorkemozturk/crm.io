<div class="ui secondary pointing compact menu">
  <a href="{{ route('member.dashboard') }}" class="{{ Request::is('my-team/dashboard') ? 'active' : '' }} item">{{ __('Aktiviteler') }}</a>
  <a href="{{ route('member.list') }}" class="{{ Request::is('my-team/members') ? 'active' : '' }} item">{{ __('Üyeler') }}</a>
  <a href="{{ route('member.application') }}" class="{{ Request::is('my-team/applications') ? 'active' : '' }} item">{{ __('Başvurular') }}</a>
</div>
