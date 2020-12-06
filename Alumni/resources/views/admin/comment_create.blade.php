@extends('layouts.navbar')


@section('content')
<div class="container">
    <a href="{{ route('admin.comments') }}" class="btn btn-dark mb-3">Back to comments</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Add Comment' }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.comment.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Poster</label>

                            <div class="col-md-6">

                                <select class="form-control" data-live-search="true" name="user_id">
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->firstname . " " . $user->lastname }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('user_id')
                                <span class="invalid-feedback" user_id="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="posts_id" class="col-md-4 col-form-label text-md-right">Post</label>

                            <div class="col-md-6">

                                <select class="form-control" data-live-search="true" name="posts_id">
                                    @foreach($posts as $post)
                                    <option value="{{ $post->id }}">
                                        {{ $post->id . " - " . $post->title }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('posts_id')
                                <span class="invalid-feedback" user_id="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment"
                                class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

                            <div class="col-md-6">
                                <input id="comment" type="text"
                                    class="form-control @error('comment') is-invalid @enderror" name="comment"
                                    value="{{ old('comment') }}" required autocomplete="name" autofocus>

                                @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ 'Save Changes' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection