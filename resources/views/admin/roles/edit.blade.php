@extends('adminlte::page')

@section('title', 'Edit Role')

@section('content_header')
<h1>Edit Role</h1>
@stop

    @section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route'=>['admin.roles.update', $role], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'NAME:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
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
            

            {!! Form::submit('UPDATE ROLE', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @stop

        @section('css')

        @stop

        @section('js')
        
        @stop
