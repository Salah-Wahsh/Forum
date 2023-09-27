<?php

namespace App\Http\Controllers;

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
    public function store(Thread $thread)
    {
        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);
        return back();
    }
}
