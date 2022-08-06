@extends('front.layouts.master')
@section('title','Ana Sayfa')
@section('content')
<!-- ABOUT -->
<section class="about full-screen d-lg-flex justify-content-center align-items-center" id="about">
    <div class="container">
        <div class="row">

            <div class="col-lg-7 col-md-12 col-12 d-flex align-items-center">
                <div class="about-text">
                    <small class="small-text">Welcome to <span class="mobile-block">my portfolio website!</span></small>
                    <h1 class="animated animated-text">
                        <span class="mr-2">Hey folks, I'm</span>
                        <div class="animated-info">

                            <span class="animated-item">{{ $user->name }} {{ $user->lastname }}</span>
                            <span class="animated-item">{{ $user->title }}</span>
                        </div>

                    </h1>
                    <br>
                    <p>{{ $user->description }}</p>

                    <div class="custom-btn-group mt-4">
                        <a href="{{ route('front.project') }}" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i> Projeleri Görüntüle</a>
                        <a href="{{ route('front.contact') }}" class="btn custom-btn custom-btn-bg custom-btn-link">İletişime geç</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 col-12">
                <div class="about-image svg">
                    <img src="{{ asset('front/images/undraw/drawing-gc55b833f1_1280.png') }} "class="img-fluid" alt="svg image">
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

