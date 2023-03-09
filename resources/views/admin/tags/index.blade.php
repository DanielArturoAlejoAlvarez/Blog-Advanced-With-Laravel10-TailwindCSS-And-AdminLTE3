@extends('adminlte::page')

@section('title', 'Tag List')

@section('content_header')
    @can('admin.tags.create')
        <a href="{{route('admin.tags.create')}}" class="btn btn-secondary float-right">ADD TAG</a>
    @endcan
    <h1>Tag List</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
       
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>COLOUR</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <th>{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        <td><div style="background-color: {{$tag->colour}}; width: 50px; height: 50px"></div></td>
                        <td width="10px">
                            @can('admin.tags.edit')
                                <a href="{{route('admin.tags.edit', $tag)}}" class="btn btn-warning btn-sm">EDIT</a>
                            @endcan
                        </td>
                        <td width="10px">    
                            @can('admin.tags.destroy')
                                <form method="POST" action="{{route('admin.tags.destroy', $tag)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                </form>
                            @endcan
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