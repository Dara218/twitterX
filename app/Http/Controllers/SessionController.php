<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestSession;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function store(RequestSession $request)
    {
        $request->validated();

        if (!Auth::attempt(['email' => $request->login, 'password' => $request->password])
            && !Auth::attempt(['username' => $request->login, 'password' => $request->password]))
        {
            return response()->json(['success' => false]);
        }

        session()->regenerate();
        return response()->json(['success' => true]);
    }

    public function logout()
    {
        Auth::logout();
    }
}
