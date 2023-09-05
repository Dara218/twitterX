<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function store(Request $request)
    {
        $content = [
            'user_id' => Auth::user()->id,
            'text_content' => $request->tweet,
        ];

        if($request->hasFile('media'))
        {
            $media = $request->media;
            $media->getClientOriginalName();

            $path = $media->store('images/tweet-media', 'public');
            $content['media'] = $path;
        }

        Tweet::create($content);
        return response()->json(['success' => true]);
    }
}
