@extends('layouts.front')
@section('content')

<div class="slider">
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
         @foreach($slider as $item)
          <div class="carousel-item active">
            <img src="{{ asset('front/image/slider/'.$item->image) }}" alt="" width="100%" height="100%">
          </div>
         @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">السابق</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">التالي</span>
        </button>
      </div>
    </div>

    <div class="links py-5" style="background-color: #2ecc71;">
        <div class="links-title text-center  py-5">
            <h2 class="fs-2 fw-bold  pb-3">لینک های مفید</h2>
            <p class="text-muted">دانش آموزان و اولیای گرامی می توانند با استفاده از لینک های زیر و حساب کاربری خود از امکانات ارائه شده استفاده نمایند</p>
        </div>
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col">
                  <a class="nav-link" href="{{ route('login') }}">
                    <img class="pb-3" src="{{ asset('front/image/login.png') }}" alt="">
                    <h5>سامانه آموزش الکترونیکی</h5>
                  </a>
                </div>
                <div class="col">
                    <img class="pb-3" src="{{ asset('front/image/student.png') }}" alt="">
                    <h5>ورود دانش آموزان</h5>
                </div>
                <div class="col">
                    <img class="pb-3" src="{{ asset('front/image/birthday.png') }}" alt="">
                    <h5>تولد امروز</h5>
                </div>
                <div class="col">
                    <img class="pb-3" src="{{ asset('front/image/game.png') }}" alt="">
                    <h5>بازی</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery">
        <div class="links-title text-center  py-5">
            <a class="link-dark text-decoration-none" href="{{ route('front.gallery') }}"><h2 class="fs-2 fw-bold  pb-3">گالری تصاویر</h2></a>
        </div>
        <div class="container">
          <div class="row align-items-center">
            <div class="col">
              <!-- Full-width images with number text -->
              @foreach($album as $item)
              <div class="mySlides">
                  <a href="{{ route('front.gallery') }}"><img src="{{ asset('front/image/gallery/'.$item->image) }}" ></a>
              </div>
              @endforeach

              <!-- Next and previous buttons -->
              <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a> -->

              <!-- Image text -->
              <div class="caption-container">
                <p id="caption"></p>
              </div>
            </div>
          </div>

          

          <!-- Thumbnail images -->
          <div class="row">
          <?php $counter=1; ?>
          @foreach($album as $item)
            <div class="column">
              <img class="demo cursor" src="{{ asset('front/image/gallery/'.$item->image) }}" style="width:100%" onclick="currentSlide('{{ $counter++ }}')" alt="{{ $item->title }}">
            </div>
          @endforeach
          </div>

      </div>
    </div>

    <div class="dayspeech">
      <div class="links-title text-center pt-5  py-4 ">
        <h2 class="fs-2 fw-bold  pt-3 ">سخن روز</h2>
      </div>
      <div class="container">
        <div class="row text-center mb-5 mh-100">
          <div class="col">
            <p class="text-muted mb-4">{{ $dialogue->description }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="library py-5">
      <div class="container py-5">
        <div class="row mb-2">
          <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">کتابخانه دیجیتال</strong>
                <p class="card-text mb-auto" style="text-align: justify;">یکی از بزرگ‌ترین و مهم‌ترین اهداف آموزش‌و‌پرورش در نظام
              جمهوری اسلامی ایران، رشد و شکوفایی استعداد‌ها و خلاقیت‌های دانش‌آموزان است و این امر مهم میسر نمی‌گردد،
              مگر اینکه کتابخانه‌ها در کلیه مدارس توسعه بیشتر بیابند</p>
                <a href="#" class="stretched-link">لیست کتاب ها</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <img src="{{ asset('front/image/library.png') }}" alt="دبستان غیردولتی پیشگامان-کتابخانه دیجیتال">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-success">آیا می دانید که ...</strong>
                <p class="mb-auto pt-4" style="text-align: justify;">{{ $information->description }}</p>
              </div>
              <div class="col-auto d-none d-lg-block">
                <img src="{{ asset('front/image/info.png') }}" alt="دبستان غیردولتی پیشگامان-کتابخانه دیجیتال">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="funder py-5">
      <div class="container">
        <div class="row featurette py-5">
          <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-3 py-2">پیام موسس</h2>
            <p class="lead" style="text-align: justify;">{{ $founder->description }}</p>
          </div>
          <div class="col-md-5">
            <img class="img-fluid rounded "  src="{{ asset('front/image/founder/'.$founder->image) }}" alt="پیام موسس">
          </div>
        </div>
      </div>
    </div>

    <div class="py-5">
      <div class="container">
        <div class="row py-5">
          <div class="col-md-2">
            <p>
              <span>
                <strong class="fs-3">متولدین ماه</strong>
              </span>
            </p>
            <img  src="{{ asset('front/image/birthday_pic.png') }}" alt=" متولدین روز">
          </div>
          <div class="col-md-10">
            <div class="card">
                <div class="card-body py-4" style="max-width: 58rem;">
                  <marquee>
                    <div class="card" style="width: 10rem;">
                      <img src="{{ asset('front/image/studentBirthday.jpg') }}" class="rounded card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text text-center">حسین صادقی</p>
                      </div>
                    </div>
                    <div class="card" style="width: 10rem;">
                      <img src="{{ asset('front/image/studentBirthday.jpg') }}" class="rounded card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text text-center">محسن رنجبر</p>
                      </div>
                    </div>
                    <div class="card" style="width: 10rem;">
                      <img src="{{ asset('front/image/studentBirthday.jpg') }}" class="rounded card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text text-center">رضا روستایی </p>
                      </div>
                    </div>
                  </marquee>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      let slideIndex = 1;
      showSlides(slideIndex);

      // Next/previous controls
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      // Thumbnail image controls
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("demo");
        let captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
      }
      

     
    </script>

@endsection