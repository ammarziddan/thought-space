<nav class="navbar navbar-expand-lg border-bottom px-lg-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png" alt="Logo" height="30" class="d-inline-block align-text-top">
            ThoughtSpace
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-3 align-items-center">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" aria-current="page" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('topics') ? 'active' : '' }}" aria-current="page" href="/topics">Topics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('posts/create') ? 'active' : '' }} d-flex align-items-center gap-1" href="/posts/create"><i class="bi bi-pencil-square fs-5"></i> Write</a>
          </li>

          @auth
          <li class="nav-item dropdown">
            <a class="nav-link p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="/img/{{ auth()->user()->image }}" alt="profile" height="40" class="border rounded-circle">
              {{-- Welcome back, {{ auth()->user()->name }} --}}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="/users/{{ auth()->user()->username }}"><i class="bi bi-person"></i> Profile</a></li>
              <li><a class="dropdown-item" href="/users/{{ auth()->user()->username }}/settings"><i class="bi bi-person-gear"></i> Account Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item lh-sm">Logout <small class="d-block text-secondary">{{ auth()->user()->username }}</small></button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
          <li class="nav-item align-self-center">
            <a class="nav-link p-0" href="/register"><span class="btn btn-dark rounded-pill">Get Started</span></a>
          </li>
          @endauth

        </ul>
      </div>
    </div>
</nav>