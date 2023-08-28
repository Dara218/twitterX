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

    public function storeUserPhoto($id, Request $request)
    {
        /*

        TODO:
            Make new user_photos table
            add validation on registerPageProfilePicture.vue
            https://github.com/Dara218/LaravelVue-Todo/blob/main/resources/js/vue/Profile.vue
         */
    }

}
