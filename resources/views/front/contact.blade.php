@extends('front.layouts.master')
@section('title','İletisim')
@section('content')
<!-- CONTACT -->
<section class="contact py-5" id="contact">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 mr-lg-5 col-12">
                @include('front.layouts.inc.latestProjectWidget')
            </div>

            <div class="col-lg-6 col-12">
                <div class="contact-form">
                    <h5 class="mb-4">{{ $contact->page_content }}</h5>

                    <form action="{{ route('front.contact') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" id="name">
                            </div>
                            <div class="col-lg-6 col-12">
                                <input type="email" class="form-control" name="email" placeholder="Email" id="email">
                            </div>
                            <div class="col-lg-12 col-12">
                                <input type="text" class="form-control" name="subject" placeholder="Konu" id="subject">
                            </div>
                            <div class="col-12">
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Message"></textarea>
                            </div>

                            <div class="ml-lg-auto col-lg-5 col-12">
                                <input type="submit" class="form-control submit-btn" value="Send Button">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
