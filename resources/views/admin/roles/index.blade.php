@extends('adminlte::page')

@section('title', 'Role List')

@section('content_header')
   
        <a href="{{route('admin.roles.create')}}" class="btn btn-secondary float-right">ADD ROLE</a>
   
    <h1>Role List</h1>
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
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <th>{{$role->id}}</th>
                        <td>{{$role->name}}</td>
                        <td width="10px">
                            
                                <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-warning btn-sm">EDIT</a>
                           
                        </td>
                        <td width="10px">    
                            
                                <form method="POST" action="{{route('admin.roles.destroy', $role)}}">
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