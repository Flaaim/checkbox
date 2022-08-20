<nav class="navbar navbar-light bg-light">
  <div class="container-fluid justify-content-start">
  <a class="navbar-brand" href="{{route('dashboard')}}">Checkbox</a>
    @auth
        @isset($authUser)
    <div class="navbar ">
        <a class="navbar-link p-1" href="#">{{$authUser->name}}</a>
        <a class="navbar-link p-1" href="{{route('logout')}}">Выйти</a>
    </div>
        @endisset
    @endauth

  </div>
</nav>
