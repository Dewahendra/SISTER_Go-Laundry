<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-toggle d-inline">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <div class="photo">
                <img src="{{asset('template/assets/img/ironman.png')}}" alt="Profile Photo">
              </div>
              <b class="caret d-none d-lg-block d-xl-block"></b>
              <p class="d-lg-none">
                Log out
              </p>
            </a>
            <ul class="dropdown-menu dropdown-navbar">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
              <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
            </ul>
          </li>
          <li class="separator d-lg-none"></li>
        </ul>
      </div>
    </div>
  </nav>