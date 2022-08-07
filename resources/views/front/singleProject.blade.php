@extends('front.layouts.master')
@section('title',$project->name)
@section('content')
    <section class="section pt-55 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 mb-20">
                    <!--Post-single-->
                    <div class="post-single">
                        <div class="post-single-image">
                            <img src="/storage/project/{{ $project->image }}" alt="">
                        </div>
                        <div class="post-single-content">
                            <a href="blog-grid.html" class="categorie">{{ $project->web_site }}</a>
                            <h4> {{ $project->name }} </h4>
                            <div class="post-single-info">
                                <ul class="list-inline">
                                    <li><a href="author.html"><img src="/storage/user/{{ $project->getUser->image }}" alt=""></a></li>
                                    <li><a href="author.html">David Smith</a> </li>
                                    <li class="dot"></li>
                                    <li>{{ $project->created_at->format('d-m-y') }}</li>
                                    <li class="dot"></li>
                                </ul>
                            </div>
                        </div>

                        <div class="post-single-body">
                            <p>
                                {!! $project->content  !!}

                            </p>

                        </div>



                    <!--next & previous-posts-->
                    <div class="row">
                        @if(isset($previous))
                        <div class="col-md-6">
                            <div class="widget">
                                <div class="widget-next-post">
                                    <div class="small-post">
                                        <div class="image">
                                            <a href="{{ route('front.singleProject',$previous->slug) }}">
                                                <img src="/storage/project/{{ $previous->image }}" alt="{{ $previous->name }}">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div>
                                                <a class="link" href="{{ route('front.singleProject',$previous->slug) }}">
                                                    <i class="arrow_left"></i>Önceki Proje</a>
                                            </div>
                                            <a href="{{ route('front.singleProject',$previous->slug) }}">{{ $previous->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(isset($next))
                        <div class="col-md-6">
                            <div class="widget">
                                <div class="widget-previous-post">
                                    <div class="small-post">
                                        <div class="image">
                                            <a href="{{ route('front.singleProject',$next->slug) }}">
                                                <img src="/storage/project/{{ $next->image }}" alt="{{ $next->name }}">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div>
                                                <a class="link" href="{{ route('front.singleProject',$next->slug) }}">
                                                    <span> Sonraki Proje</span>
                                                    <span class="arrow_right"></span>
                                                </a>
                                            </div>
                                            <a href="{{ route('front.singleProject',$next->slug) }}">{{ $next->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endif
                    </div>
                    <!--/-->


                </div>
            </div>
        </div>
    </section><!--/-->
@endsection
