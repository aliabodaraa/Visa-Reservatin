<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      @auth
        <div class="col-lg-3 col-sm-3 col-xs-3">
          &nbsp;&nbsp;
          <span class="badge bg-primary" style="position: relative;right: 30%;">{{auth()->user()->username}}</span>
        </div>
      @endauth
      <ul class="nav col-lg-3 col-sm-3 col-xs-3 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style="display:contents">
        @auth
        <li class="{{ (Request::is("/")) ? 'Active':''}}"><a href="{{ route('dashboard.index') }}" class="nav-link px-2 text-white"> Home</a></li>
        <li class="{{ ( str_ends_with(URL::full(),"dashboard/users")) ? 'Active':''}}"><a href="{{ route('dashboard.users.index') }}" class="nav-link px-2 text-white"> المستخدمين</a></li>
        <li class="{{ (strpos(URL::full(), 'dashboard/users/guests?person=invitee')) || ( str_ends_with(URL::full(),"send_invite"))  ? 'Active':''}}"><a href="{{ route('dashboard.guests.index',["person"=>"invitee"]) }}" class="nav-link px-2 text-white"> المدعوون</a></li>
        <li class="{{ (strpos(URL::full(), 'dashboard/users/guests?person=registant')) ? 'Active':''}}"><a href="{{ route('dashboard.guests.index',["person"=>"registant"]) }}" class="nav-link px-2 text-white"> المسجلين</a></li>
        @endauth
      </ul>
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            @auth

            @endauth
      </ul>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
      </form>

      @auth
        <div class="text-end">
          <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
        </div>
      @endauth

      @guest

      @endguest
    </div>
  </div>
</header>
