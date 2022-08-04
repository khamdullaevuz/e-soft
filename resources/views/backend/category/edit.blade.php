@extends('layouts.app')
@section('title', 'Postni tahrirlash - E-soft.uz')
@section('content')
<form method="post" action="{{ route('categories.update', ['category'=>$category->id]) }}">
    @method('PUT')
    @csrf
    @include('backend.category.form')
    <button class="btn btn-primary" type="submit">Saqlash</button>
    <a href="{{ route('categories.index') }}"><button type="button" class="btn btn-danger">Bekor qilish</button></a>
</form>
@endsection