
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
