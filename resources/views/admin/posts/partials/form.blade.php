<div class="form-group">
    {!! Form::label('title', 'TITLE:') !!}
    {!! Form::text('title', null, ['class'=>'form-control','placeholder'=>'Enter the post title...']) !!}
    @error('title')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'SLUG:') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Enter the post
    slug...','readonly']) !!}
    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'CATEGORY:') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    @error('category_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">TAGS:</p>
    @foreach($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{ $tag->name }}
        </label>

    @endforeach
    @error('tags')
        <br>
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

{{-- Upload Image Post --}}
<div class="row mb-3 ">
    <div class="col">
        <div class="image-wrapper">
            @if (@isset($post->image))
            <img id="picture" class="shadow-lg w-full h-72 object-cover object-center"
            src="{{Storage::url($post->image->url)}}" alt="{{$post->title}}"> 
            @else
            <img id="picture" class="shadow-lg w-full h-72 object-cover object-center"
            src="https://cdn.pixabay.com/photo/2016/06/13/09/57/meeting-1453895_960_720.png" alt="">
            @endif
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'IMAGE:') !!}
            {!! Form::file('file', ['class'=>'form-control-file', 'accept'=>'image/*']) !!}
        
        
            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti eligendi atque illum,
            voluptate provident quisquam ex, debitis expedita delectus in nisi sint autem. Soluta enim cum
            aut distinctio. Expedita, officia?</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('excerpt', 'EXCERPT:') !!}
    {!! Form::textarea('excerpt', null, ['class'=>'form-control']) !!}
    @error('excerpt')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('body', 'BODY:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    @error('body')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('status', 'STATUS:') !!}
    <div>
        <label>
            {!! Form::radio('status', 1, true) !!}
            Draft
        </label>
        <label class="ml-2">
            {!! Form::radio('status', 2, false) !!}
            Published
        </label>
    </div>
    @error('status')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>