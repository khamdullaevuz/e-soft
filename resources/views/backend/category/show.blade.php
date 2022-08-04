@extends('layouts.app')
@section('title', 'Postni ko\'rish - E-soft.uz')
@section('content')
<h2 class="text-center p-3">Ko'rish</h2>
<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <th>Nomi</th>
                <td>{{ $category->name }}</td>
            </tr>
        </table>
        <form action="{{ route('categories.destroy', ['category'=>$category->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <a href="{{ route('categories.edit', ['category'=>$category->id]) }}" class="btn btn-success">
                Tahrirlash
            </a>
            <button type="submit" class="btn btn-danger">
                O'chirish
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">
                Ortga
            </a>
        </form>
    </div>
</div>
@endsection