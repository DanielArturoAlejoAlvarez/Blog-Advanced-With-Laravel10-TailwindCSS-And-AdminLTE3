<x-app-layout>
    

    <div class="container py-8 px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="@if ($loop->first) md:col-span-2 @endif w-full h-80 bg-center bg-cover"
                    style="background-image:url({{ Storage::url($post->image->url) }})">
                    <div class=" w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('posts.tag', $tag) }}" style="background-color:{{ $tag->colour }};"
                                    class="inline-block bg-gray-600 
                                @if ($tag->colour == 'yellow') text-gray-800 
                                @else text-white 
                                @endif h-6 px-3 rounded-full">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl mt-2 text-white leading-8 font-bold"><a
                                href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </h1>
                    </div>
                </article>
            @endforeach

           
        </div> 
        <div class="col-4">
            {{$posts->links()}}
        </div>     
    </div>


</x-app-layout>
