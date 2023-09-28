@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Forum Threads') }}</div>

                    <div class="card-body">
                        @foreach ($threads as $thread)
                            <article>
                                <div class="level">
                                {{--
                                the thread path function is defined in Thread Model that is to provide a
                                more robust solution. instead of the usual (href="$thread->id") --}}

                                <h5 class="flex"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></h5    >
                                    <a href="{{$thread->path()}}" >{{$thread->replies()->count()}} {{Str::plural('replies',$thread->replies()->count())}}</a>
                                </div>
                                <div class="body">{{ $thread->body }}</div>
                            </article>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
