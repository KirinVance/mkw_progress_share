<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(User::all());
    }

    public function show(int $id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
}
