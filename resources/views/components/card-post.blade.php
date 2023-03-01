@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($post->image)
        <img class="shadow-lg w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="{{$post->title}}">

    @else
        <img class="shadow-lg w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2016/06/13/09/57/meeting-1453895_960_720.png" alt="{{$post->title}}">

    @endif
    <div class="p-8">
        <h1 class="text-xl mb-2 font-bold">
            <a href="{{route('posts.show', $post)}}">{{$post->title}}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {!! $post->excerpt !!}
        </div>
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
            <span class="rounded-full px-3 py-1 bg-gray-200 text-sm inline-block text-gray-700">
                <a class="flex flex-row justify-between items-center" href="{{route('posts.tag', $tag)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                    </svg>
                      
                    {{$tag->name}}
                </a>
            </span>
        @endforeach
    </div>
</article>

