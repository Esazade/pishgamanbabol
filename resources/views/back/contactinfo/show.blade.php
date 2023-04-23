@extends('layouts.back')
@section('content')
<div class="col-lg-12 card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
         مشاهده اطلاعات تماس 
    </h3>
    <a class="btn btn-info float-right px-4" href="{{ route('contactinfo.index') }}">برگشت</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <dl class="dl-horizontal">
        <dd>
            <b>تلفن</b>
            {{ $contactinfo->phone }}
        </dd>
        <hr>

        <dd>
            <b>تلفن همراه</b>
            {{ $contactinfo->mobile }}
        </dd>
        <hr>

        <dd>
            <b>پست الکترونیکی</b>
            {{ $contactinfo->email }}
        </dd>
        <hr>

        <dd>
            <b>آدرس</b>
            {{ $contactinfo->address }}
        </dd>
        <hr>

        <dd>
            <b>آدرس نقشه گوگل</b>
            {{ $contactinfo->googlemap }}
        </dd>
        <hr>

        <dd>
            <b>اینستا</b>
            {{ $contactinfo->insta }}
        </dd>
        <hr>

        <dd>
            <b>واتساپ</b>
            {{ $contactinfo->whatsapp }}
        </dd>
        <hr>

        <dd>
            <b>تلگرام</b>
            {{ $contactinfo->telegram }}
        </dd>
        <hr>

        <dd>
            <b>آی گپ</b>
            {{ $contactinfo->igap }}
        </dd>
        <hr>

        <dd>
            <b>ایتا</b>
            {{ $contactinfo->eita }}
        </dd>
        <hr>
    </dl>
    </div>
</div>
@endsection