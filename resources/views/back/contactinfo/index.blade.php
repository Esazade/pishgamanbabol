@extends('layouts.back')
@section('content')
<div class="col-lg-12 card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
        لیست  اطلاعات تماس
    </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">تلفن</th>
                    <th scope="col">تلفن همراه</th>
                    <th scope="col">اینستا</th>
                    <th scope="col">تلگرام</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($contactinfo as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->mobile }}</td>
                    <td>{{ $item->insta }}</td>
                    <td>{{ $item->telegram }}</td>
                    <td>
                        <a href="{{ route('contactinfo.show', $item->id) }}"><button class="btn btn-info btn-sm">مشاهده </button></a>
                        <a href="{{ route('contactinfo.edit', $item->id) }}"><button class="btn btn-primary btn-sm">ویرایش </button></a>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
    
    </div>
</div>
@endsection