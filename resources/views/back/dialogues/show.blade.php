@extends('layouts.back')
@section('content')
<div class="col-lg-12 card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
         مشاهده سخن روز 
    </h3>
    <a class="btn btn-info float-right px-4" href="{{ route('dialogue.index') }}">برگشت</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <dl class="dl-horizontal">
        <dd>
            <b>عنوان</b>
            {{ $dialogue->title }}
        </dd>
        <hr>

        <dd>
            <b>توضیحات</b>
            {{ $dialogue->description }}
        </dd>
        <hr>

        <dd>
            <b>وضعیت</b>
            @if ($dialogue->status==1) {{'فعال'}} @else  {{'غیرفعال'}} @endif
        </dd>
    </dl>
    </div>
</div>
@endsection