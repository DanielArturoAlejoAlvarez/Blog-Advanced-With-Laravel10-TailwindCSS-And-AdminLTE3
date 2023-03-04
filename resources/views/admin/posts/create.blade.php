@extends('adminlte::page')

@section('title', 'Create Post')

@section('content_header')
    <h1>Create Post</h1>
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.posts.store','autocomplete'=>'off']) !!}
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
                <span class="text-danger">{{$message}}</span>
                @enderror 
            </div>
            <div class="form-group">
                {!! Form::label('excerpt', 'EXCERPT:') !!}
                {!! Form::text('excerpt', null, ['class'=>'form-control','placeholder'=>'Enter the post title...']) !!}
                @error('excerpt')
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
   <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#title').stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            })
        })
    </script>
@stop