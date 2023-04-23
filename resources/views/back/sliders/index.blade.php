@extends('layouts.back')
@section('content')
<div class="col-lg-12 card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
        لیست اسلایدرها
    </h3>
    <a class="btn btn-primary float-right" href="{{ route('slider.create') }}"><i class="fas fa-plus"></i> افزودن مورد جدید</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام</th>
                    <th scope="col">عکس</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($sliders as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $item->name }}</td>
                    <td><img src="{{ asset('front/image/slider/'.$item->image) }}" alt="" width="80px" height="50px"></td>
                    <td>
                        @if ($item->status==1) <span class='badge badge-success'>فعال</span> 
                        @else <span class='badge badge-warning'>غیرفعال</span> 
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('slider.show', $item->id) }}"><button class="btn btn-info btn-sm">مشاهده </button></a>
                        <a href="{{ route('slider.edit', $item->id) }}"><button class="btn btn-primary btn-sm">ویرایش </button></a>
                        <form method="post" action="{{route('slider.destroy',$item->id)}}" accept-charset="UTF-8" style="display:inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا از حذف  خود مطمئن هستید؟')">حذف</button>
                        </form>
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