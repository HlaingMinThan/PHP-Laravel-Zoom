<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body' => 'required'
        ]);
        $comment = $blog->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        //mail send here
        $users = $blog->subscribedUsers;

        $users->each(function ($user) use ($comment) {
            if (auth()->id() !== $user->id) {
                Mail::to($user)->queue(new SubscriberMail($user, $comment)); //3jobs
            }
        });

        return back();
    }
}
