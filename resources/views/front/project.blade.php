@extends('front.layouts.master')
@section('title','Projeler')
@section('content')
<!-- PROJECTS

<section class="project py-5" id="project">
    <div class="container">

        <div class="row">
            <div class="col-lg-11 text-center mx-auto col-12">
                <div class="col-lg-8 mx-auto">
                    <h2>Things I have designed for digital media agencies</h2>
                </div>

                <div class="owl-carousel owl-theme">
                    @foreach($projects as $project)


                        <div class="item">
                        <div class="project-info">
                            <a href="{{ route('front.singleProject',$project->slug) }}"> <img src="{{ asset('front/images/project/project-image02.png') }}" class="img-fluid" alt="project image"></a>
                        </div>

                    </div>


                    @endforeach



                </div>

            </div>
        </div>

    </div>
</section>
-->
<!--blog-grid-->
<section class="blog-grid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mt-30">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Post-1-->
                        @foreach($projects as $project)
                        <div class="post-card">
                            <div class="post-card-image">
                                <a href="{{ route('front.singleProject',$project->slug) }}">
                                    <img src="{{ asset('front/images/project/project-image02.png') }}" alt="">
                                </a>
                            </div>
                            <div class="post-card-content">
                                <a href="{{ $project->web_site }}" class="categorie">{{ $project->web_site }}</a>
                                <h5>
                                    <a href="{{ route('front.singleProject',$project->slug) }}">{{ $project->name }}</a>
                                </h5>
                                <p>
                                    {!! Str::limit($project->content,255) !!}
                                </p>
                                <div class="post-card-info">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="author.html">
                                                <img src="{{ asset('https://picsum.photos/200') }}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="author.html">David Smith</a>
                                        </li>
                                        <li class="dot"></li>
                                        <li>{{ $project->created_at->format('d-m-y') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <!--/-->
                    </div>



                    <!--pagination-->
                </div>
            </div>
            <div class="col-lg-4 max-width">


                @include('front.layouts.inc.latestProjectWidget')

            </div>
        </div>
    </div>
</section><!--/-->
@endsection
