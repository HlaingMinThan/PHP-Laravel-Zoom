<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function toggleSubscription(Blog $blog)
    {
        if (auth()->user()->isSubscribed($blog)) {
            $blog->subscribedUsers()->detach(auth()->id());
        } else {
            $blog->subscribedUsers()->attach(auth()->id());
        }

        return back();
    }
}
