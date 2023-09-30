@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="page-header">
                    <h2>
                        {{$profileUser->name}}
                        <small>Since {{$profileUser->created_at->diffForHumans()}}</small>
                    </h2>
                    <hr>

                </div>
                @foreach($activities as $date => $activity)
                    <h4 class="page-header">{{$date}}</h4>
                    @foreach($activity as $record)
                    @include("profiles.activities.{$record->type}", ['activity'=> $record])

                    @endforeach
                @endforeach
{{--                {{$threads->links()}}--}}
            </div>
        </div>
    </div>
@endsection
