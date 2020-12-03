@extends('layouts.navbar')


@section('content')
<div class="container">
    <a href="{{ route('admin.jobs') }}" class="btn btn-dark mb-3">Back to job offers</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Edit Job offer' }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.job.update',  [ $job->id ]) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Job poster</label>

                            <div class="col-md-6">

                                <select class="form-control" data-live-search="true" name="user_id">
                                    @foreach($users as $user)
                                    <option value="{{ old('user_id') ?? $user->id }}">
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
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class=" col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') ?? $job->title }}" required autocomplete="title"
                                    autofocus>

                                @error('title')
                                <span class="invalid-feedback" user="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content"
                                class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                            <div class=" col-md-6">
                                <textarea id="content" type="text"
                                    class="form-control @error('content') is-invalid @enderror" name="content" required
                                    autocomplete="content" autofocus>{{ old('content') ?? $job->content }}</textarea>

                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile"
                                class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>

                            <div class=" col-md-6">
                                <input id="profile" type="text"
                                    class="form-control @error('profile') is-invalid @enderror" name="profile"
                                    value="{{ old('profile') ?? $job->profile }}" autocomplete="profile" autofocus>

                                @error('profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="qualifications"
                                class="col-md-4 col-form-label text-md-right">{{ __('Qualifications') }}</label>

                            <div class=" col-md-6">
                                <input id="qualifications" type="text"
                                    class="form-control @error('qualifications') is-invalid @enderror"
                                    name="qualifications" value="{{ old('qualifications') ?? $job->qualifications }}"
                                    required autocomplete="qualifications" autofocus>

                                @error('qualifications')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year_experiences"
                                class="col-md-4 col-form-label text-md-right">{{ __('Years of experience') }}</label>

                            <div class=" col-md-6">
                                <input id="year_experiences" type="number"
                                    class="form-control @error('year_experiences') is-invalid @enderror"
                                    name="year_experiences"
                                    value="{{ old('year_experiences') ?? $job->year_experiences }}"
                                    autocomplete="year_experiences" autofocus>

                                @error('year_experiences')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street_address"
                                class="col-md-4 col-form-label text-md-right">{{ __('Street address') }}</label>

                            <div class=" col-md-6">
                                <input id="street_address" type="text"
                                    class="form-control @error('street_address') is-invalid @enderror"
                                    name="street_address" value="{{ old('street_address') ?? $job->street_address }}"
                                    autocomplete="street_address" autofocus>

                                @error('street_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postal_code"
                                class="col-md-4 col-form-label text-md-right">{{ __('Postal code') }}</label>

                            <div class=" col-md-6">
                                <input id="postal_code" type="number"
                                    class="form-control @error('postal_code') is-invalid @enderror" name="postal_code"
                                    value="{{ old('postal_code') ?? $job->postal_code }}" autocomplete="postal_code"
                                    autofocus>

                                @error('postal_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class=" col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" value="{{ old('city') ?? $job->city }}" autocomplete="city" autofocus>

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contract"
                                class="col-md-4 col-form-label text-md-right">{{ __('Contract') }}</label>

                            <div class=" col-md-6">
                                <select class="form-control" name="contract"
                                    value="{{ old('contract') ?? $job->contract }}">
                                    <option value="CDI">CDI</option>
                                    <option value="CDD">CDD</option>
                                    <option value="Stage">Stage</option>
                                    <option value="Alternance">Alternance</option>
                                    <option value="Freelance">Freelance</option>
                                </select>

                                @error('contract')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contract_duration"
                                class="col-md-4 col-form-label text-md-right">{{ __('Contract duration') }}</label>

                            <div class=" col-md-6">
                                <input id="contract_duration" type="text"
                                    class="form-control @error('contract_duration') is-invalid @enderror"
                                    name="contract_duration"
                                    value="{{ old('contract_duration') ?? $job->contract_duration }}"
                                    autocomplete="contract_duration" autofocus>

                                @error('contract_duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="company_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Company name') }}</label>

                            <div class=" col-md-6">
                                <input id="company_name" type="text"
                                    class="form-control @error('company_name') is-invalid @enderror" name="company_name"
                                    value="{{ old('company_name') ?? $job->company_name }}" required
                                    autocomplete="company_name" autofocus>

                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sector" class="col-md-4 col-form-label text-md-right">{{ __('Sector') }}</label>

                            <div class=" col-md-6">
                                <input id="sector" type="text"
                                    class="form-control @error('sector') is-invalid @enderror" name="sector"
                                    value="{{ old('sector') ?? $job->sector }}" autocomplete="sector" autofocus>

                                @error('sector')
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