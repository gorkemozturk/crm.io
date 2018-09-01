@if(count($errors) > 0 )
  <div class="ui error message">
    <div class="header">
      {{ __('Hata meydana geldi!') }}
    </div>
    <ul class="list">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if($message = Session::get('success'))
  <div class="ui success icon message">
    <div class="content">
      {{ $message }}
    </div>
  </div>
@endif

@if($message = Session::get('error'))
  <div class="ui error icon message">
    <div class="content">
      {{ $message }}
    </div>
  </div>
@endif
