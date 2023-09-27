@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('view thread: ' . $thread->title) }}</div>
                    <div> <a href="#">{{ $thread->owner->name }} </a>
                        <span> posted:</span>
                    </div>
                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach ($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>

        @if (auth()->check())
            <div class="row justify-content-center">
                <form action="{{ $thread->path() . '/replies' }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" id="body" class="form-control" rows="5" placeholder="Place Your Reply"></textarea>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        @else
            <div>
                <p class="text-center">please <a href="{{ route('login') }}">sign in</a> to be able to reply on this
                    thread...
                </p>
            </div>
        @endif

    </div>
@endsection
