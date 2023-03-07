<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\App;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     * creating activate before of create post
     */
    public function creating(Post $post): void
    {
        //TODO:Major Security in Backend with a Observer
        //Enter registers from console condition Boolean
        //Use the seeders in database migrate php artisan migrate:fresh --seed
        if(!App::runningInConsole()){
            $post->user_id = auth()->user()->id;
        }        
    }


    /**
     * Handle the Post "deleted" event.
     * deleting activate before of delete post
     */
    public function deleting(Post $post): void
    {
        //Registered Observer from EvenServiceProvider
        if ($post->image) {
            Storage::delete($post->image->url);
        }
    }


}
