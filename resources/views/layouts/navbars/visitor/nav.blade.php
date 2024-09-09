<nav>
  <div class="navbar">
    <i class='bx bx-menu'></i>
    <div class="logo">
      <a href="{{ url('/') }}"><img width="100" src="{{ asset('visitor/img/sbfm.png') }}" alt=""></a>
    </div>
    <div class="nav-links">
      <div class="sidebar-logo">
        <span class="logo-name"><img style="margin-left: 30px;" width="100" src="{{ asset('visitor/img/sbfm.png') }}" alt=""></span>
        <i class='bx bx-x' ></i>
      </div>
      <ul class="links">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="submenu">
          <a href="#">Berita</a>
          <i class='bx bxs-chevron-down js-arrow arrow'></i>
          <ul class="js-sub-menu sub-menu">
            @foreach($kategoris as $kategori)
              <li><a href="{{ url('/category/' . $kategori->id) }}">{{ $kategori->nama_kategori }}</a></li>
            @endforeach
          </ul>
        </li>
        <li><a href="{{ url('/about') }}">Profil</a></li>
        <li><a href="{{ url('/contact') }}">Kontak</a></li>
        <li><a href="{{ url('/galeri') }}">Galeri</a></li>
        <li><a href="{{ url('/radio') }}">Streaming</a></li>
      </ul>
    </div>
    <div class="search-box">
      <form action="{{ url('/search') }}" method="GET">
        <i class='bx bx-search'></i>
        <div class="input-box">
          <input type="text" name="query" placeholder="Search..." value="{{ request()->query('query') }}">
        </div>
      </form>
    </div>
  </div>
</nav>
