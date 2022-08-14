@extends('backend.layouts.master')
@section('title','Ayarlar')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ayarlar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('admin.config.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <img src="/storage/logo/{{  $config->logo}}" width="100" alt="">
                    <br>
                    <label for="">Logo</label>
                    <input type="file" class="form-control" name="logo" >
                </div>
                <div class="form-group">
                    <label for="">instagram</label>
                    <input type="text" class="form-control" name="github" value="{{ $config->github }}">
                </div>
                <div class="form-group">
                    <label for="">Linledin</label>
                    <input type="text" class="form-control" name="linkedin" value="{{ $config->linkedin }}">
                </div>

                    <div class="form-group">
                        <label for="">Site Akftiflik Durumu</label>
                        <select name="active" class="form-control">
                            <option  @if($config->active == 1) selected @endif   value="1">Açık</option>
                            <option @if($config->active == 0 ) selected @endif value="0">Kapalı</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-outline-primary">Ayarları Güncelle.</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

