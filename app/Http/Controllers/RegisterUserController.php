<?php

namespace App\Http\Controllers;

use App\Mail\RegisterConfirmationCode;
use App\Models\User;
use App\Models\UserRegistrationCode;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Type\FalseType;

class RegisterUserController extends Controller
{
    public function store(Request $request)
    {
        $confirmationCode = rand(100000, 999999);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        UserRegistrationCode::create([
            'user_id' => $user->id,
            'confirmation_code' => $confirmationCode
        ]);

        try
        {
            Mail::to($request->email)->send(new RegisterConfirmationCode($confirmationCode));
            return response()->json(['confirmation_code' => $confirmationCode]);
        }
        catch(Exception $error)
        {
            return response()->json($error);
        }
    }
}
