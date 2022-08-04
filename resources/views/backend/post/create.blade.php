@extends('layouts.app')
@section('title', 'Post yaratish - E-soft.uz')
@section('content')
<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('backend.post.form')
    <button class="btn btn-primary" type="submit">Saqlash</button>
    <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-danger">Bekor qilish</button></a>
</form>
@endsection
@section('tinyconf')
<script src="/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        image_class_list: [{
            title: 'img-fluid',
            value: 'img-fluid'
        }, ],
        height: 500,
        setup: function(editor) {
            editor.on('init change', function() {
                editor.save();
            });
        },
        codesample_languages: [
            {text: 'HTML/XML', value: 'markup'},
            {text: 'JavaScript', value: 'javascript'},
            {text: 'CSS', value: 'css'},
            {text: 'PHP', value: 'php'},
            {text: 'Ruby', value: 'ruby'},
            {text: 'Python', value: 'python'},
            {text: 'Java', value: 'java'},
            {text: 'C', value: 'c'},
            {text: 'C#', value: 'csharp'},
            {text: 'C++', value: 'cpp'},
            {text: 'Bash', value: 'bash'}
          ],
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code codesample fullscreen",
            "insertdatetime media table contextmenu paste imagetools"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codesample code | fullscreen",

        image_title: true,
        automatic_uploads: true,
        images_upload_url: '/upload',
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
            };
            input.click();
        }
    });
</script>
@endsection