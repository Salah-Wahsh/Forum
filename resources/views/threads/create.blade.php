@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create a new thread') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/threads">
                            @csrf

                            <div class="form-group">
                                <label for="channel_id">Choose a channel</label>
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    <option value="">Choose channel...</option>
                                    {{-- channels are from service AppServiceProvider --}}
                                    @foreach ($channels as $channel)
                                        <option value="{{ $channel->id }}"
                                            {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                            {{ $channel->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="title">
                                <label for="title">Title:</label>
                                <input type="title" name="title" id="title" value="{{ old('title') }}"
                                    class="form-control" placeholder="title" required>
                            </div>
                            <div class="form-group">
                                <label for="body" style="display: block;">Body:</label>
                                <textarea name="body" id="body" cols="90" rows="8" required>
                                    {{ old('body') }}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                            @if (count($errors))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
