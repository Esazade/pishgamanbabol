@extends('layouts.back')
@section('content')
<div class="col-lg-12 card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
        لیست  درباره ما
    </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">عکس</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($aboutus as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><img src="{{ asset('front/image/aboutus/'.$item->image) }}" alt="" width="80px" height="50px"></td>
                    <td>
                        <a href="{{ route('aboutus.show', $item->id) }}"><button class="btn btn-info btn-sm">مشاهده </button></a>
                        <a href="{{ route('aboutus.edit', $item->id) }}"><button class="btn btn-primary btn-sm">ویرایش </button></a>
                        
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