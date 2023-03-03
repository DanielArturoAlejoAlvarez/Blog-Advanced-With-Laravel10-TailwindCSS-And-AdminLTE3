<div class="form-group">
    {!! Form::label('name', 'NAME:') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Enter the tag name...']) !!}
    @error('name')
    <span class="text-danger">{{$message}}</span>
    @enderror            
</div>
<div class="form-group">
    {!! Form::label('slug', 'SLUG:') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Enter the tag slug...','readonly']) !!}
    @error('slug')
    <span class="text-danger">{{$message}}</span>
    @enderror 
</div>
<div class="form-group">
    {!! Form::label('colour', 'COLOUR:') !!}

    {!! Form::select('colour', $colors, null, ['class'=>'form-control']) !!}

    @error('colour')
    <span class="text-danger">{{$message}}</span>
    @enderror            
</div>