<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel)
    {
        if ($channel->exists) {
            // $channelId = Channel::where('slug', $channelSlug)->first()->id;
            $threads = $channel->threads()->latest()->get();

        } else {
            $threads = Thread::latest()->get();
        }
        return view('index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'channel_id' => 'required|exists:channels,id',

        ]);

        $thread = Thread::create([
            'user_id' => auth()->id(),
            'channel_id' => request('channel_id'),
            'title' => request('title'),
            'body' => request('body'),
        ]);
        return redirect($thread->path());
    }

    /**
     * Display the specified resource.
     */
    public function show($channelId, Thread $thread)
    {
        return view('threads.show', compact('thread'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
