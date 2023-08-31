<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestSession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function store(RequestSession $request)
    {
        $request->validated();

        $user = User::where('email', $request->login)
                    ->orWhere('username', $request->login)
                    ->first();

        if(! $user || ! Hash::check($request->password, $user->password)){
            return response()->json(['success' => false]);
        }

        session()->regenerate();
        return response()->json(['success' => true]);
    }
}
