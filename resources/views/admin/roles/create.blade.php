@extends('adminlte::page')

@section('title', 'Create Role')

@section('content_header')
    <h1>Create Role</h1>
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.roles.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'NAME:') !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Enter the role name...']) !!}
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror            
            </div>

            <div class="form-group">
                <label>PERMISSIONS LIST:</label>
                <div>
                    @foreach ($permissions as $permission)
                        <label class="d-flex">
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                            {{$permission->description}}
                        </label>
                    @endforeach
                </div>
            </div>
            

            {!! Form::submit('CREATE ROLE', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
   </div>
@stop

@section('css')
    
@stop

@section('js')
   
@stop