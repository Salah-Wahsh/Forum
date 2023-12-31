<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Thread;

class RepliesController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store($chaannelId, Thread $thread)
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);

        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);
        return back()->with('flash', 'You made a new reply!');
    }

    public function destroy(Reply $reply){

        $this->authorize('update', $reply);
        $reply->delete();
        return back();
    }
}
