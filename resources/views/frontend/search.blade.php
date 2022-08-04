@extends('layouts.frontend')
@section('title','E-soft.uz')
@section('type', 'website')
@section('description', 'Dasturlashni o\'rganamiz')
@section('content')
@if($posts)
<h5 class="mt-2 pb-2">{{ request()->input('q') }} bo'yicha topilgan ma'lumotlar</h5>
<div class="row row-cols-1 row-cols-md-2 g-4">
  @forelse($posts as $post)
  <div class="col">
    <div class="card shadow-sm" data-aos="zoom-in" data-aos-duration="1000">
      <a href="{{ url('/'.$post->url) }}" class="text-decoration-none"><img src="/uploads/{{ $post->photo }}" class="card-img-top" alt="{{ $post->title }}"></a>
      <div class="card-body">
        <a href="{{ url('/'.$post->url) }}" class="text-decoration-none">
          <h5 class="card-title">{{ $post->title }}</h5>
        </a>
        <p class="card-text">{!! $post->description !!}</p>
      </div>
    </div>
  </div>
  @empty
  <h6 style="margin-top: 2rem;">Hech narsa topilmadi</h6>
  @endforelse
</div>
@else
  <h6 style="margin-top: 2rem;">Hech narsa topilmadi</h6>
@endif
@if($posts)
<div class="mt-4 mb-2">
    <div class="pagination text-center">
    @if(!empty($prevUrl))<a class="btn btn-outline-primary leftbtn m-1" href="?q={{request()->input('q')}}&page={{$prevUrl}}"><i class="bi bi-arrow-left" aria-hidden="true"></i> Avvalgi sahifa</a>@endif
    @if(!empty($nextUrl))<a class="btn btn-outline-primary rightbtn m-1" href="?q={{request()->input('q')}}&page={{$nextUrl}}">Keyingi sahifa <i class="bi bi-arrow-right" aria-hidden="true"></i> </a>@endif
  </div>
</div>
@endif
@endsection