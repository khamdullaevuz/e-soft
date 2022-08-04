@extends('layouts.frontend')
@section('title'){{ $post->title }}@endsection
@section('description'){{$post->description}}@endsection
@section('type', 'article')
@section('image'){{ config('app.url', 'https://khamdullaev.uz') . '/uploads/' . $post->photo}}@endsection
@section('date'){{ strtotime($post->created_at) }}@endsection
@section('content')
<nav aria-label="breadcrumb m-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Bosh sahifa</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/category/'.$post->category->url) }}" class="text-decoration-none">{{ $post->category->name }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
    </ol>
</nav>
<div class="card shadow-sm" data-aos="fade-up" data-aos-duration="1000">
    <div id="cover"><img src="/uploads/{{ $post->photo }}" class="card-img-top" alt="{{ $post->title }}"></div>
    <div class="card-body">
        <h3 class="card-title">{{ $post->title }}</h3>
        <p><i class="bi bi-folder"></i> <a href="{{ url('/category/'.$post->category->url) }}" class="text-decoration-none">{{ $post->category->name }}</a> | <i class="bi bi-eye"></i> {{ $post->viewcount }} | <i class="bi bi-calendar"> {{ $post->created_at }}</i></p>
        <p class="card-text"><div id="content">{!! $post->content !!}</div></p>
        <script async src="https://comments.app/js/widget.js?3" data-comments-app-website="3cB7SrGZ" data-limit="5" data-colorful="1" data-dark="1"></script>
        <p>Doʻstlarga ulashish:</p>
         <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="https://e-soft.uz/post/{{ $post->url }}" data-a2a-title="{{ $post->description }}">
          <a class="a2a_button_telegram"></a>
         <a class="a2a_button_facebook"></a>
         <a class="a2a_button_email"></a>
         <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
        </div>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
    </div>
</div>
<div class="mt-4 mb-2">
    @if(!empty($previous))<a class="btn btn-outline-primary leftbtn m-1" href="/{{$previous->url}}"><i class="bi bi-arrow-left" aria-hidden="true"></i> Avvalgi dars</a>@endif
    @if(!empty($next))<a class="btn btn-outline-primary rightbtn m-1" href="/{{$next->url}}">Keyingi dars <i class="bi bi-arrow-right" aria-hidden="true"></i> </a>@endif
</div>
@endsection