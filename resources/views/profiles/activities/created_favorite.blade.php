<div class="card">
    <div class="card-header">
        <div class="level">
            <span class="flex">
                <a href="{{$activity->subject->favorited->path()}}">
                {{$profileUser->name}} favorited a reply
                </a>
{{--                <a href="{{$activity->subject->thread->path()}}">{{$activity->subject->thread->title}}</a>--}}
            </span>
        </div>
    </div>
    <div class="card-body">
        {{$activity->subject->favorited->body}}

    </div>
</div>
