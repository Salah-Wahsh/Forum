<div class="card">
    <div class="card-header">
        <div class="level">
            <span class="flex">
                {{$profileUser->name}} published a new thread: <a href="{{$activity->subject->path()}}">{{$activity->subject->title}}</a>
            </span>
        </div>
    </div>
    <div class="card-body">
        {{$activity->subject->body}}
    </div>
</div>

