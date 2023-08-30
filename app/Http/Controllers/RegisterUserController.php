<?php

namespace App\Http\Controllers;

use App\Mail\RegisterConfirmationCode;
use App\Models\User;
use App\Models\UserPhoto;
use App\Models\UserRegistrationCode;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
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

        UserPhoto::create(['user_id' => $user->id]);

        UserRegistrationCode::create([
            'user_id' => $user->id,
            'confirmation_code' => $confirmationCode
        ]);

        try
        {
            Mail::to($request->email)->send(new RegisterConfirmationCode($confirmationCode));
            return response()->json(['user' => $user]);
        }
        catch(Exception $error)
        {
            return response()->json($error);
        }
    }

    public function verifyEmailCode($id, Request $request)
    {
        $user = UserRegistrationCode::where('user_id', $id)->first();

        if($user->confirmation_code == $request->code)
        {
            UserRegistrationCode::where('user_id', $user->user_id)
                                ->update([
                                    'isConfirmed' => true
                                ]);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function storePassword($id, Request $request)
    {
        if(strlen($request->password) < 8)
        {
            return response()->json(['success' => false]);
        }

        $hashPassword = bcrypt($request->password);
        User::find($id)->update(['password' => $hashPassword]);
        return response()->json(['success' => true]);
    }

    public function updateUsername($id, Request $request)
    {
        $user = User::findOrFail($id);
        $isUsernameExists = $user->where('username', $request->username)
                                ->exists();

        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3|max:30'
        ]);

        if($isUsernameExists)
        {
            return response()->json([
                'success' => false,
                'message' => 'Username already exists'
            ]);
        }
        if($validator->fails())
        {
            $error = $validator->errors()->get('username')[0];
            return response()->json([
                'success' => false,
                'message' => $error
            ]);
        }
        $user->update(['username' => $request->username]);
        return response()->json(['success' => true]);
    }
}
