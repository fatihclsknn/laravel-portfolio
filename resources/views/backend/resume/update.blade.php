@extends('backend.layouts.master')
@section('title','Yeni Özgeçmiş Oluştur')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Öz Geçmiş Güncelle</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form action=" {{ route('resume.update',$resume->id) }}" method="POST" enctype="multipart/form-data" >
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">İş Başlığı(örnek:Backend Developer)</label>
                    <input type="text" class="form-control" name="job_title" value="{{ $resume->job_title }}">
                </div>
                <div class="form-group">
                    <label for="">Şirket | Okul İsmi(Örnek:Koç Holding)</label>
                    <input type="text" class="form-control" name="company_name" value="{{ $resume->company_name }}">
                </div>
                <div class="form-group">
                    <label for="">Kısa açıklama <sup>*</sup></label>
                    <textarea id="" class="form-control" rows="4"
                              name="description">{{ $resume->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">İş/Eğitim başlama tarihi(Örnek:1999)</label>
                    <input type="number"  min="1970" max="2099" step="1" class="form-control" name="job_year" value="{{ $resume->job_year }}">
                </div>
                <div class="form-group">
                    <label >İş/Eğitim</label>
                    <select name="experiences_or_education" class="form-control">
                            <option @if($resume->experiences_or_education == '0') SELECTED @endif() value="0">İş</option>
                             <option @if($resume->experiences_or_education == '1') SELECTED @endif()  value="1">Eğitim</option>
                    </select>
                </div>



                <div class="form-group">
                    <button class="form-control btn btn-outline-primary">Öz geçmiş Güncelle</button>
                </div>
            </form>
        </div>
    </div>



@endsection
