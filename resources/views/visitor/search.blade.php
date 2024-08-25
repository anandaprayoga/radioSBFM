@extends('layouts.user_type.visitor')
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-center sectionEvent category">
      <h3>Search :</h3>
      <h3 class="text-primary px-1">Olahraga</h3>
    </div>
    <div class="search py-5 ">
        <div class="card mb-3 border-0 align-items-center" style="100%">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('visitor/img/news.webp') }}" class="img-fluid fix-size" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary ms-auto p-2">Go somewhere</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 border-0 align-items-center" style="100%">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('visitor/img/news.webp') }}" class="img-fluid fix-size" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary ms-auto p-2">Go somewhere</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 border-0 align-items-center" style="100%">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('visitor/img/about-us.jpg') }}" class="img-fluid fix-size" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary ms-auto p-2">Go somewhere</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
      <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
    </div>
</div>
@endsection