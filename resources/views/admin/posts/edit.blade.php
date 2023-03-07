@extends('adminlte::page')

@section('title', 'Edit Post')

@section('content_header')
<h1>Edit {{$post->title}}</h1>
@stop

    @section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($post, ['route'=>['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method'=>'put']) !!}
            
            @include('admin.posts.partials.form')

            {!! Form::submit('UPDATE POST', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @stop

        @section('css')
        <style>
            .image-wrapper {
                position: relative;
                padding-bottom: 56.25%;
            }

            .image-wrapper img {
                position: absolute;
                object-fit: cover;
                width: 100%;
                height: 100%;
            }

        </style>
        @stop

            @section('js')
            <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
            <script
                src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}">
            </script>
            <script>
                //TODO:Config Slugged
                $(document).ready(function () {
                    $('#title').stringToSlug({
                        setEvents: 'keyup keydown blur',
                        getPut: '#slug',
                        space: '-'
                    })
                })

                //TODO:Config CKEditor to excerpt and body
                ClassicEditor
                    .create(document.querySelector('#excerpt'))
                    .catch(error => {
                        console.error(error);
                    });
                ClassicEditor
                    .create(document.querySelector('#body'))
                    .catch(error => {
                        console.error(error);
                    });

                //TODO:Changed Image PRE-Visualization from Form Post
                document.getElementById('file').addEventListener('change', changeImagePicture);

                function changeImagePicture(e) {
                    var file = e.target.files[0];
                    var reader = new FileReader();
                    reader.onload = (ev) => {
                        document.getElementById('picture').setAttribute('src', ev.target.result);
                    }
                    reader.readAsDataURL(file);
                }

            </script>
            @stop
