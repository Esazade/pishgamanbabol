@extends('layouts.back')
@section('content')
<div class="col-lg-12 card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
         ویرایش  درباره ما
    </h3>
    <a class="btn btn-info float-right px-4" href="{{ route('aboutus.index') }}">برگشت</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="needs-validation" action="{{ route('aboutus.update',$aboutus->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="formFile" class="form-label">عکس</label>
              <input class="form-control" type="file" id="formFile" name="formFile" aria-labelledby="imageHelpInline">
            </div>
            <div class="col-4">
                <span><img src="{{ asset('front/image/aboutus/'.$aboutus->image) }}" alt="" width="80px" height="80px"></span>
            </div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txtdescription" class="form-label">توضیحات </label>
              <textarea id="txtdescription" class="form-control" name="txtdescription" cols="40" rows="5">{{ $aboutus->description }}</textarea>
            </div>
            <div class="col-4"></div>
          </div>

          <hr class="my-4">

          <button class="w-25 btn btn-primary btn-lg" type="submit">ذخیره</button>
        </form>
    </div>
</div>
@endsection