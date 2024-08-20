@extends('layouts.user_type.visitor')

@section('content')
<main style="margin-top: 90px;" class="container">
    
  
    <div class="row g-5">
      <div class="col-md-8">
        <div class="text-center pb-3">
          <img src="{{ asset('visitor/img/news.webp') }}" class="img-fluid gambarberita" alt="...">
        </div>
        <article class="blog-post">
          <strong class="d-inline-block mb-2 text-success-emphasis px-3"style="background-color:#21d4fd;">Design</strong>
          <h2 class="titleberita display-6 link-body-emphasis mb-1">New feature paragraph placeholder paragraph placeholder</h2>
          
          <p class="blog-post-meta">December 14, 2020</p>
          
  
          <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
          <ul>
            <li>First list item</li>
            <li>Second list item with a longer description</li>
            <li>Third list item to close it out</li>
          </ul>
          <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other highly repetitive body text used throughout.</p>
        </article>
  
  
      </div>
  
      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
  
          <div class="section">Berita Terbaru</div>
            <ul class="list-unstyled postterbaru">
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-2 link-body-emphasis text-decoration-none" href="{{ url('/berita') }}">
                  <img src="{{ asset('visitor/img/news.webp') }}" class="recentpost" alt="">
                  <div class="col-lg-8">
                    <h6 class="mb-0 titleberita">Longer blog post title: This one has multiple lines!</h6>
                    <small class="text-body-secondary">January 13, 2023</small>
                  </div>
                </a>
              </li>
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="{{ url('/berita') }}">
                  <img src="{{ asset('visitor/img/news.webp') }}" class="recentpost" alt="">
                  <div class="col-lg-8">
                    <h6 class="mb-0 titleberita">Longer blog post title: This one has multiple lines!</h6>
                    <small class="text-body-secondary">January 13, 2023</small>
                  </div>
                </a>
              </li>
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="{{ url('/berita') }}">
                  <img src="{{ asset('visitor/img/news.webp') }}" class="recentpost" alt="">
                  <div class="col-lg-8">
                    <h6 class="mb-0 titleberita">Longer blog post title: This one has multiple lines!</h6>
                    <small class="text-body-secondary">January 13, 2023</small>
                  </div>
                </a>
              </li>
            </ul>
          </div>
  
        </div>
      </div>
    </div>
  
  </main>
@endsection
