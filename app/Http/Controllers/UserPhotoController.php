<?php

namespace App\Http\Controllers;

use App\Models\UserPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserPhotoController extends Controller
{
    public function updateUserPhoto($id, Request $request)
    {
        $image = $request->image;

        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if(! $request->hasFile('image') || $validator->fails())
        {
            return response()->json(['success' => false]);
        }

        $image->getClientOriginalName();
        $path = $image->store('images/profile-picture', 'public');
        UserPhoto::where('user_id', $id)->first()->update(['file_name' => $path]);
        return response()->json(['success' => true]);
    }
}
