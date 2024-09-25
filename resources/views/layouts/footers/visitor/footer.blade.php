<!--=============== Footer ===============-->
<div class="foter text-white" style="background: hsla(220, 32%, 8%, 3);">
      <div class="container">
        <footer  style="padding-top: 70px;">
          <div class="container">
            <div class="row" style="padding-bottom: 100px; display: flex; justify-content:space-around">
              <div class="col-md-5 mb-3">
                <img width="170px" height="60px" src="{{ asset('visitor/img/sbfm1.png') }}" alt="">
                <p class="py-3" style="text-align: justify;">Suara Bangkalan Fm telah hadir membersamai masyarakat Bangkalan dan sekitarnya selama lebih dari 30 tahun dengan menyajikan informasi yang aktual dan faktual disertai dengan semangat menyajikan hiburan yang berkualitas bagi para pendengar</p>
                <section class="mb-2">
                  <!-- Facebook -->
                  <a data-mdb-ripple-init
                    class="btn text-white btn-floating m-1"
                    style="background-color: #3b5998;"
                    href="#!"
                    role="button">
                    <i class="fab fa-facebook-f"></i>
                  </a>

                  <!-- Twitter -->
                  <a data-mdb-ripple-init
                    class="btn text-white btn-floating m-1"
                    style="background-color: #55acee;"
                    href="https://x.com/RadioSBFM"
                    role="button">
                    <i class="fab fa-twitter"></i>
                  </a>

                  <!-- Google -->
                  <a
                    data-mdb-ripple-init
                    class="btn text-white btn-floating m-1"
                    style="background-color: #dd4b39;"
                    href="#!"
                    role="button">
                    <i class="fab fa-google"></i>
                  </a>

                  <!-- Instagram -->
                  <a
                    data-mdb-ripple-init
                    class="btn text-white btn-floating m-1"
                    style="background-color: #ac2bac;"
                    href="https://www.instagram.com/suarabangkalan_fm"
                    role="button">
                    <i class="fab fa-instagram"></i>
                  </a>

                  <!-- Youtube -->
                  <a
                    data-mdb-ripple-init
                    class="btn text-white btn-floating m-1"
                    style="background-color: #FF0000;"
                    href="https://www.youtube.com/@suarabangkalan4978"
                    role="button">
                    <i class="fa-brands fa-youtube"></i>
                  </a>
                </section>
              </div>
              <div class="col-md-2  mb-3 px-3">
                <h5>Menu Halaman</h5>
                <span style="border-bottom: 3px solid; display: block; width: 100px; color: #21d4fd; margin-bottom: 10px;"></span>
                <ul class="nav flex-column">
                  <li class="nav-item mb-2"><a href="{{ url('/') }}" class="nav-link p-0 text-white">Home</a></li>
                  <li class="nav-item mb-2 js-botton">
                    <div class="d-flex">
                      <a class="nav-link p-0 text-white">Berita</a>
                      <i class='bx bxs-chevron-down arrow mt-1'></i>
                    </div>
                    <ul class="js-sub-menu sub-footer" style="margin-left:-20px">
                    @foreach($kategoris as $kategori)
                      <li class="lifooter"><a class="afooter" href="{{ url('/category/' . $kategori->id) }}">{{ $kategori->nama_kategori }}</a></li>
                    @endforeach
                    </ul>
                  </li>
                  <li class="nav-item mb-2"><a href="{{ url('/radio') }}" class="nav-link p-0 text-white">Streaming</a></li>
                  <li class="nav-item mb-2"><a href="{{ url('/galeri') }}" class="nav-link p-0 text-white">Galeri</a></li>
                  <li class="nav-item mb-2"><a href="{{ url('/about') }}" class="nav-link p-0 text-white">Profil</a></li>
                  <li class="nav-item mb-2"><a href="{{ url('/contact') }}" class="nav-link p-0 text-white">Kontak</a></li>
                  
                </ul>
              </div>
              <div class="col-md-3 mb-3">
                <h5>Information</h5>
                <span style="border-bottom: 3px solid; display: block; width: 100px; color: #21d4fd; margin-bottom: 10px;"></span>
                <p><span style="color:#21d4fd;">Alamat : </span>Jl. Jokotole No. 01, Kabupaten Bangkalan, Jawa Timur, 69119</p>
                <p><span style="color:#21d4fd;">Email : </span>radiobangkalan@gmail.com</p>
                <p><span style="color:#21d4fd;">No.Tlp : </span>(031) - 3096434</p>
                <p><span style="color:#21d4fd;">No.Tlp Seluer - WA : </span>0821-4199-3836</p>
              </div>
              
          </div>
      
          <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-0 border-top">
            <p>© <script>
                        document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart"></i> by
                <a>SBFM Bangkalan</a>
            </p>
            <ul class="list-unstyled d-flex">
              <li class="ms-3"><a class="link-body-emphasis" href="https://www.instagram.com/suarabangkalan_fm"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></a></li>
              <li class="ms-3"><a class="link-body-emphasis" href="https://x.com/RadioSBFM"><i class="fa-brands fa-x-twitter" style="color: #ffffff;"></i></a></li>
              <li class="ms-3"><a class="link-body-emphasis" href="https://www.youtube.com/@suarabangkalan4978"><i class="fa-brands fa-youtube" style="color: #ffffff;"></i></a></li>
              <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="fa-brands fa-facebook" style="color: #ffffff;"></i></a></li>
            </ul>
          </div>
        </footer>
      </div>
    </div>