@extends('layouts.front')
@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col">
        <h1 class="text-dark pb-3">گالری تصاویر</h1>
    </div>
  </div>
  <?php $counter=1; ?>
  <div class="row align-items-start mb-5 mt-3">
    @foreach($album as $item)
        <div class="col">
            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $counter }}">
                <img class="img-thumbnail rounded " src="{{ asset('front/image/gallery/'.$item->image) }}" alt="گالری تصاویر-دبستان غیرانتفاعی پیشگامان">
            </a>
        </div>

        <div class="modal fade" id="exampleModal{{ $counter }}" tabindex="-{{ $counter }}" aria-labelledby="exampleModalLabel{{ $counter }}" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img class="rounded img-fluid" src="{{ asset('front/image/gallery/'.$item->image) }}" alt="گالری تصاویر-دبستان غیرانتفاعی پیشگامان">
                    </div>
                </div>
            </div>
        </div>
    <?php ++$counter; ?>
    @endforeach
  </div>
</div>
@endsection