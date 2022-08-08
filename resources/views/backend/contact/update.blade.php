@extends('backend.layouts.master')
@section('title','Yeni İletişim Sayfası Oluştur')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">İletişim Sayfası Güncelle</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form action=" " method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="">Kısa açıklama <sup>*</sup></label>
                    <textarea id="" class="form-control" rows="4"
                              name="page_content">{{ $contact->page_content }}</textarea>
                </div>
                <div class="form-group">
                    <img src="/storage/contact/{{ $contact->image}}" alt="" width="120" style="border-radius: 50%">
                    <hr>
                    <label for="">Fotoğraf <sup>*</sup></label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <button class="form-control btn btn-outline-primary">İletişim Sayfası Güncelle</button>
                </div>
            </form>
        </div>
    </div>



@endsection
