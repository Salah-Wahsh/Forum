<div>
    <Reply :reply="{{ json_encode($reply) }}" :auth="{{ auth()->check() ? 'true' : 'false' }}" v-cloak></Reply>
</div>


{{--<div class="card mt-4">--}}
{{--    <div id="reply-{{$reply->id}}" class="card-body">--}}
{{--        <div class="level">--}}
{{--            <h6 class="flex">--}}
{{--                <a href="/profile/{{$reply->owner->name}}"> {{ $reply->owner->name }} </a>said--}}
{{--                {{ $reply->created_at->diffForHumans() }}--}}
{{--            </h6>--}}
{{--            <div>--}}
{{--                <form action="/replies/{{$reply->id}}/favorites" method="POST">--}}
{{--                    {{csrf_field()}}--}}
{{--                    <button type="submit" class="btn btn-default" {{$reply->isFavorited() ? 'disabled': ''}}>{{$reply->getFavCount()}}--}}
{{--                        {{Str::plural('Favorite',$reply->getFavCount())}}</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="panel-body">--}}
{{--        <div v-if="editing">--}}
{{--            <textarea></textarea>--}}
{{--        </div>--}}
{{--        <div v-else>--}}
{{--            {{ $reply->body }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @can ('update', $reply)--}}
{{--        <div class="panel-footer level mr-1" @click="editing= true">--}}
{{--            <button class="btn btn-xs" type="submit">Edit</button>--}}
{{--            <form method="POST" action="/replies/{{$reply->id}}">--}}
{{--                {{csrf_field()}}--}}
{{--                {{method_field('DELETE')}}--}}
{{--                <button type="submit" class="btn btn-danger btn-xs">delete</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    @endcan--}}
{{--</div>--}}
