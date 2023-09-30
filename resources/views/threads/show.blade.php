@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                            <a href="/profile/{{$thread->owner->name}}">{{ $thread->owner->name }} </a>
                                <span> posted:</span>
                                {{ __($thread->title) }}
                            </span>
                        <span>
                            @can('update', $thread)
                            <form action="{{$thread->path()}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-link" style="text-decoration: none;" >Delete Thread</button>
                                </form>
                            @endcan
                        </span>
                        </div>


                    </div>
                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                        <p>This Thread was published {{$thread->created_at->diffForHumans()}} by
                            <a href="/profile/{{$thread->owner->name}}">{{$thread->owner->name}} </a> and currently
                            has {{$thread->replies_count}} {{Str::plural('reply', $thread->replies_count)}}.</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-left">
            <div class="col-md-8">
                @foreach ($replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>

        </div>
        {{$replies->links()}}

        @if (auth()->check())
            <div class="row justify-content-center">
                <form action="{{ $thread->path() . '/replies' }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" id="body" class="form-control" rows="5"
                                  placeholder="Place Your Reply"></textarea>
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
