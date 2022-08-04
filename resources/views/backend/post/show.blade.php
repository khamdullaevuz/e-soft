@extends('layouts.app')
@section('title', 'Postni ko\'rish - E-soft.uz')
@section('content')
<h2 class="text-center p-3">Ko'rish</h2>
<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <th>Sarlavha</th>
                <td>{{ $post->title }}</td>
            </tr>
            <tr>
                <th>Rasm</th>
                <td><img src="/uploads/{{ $post->photo }}" alt="{{ $post->title }}" class="img-fluid" width="120px" height="80px"></td>
            </tr>
            <tr>
                <th>Bo'lim</th>
                <td>{{ $post->category->name }}</td>
            </tr>
            <tr>
                <th>Qo'shilgan vaqti</th>
                <td>{{ $post->created_at }}</td>
            </tr>
            <tr>
                <th>Maqola qisqa matni</th>
                <td>{!! $post->description !!}</td>
            </tr>
            <tr>
                <th>Maqola to'liq matni</th>
                <td>{!! $post->content !!}</td>
            </tr>
        </table>
        <form action="{{ route('posts.destroy', ['post'=>$post->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <a href="{{ route('posts.edit', ['post'=>$post->id]) }}" class="btn btn-success">
                Tahrirlash
            </a>
            <button type="submit" class="btn btn-danger">
                O'chirish
            </button>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">
                Ortga
            </a>
        </form>
    </div>
</div>
@endsection