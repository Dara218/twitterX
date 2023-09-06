<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function get ()
    {
        $user = User::where('id', Auth::user()->id)
                    ->with('userPhoto', 'tweet')
                    ->first();
        return $user;
    }
}
