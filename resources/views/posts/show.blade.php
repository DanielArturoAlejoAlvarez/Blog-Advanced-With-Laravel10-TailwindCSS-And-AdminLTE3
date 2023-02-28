<x-app-layout>


    <div class="container py-8 px-8">
        
            
               
                   <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            <h1 class="text-4xl text-gray-600 leading-8 font-bold">{{$post->title}}</h1>
                            <h3 class="text-lg leading-6 text-gray-500 mb-3">{{$post->excerpt}}</h3>
                            {{-- @foreach ($post->tags as $tag)
                                <a style="background-color:{{ $tag->colour}}" class="inline-block bg-gray-600 @if ($tag->colour == 'yellow')
                                   text-gray-800 
                                @else 
                                text-white
                                @endif
                                 h-6 px-3 rounded-full" href="">{{$tag->name}}</a>
                            @endforeach --}}

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-2">
                                    <figure>
                                        <img class="w-full h-80 object-center object-cover" src="{{Storage::url($post->image->url)}}" alt="">
                                    </figure>
                                    <div class="text-base mt-4 text-gray-500">
                                        {{$post->body}}
                                    </div>
                                </div>
                                <aside>
                                    <h1 class="text-2xl text-gray-600 font-bold mb-4">More in {{$post->category->name}}</h1>

                                    <ul>
                                        @foreach ($filtered as $item)
                                            <li class="mt-4">
                                                <a class="flex" href="{{route('posts.show', $item)}}"><img class="w-36 h-20 object-cover object-center" src="{{Storage::url($item->image->url)}}" alt="">
                                                    <span class="ml-2 text-gray-600">{{$item->title}}</span>
                                                </a>
                                            </li>
                                        @endforeach                         
                                    </ul>
                                </aside>
                            </div>
                        </div>
                        
                   </div>
               
         
     
    
       
    </div>
    
    
    </x-app-layout>