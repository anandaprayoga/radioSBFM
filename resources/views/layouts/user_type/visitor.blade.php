@extends('layouts.app1')

@section('visitor')
    @include('layouts.navbars.visitor.nav')
    @yield('content')    
    @include('layouts.footers.visitor.footer')
@endsection