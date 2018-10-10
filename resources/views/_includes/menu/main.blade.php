<div style="border-bottom: thin solid #F1F1F1" class="ui segment">
  <div class="ui menu">
    <div class="ui small container">
      @guest
        <div class="right menu">
          <div class="item">
            <a href="{{ route('login') }}" class="ui positive basic button">
              {{ __('Login') }}
            </a>
          </div>
          <div class="horizontally fitted borderless item">
            <a href="{{ route('register') }}" class="ui primary basic button">
              {{ __('Register') }}
            </a>
          </div>
        </div>
      @else
        <a class="borderless item">
          {{ __('Takvim') }}
        </a>
        <a href="{{ route('firms.index') }}" class="borderless {{ Request::is('firms*') ? 'active' : '' }} item">
          {{ __('Firmalar') }}
        </a>
        <a href="{{ route('directory.index') }}" class="borderless {{ Request::is('directory*') ? 'active' : '' }} item">
          {{ __('Rehber') }}
        </a>
        <a href="{{ route('member.dashboard') }}" class="borderless {{ Request::is('my-team*') ? 'active' : '' }} item">
            {{ __('Ekibim') }}
        </a>
        <div class="right menu">
          <a class="icon item">
            <i class="inbox icon"></i>
          </a>
          <a class="icon item">
            <i class="bell outline icon"></i>
          </a>
          <a href="{{ route('settings.index') }}" class="icon item">
            <i class="setting icon"></i>
          </a>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="icon item">
            <i class="sign out icon"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      @endguest
    </div>
  </div>
</div>
