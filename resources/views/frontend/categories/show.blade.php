@extends('layouts.frontend')
@section('title'){{ $category->name  . ' bo\'limi'}}@endsection
@section('description'){{ $category->name.' bo\'limida mavjud maqolalar ro\'yxati'}}@endsection
@section('type', 'website')
@section('content')
<nav aria-label="breadcrumb m-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Bosh sahifa</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
  </ol>
</nav>
<div class="row row-cols-1 row-cols-md-2 g-4">
  @forelse($posts as $post)
  <div class="col">
    <div class="card shadow-sm" data-aos="zoom-in" data-aos-duration="1000">
      <a href="{{ url('/'.$post->url) }}" class="text-decoration-none img-link"><img src="/uploads/{{ $post->photo }}" class="card-img-top" alt="{{ $post->title }}"></a>
      <div class="card-body">
        <a href="{{ url('/'.$post->url) }}" class="text-decoration-none">
          <h5 class="card-title">{{ $post->title }}</h5>
        </a>
        <p class="card-text">{!! $post->description !!}</p>
      </div>
    </div>
  </div>
  @empty
  <h6>Hech narsa topilmadi</h6>
  @endforelse
</div>
<div class="mt-4 mb-2">
    <div class="pagination text-center">
    @if(!empty($prevUrl))<a class="btn btn-outline-primary leftbtn m-1" href="/page/{{$prevUrl}}"><i class="bi bi-arrow-left" aria-hidden="true"></i> Avvalgi sahifa</a>@endif
    @if(!empty($nextUrl))<a class="btn btn-outline-primary rightbtn m-1" href="/page/{{$nextUrl}}">Keyingi sahifa <i class="bi bi-arrow-right" aria-hidden="true"></i> </a>@endif
  </div>
</div>
@endsection
