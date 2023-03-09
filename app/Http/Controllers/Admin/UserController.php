<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()//: Response
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)//: Response
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)//: RedirectResponse
    {
        $user->roles()->sync($request->roles);
        return redirect()
                    ->route('admin.users.edit', $user)
                    ->with('info','Roles are assigned correctly!');
    }

    
}
