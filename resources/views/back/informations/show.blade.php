@extends('layouts.back')
@section('content')
<div class="col-lg-12 card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
         مشاهده دانستنی 
    </h3>
    <a class="btn btn-info float-right px-4" href="{{ route('information.index') }}">برگشت</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <dl class="dl-horizontal">
        <dd>
            <b>عنوان</b>
            {{ $information->title }}
        </dd>
        <hr>

        <dd>
            <b>عکس</b>
            <img src="{{ asset('front/image/information/'.$information->image) }}" alt="slider" style="max-width:150px;height:150px;" >
        </dd>
        <hr>

        <dd>
            <b>توضیحات</b>
            {{ $information->description }}
        </dd>
        <hr>

        <dd>
            <b>وضعیت</b>
            @if ($information->status==1) {{'فعال'}} @else  {{'غیرفعال'}} @endif
        </dd>
    </dl>
    </div>
</div>
@endsection