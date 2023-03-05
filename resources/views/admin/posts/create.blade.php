@extends('adminlte::page')

@section('title', 'Create Post')

@section('content_header')
    <h1>Create Post</h1>
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.posts.store','autocomplete'=>'off']) !!}
            
            {!! Form::hidden('user_id', auth()->user()->id) !!}
        
            <div class="form-group">
                {!! Form::label('title', 'TITLE:') !!}
                {!! Form::text('title', null, ['class'=>'form-control','placeholder'=>'Enter the post title...']) !!}
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror            
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'SLUG:') !!}
                {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Enter the post slug...','readonly']) !!}
                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror 
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'CATEGORY:') !!}
                {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror 
            </div>
            <div class="form-group">
                <p class="font-weight-bold">TAGS:</p>
                @foreach ($tags as $tag)
                <label class="mr-2">
                    {!! Form::checkbox('tags[]', $tag->id, null) !!}
                    {{$tag->name}}
                </label>
                
                @endforeach
                @error('tags')
                <br>
                <span class="text-danger">{{$message}}</span>
                @enderror 
            </div>
            <div class="form-group">
                {!! Form::label('excerpt', 'EXCERPT:') !!}
                {!! Form::textarea('excerpt', null, ['class'=>'form-control']) !!}
                @error('excerpt')
                <span class="text-danger">{{$message}}</span>
                @enderror            
            </div>
            <div class="form-group">
                {!! Form::label('body', 'BODY:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
                @error('body')
                <span class="text-danger">{{$message}}</span>
                @enderror            
            </div>

            <div class="form-group">
                {!! Form::label('status', 'STATUS:') !!}
                <div>
                    <label>
                        {!! Form::radio('status', 1, true) !!}
                        Draft
                    </label>
                    <label class="ml-2">
                        {!! Form::radio('status', 2, false) !!}
                        Published
                    </label>
                </div>
                @error('status')
                <span class="text-danger">{{$message}}</span>
                @enderror  
            </div>

            {!! Form::submit('CREATE POST', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
   </div>
@stop

@section('css')
    
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
        <script>
            $(document).ready(function(){
                $('#title').stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                })
            })

            ClassicEditor
            .create( document.querySelector( '#excerpt' ) )
            .catch( error => {
                console.error( error );
            } );
            ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
        </script>
@stop