@extends('layouts.front')
@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col">
        <h1 class="text-dark pb-3">تماس با ما</h1>
    </div>
  </div>
  <div class="row mt-3 mb-3">
    <div class="col">
        <img class="rounded mx-auto d-block" src="{{ asset('front/image/aboutus/'.$aboutus->image) }}" alt="">
    </div>
  </div>
  <div class="row mt-5 mb-3" style="padding-bottom: 40px">
    <div class="col">
        <p style="text-align: justify;" >{{ $aboutus->description }}</p>
    </div>
  </div>
</div>
@endsection