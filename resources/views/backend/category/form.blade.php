<div class="mb-3 pt-4">
    <label for="name" class="form-label">Sarlavha</label>
    <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name" value="{{ old('name') ?? $category->name }}">
    @error('name')
    <div id="nameHelp" class="form-text">{{ $message }}</div>
    @enderror
</div>