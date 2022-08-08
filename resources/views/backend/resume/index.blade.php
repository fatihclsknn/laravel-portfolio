@extends('backend.layouts.master')
@section('title','Öz geçmiş')
@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tüm Öz geçmiş</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>İş</th>
                        <th>Şirket İsmi</th>
                        <th>Açıklama</th>
                        <th>Yazar</th>
                        <th>Tarih</th>
                        <th>Eğitim or İş</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($resumes as $resume)
                        <tr>
                            <td>{{ $resume->id }}</td>
                            <td>{{ $resume->job_title }}</td>
                            <td>{{ $resume->company_name }}</td>
                            <td> {{ $resume->description }}</td>
                            <td>{{ $resume->getUser->name }}</td>
                            <td>{{($resume->job_year)}}</td>

                            <td>
                                <input class="switch" project-id="{{ $resume->id }}" type="checkbox" data-on="Eğitim" data-off="İş"  data-offstyle="danger" data-onstyle="success" @if($resume->experiences_or_education==1) checked @endif data-toggle="toggle">

                            </td>
                            <td >
                                <a href="{{ route('front.resume') }}" class="btn btn-outline-success form-control mb-1"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('resume.edit',$resume->id) }}"   class="btn btn-outline-secondary form-control mb-1"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('resume.destroy',$resume->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button href="" class="btn btn-outline-danger form-control"><i class="fa fa-times"></i></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                <div class="form-group float-right">
                    {{ $resumes->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function (){
            $('.switch').change(function (){
                id= $(this)[0].getAttribute('project-id');
                statu=$(this).prop('checked');
                $.get("{{ route('admin.resume.status') }}",{ id:id,statu:statu},function (data,status){});
            })

        })
    </script>
@endsection
