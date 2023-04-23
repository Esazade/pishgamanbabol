<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css'); }}"   >
    <link rel="stylesheet" href="{{ asset('front/css/carousel.rtl.css'); }}"  >
    <link rel="stylesheet" href="{{ asset('front/css/style.css'); }}"  >
    <link rel="shortcut icon" href="{{ asset('front/image/pishgaman.ico'); }}" />
    <title>دبستان غیردولتی پیشگامان</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-4">
        <div class="container">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <img src="{{ asset('front/image/logo.png') }}" alt="مدرسه غیردولتی پیشگامان" style="height: 40px;">
            <a class="navbar-brand" href="{{ route('front.home') }}">دبستان غیردولتی پسرانه پیشگامان</a>
            <div class="collapse navbar-collapse px-5" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('front.home') }}">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">افتخارات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.contactus') }}">تماس با ما</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.aboutus') }}">درباره ما</a>
                </li>
            </ul>
            </div>
            
        </div>
    </nav>

    @yield('content')

    <footer class="container-fluid py-5 bg-black" style="margin-bottom: -50%;color: white;">
      <div class="row">
        <div class="col-3 col-md ps-5">
          <h5 class="footer-title">درباره مدرسه</h5>
          <p style="text-align: justify;">{{ $aboutus->description }}</p>
        </div>
        <div class="col-6 col-md mb-2" >
          <h5 class="footer-title">آدرس مدرسه</h5>
          <p class="text-justify">{{ $contactinfo->address }}</p>
          <iframe class="img-fluid" src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d801.377053766591!2d52.686784420281704!3d36.54185723715455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3f8f89cc80a7093b%3A0x6f1237e0319de2ed!2sBesat%206%2C%20Mazandaran%20Province%2C%20Babol%2C%20Iran!3m2!1d36.541981!2d52.6871976!5e0!3m2!1sen!2s!4v1663007757071!5m2!1sen!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-3 col-md">
          <h5 class="footer-title">اطلاعات تماس</h5>
          <p class="text-justify">تلفن : {{ $contactinfo->phone }}</p>
          <p class="text-justify">تلفن: {{ $contactinfo->mobile }}</p>
          <h5 class=" pt-4">ما را در شبکه های اجتماعی مدرسه دنبال کنید</h1>
          <a href="{{ $contactinfo->insta }}">
            <img class="img-fluid" src="{{ asset('front/image/instagram.png') }}" alt="مدرسه غیردولتی پیشگامان">
          </a>
          <a href="{{ $contactinfo->whatsapp }}">
            <img class="img-fluid" src="{{ asset('front/image/Whatsapp.png') }}" alt="مدرسه غیردولتی پیشگامان">
          </a>
          <a href="{{ $contactinfo->telegram }}">
            <img class="img-fluid" src="{{ asset('front/image/telegram.png') }}" alt="مدرسه غیردولتی پیشگامان">
          </a>
        </div>
      </div>
    </footer>
    

    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}" ></script>

    
</body>
</html>