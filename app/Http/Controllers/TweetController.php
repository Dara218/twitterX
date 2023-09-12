<?php

namespace App\Http\Controllers;

use App\Events\NewTweet;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function store(Request $request)
    {
        if(empty($request->tweet) && empty($request->media))
        {
            return response()->json(['error' => true]);
        }

        $content = [
            'user_id' => Auth::user()->id,
            'text_content' => $request->input('tweet'),
        ];

        if($request->hasFile('media'))
        {
            $media = $request->media;
            $media->getClientOriginalName();

            $path = $media->store('images/tweet-media', 'public');
            $content['media'] = $path;
        }

        $tweet = Tweet::create($content);

        event(new NewTweet($tweet));

        return response()->json([
            'success' => true,
            'tweet' => $tweet
        ]);

        /*
            TODO:
                - Add lazy loading
                - work on follow feature to test the private channel on channels.php
        */
    }
}
