<nav>
  <div class="navbar">
    <i class='bx bx-menu'></i>
    <div class="logo"><a href="{{ url('/') }}"><img width="100" src="{{ asset('visitor/img/sbfm.png') }}" alt=""></a></div>
    <div class="nav-links">
      <div class="sidebar-logo">
        <span class="logo-name"><img style="margin-left: 30px;" width="100" src="{{ asset('visitor/img/sbfm.png') }}" alt=""></span>
        <i class='bx bx-x' ></i>
      </div>
      <ul class="links">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="submenu">
          <a href="#">News</a>
          <i class='bx bxs-chevron-down js-arrow arrow '></i>
          <ul class="js-sub-menu sub-menu">
            <li><a href="{{ url('/category') }}">Category</a></li>
            <li><a href="#">Form Validation</a></li>
            <li><a href="#">Card Slider</a></li>
            <li><a href="#">Complete Website</a></li>
          </ul>
        </li>
        <li><a href="{{ url('/about') }}">About Us</a></li>
        <li><a href="{{ url('/contact') }}">Contact</a></li>
        <li><a href="{{ url('/radio') }}">Radio</a></li>
      </ul>
    </div>
    <div class="search-box">
      <i class='bx bx-search'></i>
      <div class="input-box">
        <input type="text" placeholder="Search...">
      </div>
    </div>
  </div>
</nav>