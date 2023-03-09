@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Assign Role</h1>
@stop

@section('content')

@if(session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('name', 'NAME:') !!}
            {!! Form::text('name', $user->name, ['class'=>'form-control', 'readonly']) !!}
        </div>
        {!! Form::model($user, ['route'=>['admin.users.update', $user], 'autocomplete' => 'off', 'method'=>'put']) !!}
        
        <div class="form-group">
            <h5 class="font-weight-bold">Role List:</h5>
            
            @foreach ($roles as $role)
            <div>
            <label>
                {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                {{$role->name}}
            </label> 
            </div>
            @endforeach    
        </div>

        {!! Form::submit('ASSIGN ROLE', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop