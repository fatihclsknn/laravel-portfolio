@extends('front.layouts.master')
@section('title','Özgecmiş')
@section('content')
<!-- FEATURES -->
<section class="resume py-5 d-lg-flex justify-content-center align-items-center" id="resume">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12">
                <h2 class="mb-4">Experiences</h2>

                <div class="timeline">
                    @foreach($resumes as $resume)
                        @if($resume->experiences_or_education == 0)
                    <div class="timeline-wrapper">
                        <div class="timeline-yr">
                            <span>{{ $resume->job_year }}</span>
                        </div>
                        <div class="timeline-info">
                            <h3><span>{{ $resume->job_title }}</span><small>{{ $resume->company_name }}</small></h3>
                            <p>{{ $resume->description }}</p>
                        </div>
                    </div>

                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <h2 class="mb-4 mobile-mt-2">Educations</h2>

                <div class="timeline">
                    @foreach($resumes as $resume )
                        @if($resume -> experiences_or_education == 1)
                    <div class="timeline-wrapper">
                        <div class="timeline-yr">
                            <span>{{ $resume->job_year }}</span>
                        </div>
                        <div class="timeline-info">
                            <h3><span>{{ $resume->job_title }}</span><small>{{ $resume->company_name }}</small></h3>
                            <p>{{ $resume->description }}</p>
                        </div>
                    </div>


                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
