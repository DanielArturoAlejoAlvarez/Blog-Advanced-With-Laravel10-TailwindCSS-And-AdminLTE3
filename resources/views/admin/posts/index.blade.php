@extends('adminlte::page')

@section('title', 'Post List')

@section('content_header')
    <a href="{{route('admin.posts.create')}}" class="btn btn-secondary float-right">ADD POST</a>
    <h1>Post List</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    @livewire('admin.posts-index')    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop