@extends('layouts.back')
@section('content')
<div class="col-lg-12 card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
         ویرایش اطلاعات تماس
    </h3>
    <a class="btn btn-info float-right px-4" href="{{ route('contactinfo.index') }}">برگشت</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="needs-validation" action="{{ route('contactinfo.update',$contactinfo->id) }}" method="POST" >
            @csrf
            @method('PUT')
          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txtphone" class="form-label">تلفن</label>
              <input type="text" class="form-control" id="txtphone" name="txtphone" value="{{ $contactinfo->phone }}" >
            </div>
            <div class="col-4"></div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txtmobile" class="form-label">تلفن همراه</label>
              <input type="text" class="form-control" id="txtmobile" name="txtmobile" value="{{ $contactinfo->mobile }}" >
            </div>
            <div class="col-4"></div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txtemail" class="form-label">پست الکترونیکی</label>
              <input type="email" class="form-control" id="txtemail" name="txtemail" value="{{ $contactinfo->email }}" >
            </div>
            <div class="col-4"></div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txtaddress" class="form-label">آدرس  </label>
              <input type="text" class="form-control" id="txtaddress" name="txtaddress" value="{{ $contactinfo->address }}" >
            </div>
            <div class="col-4"></div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txtgoogle" class="form-label">آدرس نقشه گوگل</label>
              <input type="text" class="form-control" id="txtgoogle" name="txtgoogle" value="{{ $contactinfo->googlemap }}" >
            </div>
            <div class="col-4"></div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txtinsta" class="form-label">اینستا</label>
              <input type="text" class="form-control" id="txtinsta" name="txtinsta" value="{{ $contactinfo->insta }}" >
            </div>
            <div class="col-4"></div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txtwhatsapp" class="form-label">واتساپ</label>
              <input type="text" class="form-control" id="txtwhatsapp" name="txtwhatsapp" value="{{ $contactinfo->whatsapp }}" >
            </div>
            <div class="col-4"></div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txttelegram" class="form-label">تلگرام</label>
              <input type="text" class="form-control" id="txttelegram" name="txttelegram" value="{{ $contactinfo->telegram }}" >
            </div>
            <div class="col-4"></div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txtigap" class="form-label">آی گپ</label>
              <input type="text" class="form-control" id="txtigap" name="txtigap" value="{{ $contactinfo->igap }}" >
            </div>
            <div class="col-4"></div>
          </div>

          <div class="row g-3 my-3">
            <div class="col-8">
              <label for="txteita" class="form-label">ایتا</label>
              <input type="text" class="form-control" id="txteita" name="txteita" value="{{ $contactinfo->eita }}" >
            </div>
            <div class="col-4"></div>
          </div>

          <hr class="my-4">

          <button class="w-25 btn btn-primary btn-lg" type="submit">ذخیره</button>
        </form>
    </div>
</div>
@endsection