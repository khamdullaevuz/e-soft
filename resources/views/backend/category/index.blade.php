@extends('layouts.app')

@section('title', 'Bo\'limlar ro\'yxati - E-soft.uz')

@section('content')
<h2 class="text-center p-3">Bo'limlar</h2>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{ route('categories.create') }}">
        <button class="btn btn-outline-success" type="button">Bo'lim qo'shish</button>
    </a>
</div>
<div class="mt-4"></div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>T/r</th>
            <th>Nomi</th>
            <th>Amallar</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
        <tr>
            <td>{{ (($categories->currentpage()-1) * $categories->perpage() + ($loop->index+1)) }}</td>
            <td><a href="{{ url('/category').'/'.$category->url }}" target="_blank" class="text-decoration-none">{{ $category->name }}</a></td>
            <td>
                <form action="{{ route('categories.destroy', ['category'=>$category->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('categories.show', ['category'=>$category->id]) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('categories.edit', ['category'=>$category->id]) }}" class="btn btn-success btn-sm">
                        <i class="far fa-edit"></i>
                    </a>
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td></td>
            <td>Hech narsa topilmadi</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $categories->links() }}
@endsection