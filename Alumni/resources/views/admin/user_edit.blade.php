@extends('layouts.navbar')


@section('content')
<div class="container">
    <a href="{{ route('admin.users') }}" class="btn btn-dark mb-3">Back to users</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Edit Informations' }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.user.update',  [ $user->id ]) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="firstname"
                                class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text"
                                    class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                    value="{{ old('firstname') ?? $user->firstname }}" required autocomplete="name"
                                    autofocus>

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname"
                                class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="lastname"
                                    value="{{ old('lastname') ?? $user->lastname }}" required autocomplete="lastname"
                                    autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') ?? $user->email }}" required
                                    autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_admin" class="col-md-4 col-form-label text-md-right">Admin</label>
                            <div class="col-md-6">
                                <select class="form-control" name="is_admin">
                                    <option>0</option>
                                    <option>1</option>
                                </select>

                                @error('is_admin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>
                            <div class="col-md-6">
                                <select class="form-control" name="role">
                                    <option value="student">Student</option>
                                    <option value="alumni">Alumni</option>
                                    <option value="recruiter">Recruiter</option>
                                </select>

                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ 'Password' }}</label>

                            <div class="col-md-6">
                                <input id="newPassword" type="password" class="form-control" name="newPassword">
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