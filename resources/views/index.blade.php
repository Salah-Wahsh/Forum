@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse ($threads as $thread)
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="level">
                                <h5 class="flex"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></h5>
                                <a href="{{$thread->path()}}">{{$thread->replies()->count()}} {{Str::plural('replies',$thread->replies()->count())}}</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="body">{{ $thread->body }}</div>
                        </div>
                    </div>
                @empty
                    <p>No relevant Threads at this moment</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
