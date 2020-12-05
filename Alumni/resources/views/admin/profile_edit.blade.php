@extends('layouts.navbar')


@section('content')
<div class="container">
    <a href="{{ route('admin.users') }}" class="btn btn-dark mb-3">Back to users</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Edit Profile' }}</div>

                <div class="card-body">
                    <form action="" id="edit_profile">

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') ?? $user->profile->phone }}" required
                                    autocomplete="name" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ old('description') ?? $user->profile->description }}" required
                                    autocomplete="description" autofocus>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url_linkedin"
                                class="col-md-4 col-form-label text-md-right">{{ __('LinkedIn') }}</label>

                            <div class="col-md-6">
                                <input id="url_linkedin" type="url_linkedin"
                                    class="form-control @error('url_linkedin') is-invalid @enderror" name="url_linkedin"
                                    value="{{ old('url_linkedin') ?? $user->profile->url_linkedin }}" required
                                    autocomplete="url_linkedin">

                                @error('url_linkedin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url_github"
                                class="col-md-4 col-form-label text-md-right">{{ __('GitHub') }}</label>

                            <div class="col-md-6">
                                <input id="url_github" type="url_github"
                                    class="form-control @error('url_github') is-invalid @enderror" name="url_github"
                                    value="{{ old('url_github') ?? $user->profile->url_github }}" required
                                    autocomplete="url_github">

                                @error('url_github')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url_website"
                                class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>

                            <div class="col-md-6">
                                <input id="url_website" type="url_website"
                                    class="form-control @error('url_website') is-invalid @enderror" name="url_website"
                                    value="{{ old('url_website') ?? $user->profile->url_website }}" required
                                    autocomplete="url_website">

                                @error('url_website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image"
                                class="col-md-4 col-form-label text-md-right">{{ __('Pofile Image') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" value="{{ old('image') ?? $user->profile->image }}" required
                                    autocomplete="image" style="border:none">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="profile_edit_submit">
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