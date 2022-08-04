<div class="mb-3 pt-4">
    <label for="title" class="form-label">Sarlavha</label>
    <input type="text" class="form-control" id="title" aria-describedby="titleHelp" name="title" value="{{ old('title') ?? $post->title }}">
    @error('title')
    <div id="titleHelp" class="form-text">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Maqolaning qisqa matni</label>
    <textarea class="form-control" id="description" rows="3" aria-describedby="descriptionHelp" name="description">{{ old('description') ?? $post->description }}</textarea>
    @error('description')
    <div id="descriptionHelp" class="form-text">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="content" class="form-label">Maqola to'liq matni</label>
    <textarea class="form-control" id="content" rows="3" aria-describedby="contentHelp" name="content">{{ old('content') ?? $post->content }}</textarea>
    @error('content')
    <div id="contentHelp" class="form-text">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="title" class="form-label">Bo'lim</label>
    <select class="form-control form-select" aria-describedby="categoryHelp" name="category_id" value="{{ old('category_id') ?? $post->category_id }}">
        <option value="">Tanlang</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" @if(old('category_id')==$category->id or $post->category_id == $category->id) selected @endif>{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
    <div id="categoryHelp" class="form-text">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="exampleInputFile">Rasm</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="photo" id="exampleInputFile" aria-describedby="photoHelp">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        </div>
    </div>
    @error('photo')
    <div id="photoHelp" class="form-text">{{ $message }}</div>
    @enderror
</div>