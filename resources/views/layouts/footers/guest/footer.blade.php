  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
      {{-- <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="https://www.creative-tim.com/?_ga=2.242299972.757293697.1638911086-1528502635.1638911086" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Company
          </a>
          <a href="https://www.creative-tim.com/presentation" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              About Us
          </a>
          <a href="https://www.creative-tim.com/presentation" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Team
          </a>
          <a href="https://www.creative-tim.com/templates" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Products
          </a>
          <a href="https://www.creative-tim.com/blog" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Blog
          </a>
          <a href="https://www.creative-tim.com/support-terms" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Pricing
          </a>
      </div> --}}
        {{-- @if (!auth()->user() || \Request::is('static-sign-up')) 
          <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
              <a href="https://www.youtube.com/@suarabangkalan4978" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-youtube" aria-hidden="true"></span>
              </a>
              <a href="https://x.com/radiosbfm" target="_blank" class="text-secondary me-xl-4 me-4">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                  </svg>
              </a>
              <a href="https://www.instagram.com/suarabangkalan_fm/" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-instagram" aria-hidden="true"></span>
              </a>
              <a href="https://www.facebook.com/people/Suara-Bangkalan-FM/100086670121591/" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-facebook" aria-hidden="true"></span>
              </a>
          </div>
        @endif --}}
      </div>
      @if (!auth()->user() || \Request::is('static-sign-up')) 
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script> by 
              <a style="color: #252f40;" class="font-weight-bold ml-1" >Suara Bangkalan</a>
              {{-- &
              <a style="color: #252f40;" href="https://www.updivision.com" class="font-weight-bold ml-1" target="_blank">UPDIVISION</a>. --}}
            </p>
          </div>
        </div>
      @endif
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
