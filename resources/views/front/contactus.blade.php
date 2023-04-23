@extends('layouts.front')
@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col">
        <h1 class="text-dark pb-3">تماس با ما</h1>
        <h4 class="mb-4">شما میتوانید از طریق راه های ارتباطی زیر با مدرسه پیشگامان در ارتباط باشید و همچنین نظرات و پیشنهادات خود را به سمع و نظر ما برسانید.</h4>
    </div>
  </div>
  <div class="row g-4 g-md-5 mt-0 mt-lg-3">
        <!-- Box item -->
        <div class="col-lg-4 mt-lg-0">
            <div class="card card-body shadow py-5 text-center h-100">
                <!-- Title -->
                <h5 class="mb-3">تلفن تماس</h5>
                <ul class="list-inline mb-0">
                    <!-- Phone number -->
                    <li class="list-item mb-3">
                        <a> 
                            <i class="fas fa-fw fa-phone-alt me-2"></i>
                            {{ $contactinfo->phone }}<br>
                            {{ $contactinfo->mobile }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Box item -->
        <div class="col-lg-4 mt-lg-0">
            <div class="card card-body bg-info shadow py-5 text-center h-100">
                <!-- Title -->
                <h5 class="text-white mb-3">آدرس</h5>
                <ul class="list-inline mb-0">
                    <!-- Address -->
                    <li class="list-item mb-3 h6 fw-light">
                        <a class="text-white" > 
                            <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>
                            {{ $contactinfo->address }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Box item -->
        <div class="col-lg-4 mt-lg-0">
            <div class="card card-body shadow py-5 text-center h-100">
                <!-- Title -->
                <h5 class="mb-3">پست الکترونیکی</h5>
                <ul class="list-inline mb-0">
                    <!-- Email id -->
                    <li class="list-item mb-0 h6 fw-light">
                        <a href="#"> <i class="far fa-fw fa-envelope me-2"></i>{{ $contactinfo->email }}</a>
                    </li>
                </ul>
            </div>
        </div>
  </div>
  <div class="row" style="padding-top: 3.5rem;">
    <div class="col-md-7">
        <form action="{{ route('front.contactus.store') }}" method="POST">
        {{ csrf_field() }}
            <h5 class="mt-4 mt-md-0 pb-4">شما می توانید نظرات، پیشنهادات و سوالات خود را از طریق فرم زیر با ما درمیان بگذارید</h5>  
            <!-- Name -->
            <div class="mb-4 bg-light-input">
                <label for="yourName" class="form-label">نام *</label>
                <input type="text" class="form-control form-control-lg" id="yourName" name="yourName" value="{{ old('name') }}" >
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <!-- Email -->
            <div class="mb-4 bg-light-input">
                <label for="emailInput" class="form-label">پست الکترونیکی *</label>
                <input type="email" class="form-control form-control-lg" id="emailInput" name="emailInput" value="{{ old('email') }}" >
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <!-- Message -->
            <div class="mb-4 bg-light-input">
                <label for="textareaBox" class="form-label">پیام شما *</label>
                <textarea id="textareaBox" class="form-control" name="textareaBox" rows="5">{{ old('message') }}</textarea>
                @if ($errors->has('message'))
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                @endif
            </div>
            <!-- Button -->
            <div class="d-grid">
                <button class="btn btn-lg btn-success  mb-0" type="submit">ارسال پیام</button>
            </div>
        </form>
    </div>
    <div class="col-md-5">
        <img src="{{ asset('front/image/contact.svg') }}" class="img-fluid"  alt="">
    </div>
  </div>
</div>



@endsection