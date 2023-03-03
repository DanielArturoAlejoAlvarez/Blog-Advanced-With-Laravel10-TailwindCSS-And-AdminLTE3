@extends('adminlte::page')

@section('title', 'Post List')

@section('content_header')
    <h1>Post List</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop