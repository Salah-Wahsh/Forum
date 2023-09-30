    <div class="card">
        <div class="card-body">
            <div class="level">
                <h6 class="flex">
                <a href="/profile/{{$reply->owner->name}}"> {{ $reply->owner->name }} </a>said
            {{ $reply->created_at->diffForHumans() }}
                </h6>
                <div>
                    <form action="/replies/{{$reply->id}}/favorites" method="POST">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-default" {{$reply->isFavorited() ? 'disabled': ''}}>{{$reply->getFavCount()}} {{Str::plural('    Favorite',$reply->getFavCount())}}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ $reply->body }}
    </div>
    </div>
