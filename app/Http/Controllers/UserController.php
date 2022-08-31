<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('website.user', ['title' => 'User Page', 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.user_add', ['title' => 'Add User Page']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'username' => 'required|string|min:3|max:20|unique:users,username',
            'email' => 'required|string|email:dns|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required'
        ]);

        $data['password'] = Hash::make($request->password);

        try
        {
            User::create($data);
        }
        catch(QueryException $e)
        {
            return redirect('/user')->with('error', 'Terjadi kesalahan');
        }

        return redirect('/user')->with('success', 'User berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        if($user->role === 'S')
        {
            return redirect('/user')->with('error', 'Tidak bisa diedit');
        }

        return view('website.user_edit', ['title' => 'Edit User Page', 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'username' => 'required|string|min:3|max:20|unique:users,username,' . $id,
            'email' => 'required|string|email:dns|max:255|unique:users,email,' . $id,
            'password' => 'confirmed',
            'role' => 'required'
        ]);

        $data['password'] = Hash::make($request->password);

        try
        {
            User::where('id', $id)->update($data);
        }
        catch(QueryException $e)
        {
            return redirect('/user')->with('error', 'Terjadi kesalahan');
        }

        return redirect('/user')->with('success', 'User berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->role === 'S')
        {
            return redirect('/user')->with('error', 'Tidak bisa dihapus');
        }
        
        try
        {
            User::destroy($id);
        }
        catch(QueryException $e)
        {
            return redirect('/user')->with('error', 'Terjadi kesalahan');
        }
        
        return redirect('/user')->with('success', 'User berhasil dihapus');
    }
}
