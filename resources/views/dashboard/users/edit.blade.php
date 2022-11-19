@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="container mt-4">
            @if ($password_message = Session::get('password-message'))
            <div class="alert alert-success alert-block">
                <strong>{{ $password_message }}</strong>
            </div>
            @endif
            <h1>
                Update User Page
                <div class="float-right">
                    <a href="{{ URL::previous() }}" class="btn btn-dark">Back</a>
                </div>
            </h1>
            <form method="post" action="{{ route('dashboard.users.update', $user->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $user->email }}"
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input value="{{ $user->username }}"
                        type="text"
                        class="form-control"
                        name="username"
                        placeholder="Username" required>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                @if(Auth::user()->id == $user->id)
                    <div class="mb-3">
                        <label for="old_password" class="form-label">old_password</label>
                        <input 
                            type="text"
                            class="form-control"
                            name="old_password"
                            placeholder="please enter your old password">
                        @if ($errors->has('old_password'))
                            <span class="text-danger text-left">{{ $errors->first('old_password') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">new_password</label>
                        <input
                            type="text"
                            class="form-control"
                            name="new_password"
                            placeholder="please enter your new password">
                        @if ($errors->has('new_password'))
                            <span class="text-danger text-left">{{ $errors->first('new_password') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="new_password_verification" class="form-label">new_password_verification</label>
                        <input
                            type="text"
                            class="form-control"
                            name="new_password_verification"
                            placeholder="reenter your new password">
                        @if ($errors->has('new_password_verification'))
                            <span class="text-danger text-left">{{ $errors->first('new_password_verification') }}</span>
                        @endif
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Update user</button>
                <a href="{{ route('dashboard.users.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>
    </div>
@endsection