@extends('layouts.back')
@section('content')
<div class="col-lg-12 card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
         اسلایدر جدید
    </h3>
    <a class="btn btn-info float-right px-4" href="{{ route('slider.index') }}">برگشت</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="needs-validation" action="{{ route('slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txtname" class="form-label">عنوان</label>
              <input type="text" class="form-control" id="txtname" name="txtname" value="{{ $slider->name }}">
            </div>
            <div class="col-4"></div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="formFile" class="form-label">عکس</label>
              <input class="form-control" type="file" id="formFile" name="formFile" aria-labelledby="imageHelpInline">
            </div>
            <div class="col-4">
                <span><img src="{{ asset('front/image/slider/'.$slider->image) }}" alt="" width="80px" height="80px"></span>
            </div>
          </div>

          <div class="row g-3 my-3">
            <div class="form-check">
             @if ($slider->status==1)
                <input type="checkbox" class="form-check-input" id="chkstatus" name="chkstatus" checked>
             @else
                <input type="checkbox" class="form-check-input" id="chkstatus" name="chkstatus">
             @endif
                <label class="form-check-label" for="chkstatus">وضعیت</label>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-25 btn btn-primary btn-lg" type="submit">ذخیره</button>

        </form>
    </div>
</div>
@endsection