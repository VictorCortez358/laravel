<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersControllers extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function create()
    {
        return 'Show form to create a user';
    }

    public function store(Request $request)
    {
        return 'Store a new user';
    }

    public function edit($id)
    {
        return 'Show form to edit user with id ' . $id;
    }

    public function update(Request $request, $id)
    {
        return 'Update user with id ' . $id;
    }

    public function destroy($id)
    {
        return 'Delete user with id ' . $id;
    }
}
