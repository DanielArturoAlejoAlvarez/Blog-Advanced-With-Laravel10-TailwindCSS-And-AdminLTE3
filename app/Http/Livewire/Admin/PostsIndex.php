<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{

    use WithPagination;

    public $search;//$search='Test'

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
                        ->where('title','LIKE','%' . $this->search . '%')
                        ->latest('id')
                        ->paginate(7);
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
