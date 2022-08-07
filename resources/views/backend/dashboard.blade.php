@extends('backend.layouts.master')
@section('title','Ana Sayfa')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Toplam Yazı Sayısı
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Toplam Kategori
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tags fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                 style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row ">

            <div class="card shadow col-md-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kullanıcı Bilgileri</h6>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">İsim<sup>*</sup></label>
                            <input type="text" value="{{ auth()->user()->name}}" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label for="">Soyisim<sup>*</sup></label>
                            <input type="text" class="form-control" value="{{ auth()->user()->lastname}}"
                                   name="lastname">
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->email}}" name="email"
                                   disabled>
                        </div>
                      <div class="form-group">
                            <img src="/storage/user/{{ auth()->user()->image}}" alt="" width="120" style="border-radius: 50%">
                            <hr>
                            <label for="">Fotoğraf <sup>*</sup></label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Title </label>
                                    <input type="text" value="{{ auth()->user()->title }}" class="form-control"
                                           name="title">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Linkedin </label>
                                    <input type="text" value="{{ auth()->user()->linkedin }}" class="form-control"
                                           name="linkedin">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Github</label>
                                    <input type="text" value="{{ auth()->user()->github }}" class="form-control"
                                           name="github">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="">Hakkınızda Kısa bilgi <sup>*</sup></label>
                            <textarea id="summernote" class="form-control" rows="4"
                                      name="description">{{ auth()->user()->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="form-control btn btn-outline-primary">Bilgileri Güncelle.</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
