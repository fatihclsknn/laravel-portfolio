@extends('backend.layouts.master')
@section('title','Kullanıcı Güncelle')
@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kategori Güncelle</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('kullanici.update',$user->id) }}" method="POST" enctype="multipart/form-data" >
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for=""> Ad</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="">Mail</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="">Rol</label>
                    <select name="role" id="role" class="form-control">
                        @foreach($roles as $role)
                            <option   value="{{ $role->name }}" {{ $user->hasRole($role->name)  ? 'selected' : ' '}} >
                                {{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>



                <div class="form-group">
                     <button class="form-control btn btn-outline-primary">Kullanıcı Güncellle</button>
                </div>
            </form>
        </div>
    </div>



@endsection
