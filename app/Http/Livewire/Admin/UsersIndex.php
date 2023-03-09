<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
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
        $users = User::where('name', 'LIKE', '%' .$this->search. '%')
                ->orWhere('email', 'LIKE', '%' .$this->search.'%')
                ->latest('id')
                ->paginate();
        return view('livewire.admin.users-index', compact('users'));
    }
}
