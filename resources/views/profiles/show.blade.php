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
                @forelse($activities as $date => $activity)
                    <h4 class="page-header">{{$date}}</h4>
                    @foreach($activity as $record)
                        @if(view()->exists("profiles.activities.{$record->type}"))
                    @include("profiles.activities.{$record->type}", ['activity'=> $record])
                        @endif
                    @endforeach
                @empty
                    <h3>No available activities</h3>
                @endforelse
{{--                {{$threads->links()}}--}}
            </div>
        </div>
    </div>
@endsection
