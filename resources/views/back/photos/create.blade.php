@extends('layouts.back')
@section('content')
<div class="col-lg-12 card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
         عکس
    </h3>
    <a class="btn btn-info float-right px-4" href="{{ route('album.photo.index',$gallery_id) }}">برگشت</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="needs-validation" action="{{ route('album.photo.store',$gallery_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txtname" class="form-label">عنوان</label>
              <input type="text" class="form-control" id="txtname" name="txtname" >
              <input type="hidden" class="form-control" id="txtgallery" name="txtgallery" value="{{ $gallery_id }}" >
            </div>
            <div class="col-4"></div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="formFile" class="form-label">عکس</label>
              <input class="form-control" type="file" id="formFile" name="formFile" aria-labelledby="imageHelpInline">
            </div>
            <div class="col-4">
                <span id="imageHelpInline" class="form-text">
                   عکس سایز 350*1000 باشد
                </span>
            </div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txtdescription" class="form-label">توضیحات </label>
              <textarea id="txtdescription" class="form-control" name="txtdescription" cols="40" rows="5"></textarea>
            </div>
            <div class="col-4"></div>
          </div>

          <div class="row g-3 my-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="chkstatus" name="chkstatus">
                <label class="form-check-label" for="chkstatus">وضعیت</label>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-25 btn btn-primary btn-lg" type="submit">ذخیره</button>
        </form>
    </div>
</div>
@endsection