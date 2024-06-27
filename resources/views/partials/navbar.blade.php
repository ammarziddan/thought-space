<nav class="navbar navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png" alt="Logo" height="30" class="d-inline-block align-text-top">
            ThoughtSpace
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-pencil-square"></i> Write</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sign in</a>
          </li>
          <li class="nav-item align-self-center">
            <a class="nav-link p-0" href="#"><span class="btn btn-dark rounded-pill">Get Started</span></a>
          </li>
        </ul>
      </div>
    </div>
</nav>