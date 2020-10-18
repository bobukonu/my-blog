<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
  <div class="container">
    <a class="navbar-brand" href="#">My Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto">

      </ul>
      <ul class="navbar-nav my-2 my-md-0">
        <li class="nav-item active bg-light">
          <a class="nav-link" href="{{ route('blog')}}">Blog <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
