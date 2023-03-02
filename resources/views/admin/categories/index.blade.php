@extends('adminlte::page')

@section('title', 'Category List')

@section('content_header')
    <h1>Category List</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('admin.categories.create')}}">ADD CATEGORY</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td width="10px">
                            <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-warning btn-sm">EDIT</a>
                        </td>
                        <td width="10px">    
                            <form method="POST" action="{{route('admin.categories.destroy', $category)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop