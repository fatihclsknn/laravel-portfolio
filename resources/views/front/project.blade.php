@extends('front.layouts.master')
@section('title','Projeler')
@section('content')
<!-- PROJECTS -->
<section class="project py-5" id="project">
    <div class="container">

        <div class="row">
            <div class="col-lg-11 text-center mx-auto col-12">

                <div class="col-lg-8 mx-auto">
                    <h2>Things I have designed for digital media agencies</h2>
                </div>

                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="project-info">
                            <img src="{{asset('front/images/project/project-image01.png')}}" class="img-fluid" alt="project image">

                        </div>

                    </div>

                    <div class="item">
                        <div class="project-info">
                            <img src="{{asset('front/images/project/project-image02.png')}}" class="img-fluid" alt="project image">
                        </div>
                    </div>

                    <div class="item">
                        <div class="project-info">
                            <img src="{{ asset('front/images/project/project-image03.png') }}" class="img-fluid" alt="project image">
                        </div>
                    </div>

                    <div class="item">
                        <div class="project-info">
                            <img src="{{ asset('front/images/project/project-image04.png') }}" class="img-fluid" alt="project image">
                        </div>
                    </div>

                    <div class="item">
                        <div class="project-info">
                            <img src="{{ asset('front/images/project/project-image05.png') }}" class="img-fluid" alt="project image">
                        </div>
                    </div>

                </div>
                <div class="custom-btn-group mt-4">
                    <a href="{{ route('front.singleProject','sdsds') }}" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i> Proje Detayını görüntüle</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
