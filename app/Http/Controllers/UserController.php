<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.index', ['users' => User::get()]);
    }


    public function create()
    {
        return view('admin.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        User::updateOrCreate(['id' => $request->user_id], [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        return response()->json(['message' => $request->user_id ? 'User Updated successfully' : 'User Created successfully', 'status' => 'Status 200 ']);
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view('admin.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
