<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * Show the form for creating a new resource.
     */
    public function create()//: Response
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//: RedirectResponse
    {
        $user = User::create($request->all());
        return redirect()
                    ->route('admin.users.edit', $user)
                    ->with('info','User saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)//: Response
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)//: Response
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)//: RedirectResponse
    {
        $user->update($request->all());
        return redirect()
                    ->route('admin.users.edit', $user)
                    ->with('info','User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)//: RedirectResponse
    {
        $user->delete();
        return redirect()
                ->route('admin.users.index')
                ->with('info','User deleted successfully!');
    }
}
