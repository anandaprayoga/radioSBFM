@extends('layouts.user_type.visitor')
@section('content')
<div class="container px-3 py-5 position-relative" style="margin-top: 50px;" id="custom-cards">
    <div class="sectionEvent">Gallery Foto</div>
    <div class="lightbox">
        <div class="wrapper1">
            <header>
                <div class="details">
                    <i class="uil uil-camera"></i>
                    <span>Image Preview</span>
                </div>
                <div class="buttons"><i class="fa-solid fa-xmark"></i></div>
            </header>
            <div class="preview-img">
                <div class="img"><img src="" alt="preview-img"></div>
            </div>
        </div>
    </div>
    <section class="gallery">
      @if($galeri->isEmpty())
        <p class="text-center">Belum ada Foto yang diunggah</p>
      @else
        <ul class="images">
            @foreach($galeri as $gambar)
                <li class="img">
                    <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="img">
                </li>
            @endforeach
        </ul>
      @endif
        
    </section>
</div>
<div class="container py-5">
  {{ $galeri->links('') }}
</div>
<script>
    const allImages = document.querySelectorAll(".images .img");
    const lightbox = document.querySelector(".lightbox");
    const closeImgBtn = lightbox.querySelector(".fa-solid");

    allImages.forEach(img => {
        // Calling showLightBox function with passing clicked img src as argument
        img.addEventListener("click", () => showLightbox(img.querySelector("img").src));
    });

    const showLightbox = (img) => {
        // Showing lightbox and updating img source
        lightbox.querySelector("img").src = img;
        lightbox.classList.add("show");
        document.body.style.overflow = "hidden";
    }

    closeImgBtn.addEventListener("click", () => {
        // Hiding lightbox on close icon click
        lightbox.classList.remove("show");
        document.body.style.overflow = "auto";
    });
</script>
@endsection
