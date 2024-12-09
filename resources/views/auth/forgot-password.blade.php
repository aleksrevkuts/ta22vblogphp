@extends('partials.layout')
@section('title', 'Forgot Password')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <div class="mb-4 text-sm text-white-600">
                    {{ ('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Email</span>
                        </div>
                        <input id="email" class="input input-bordered @error('email') input-error @enderror w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <div class="label">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </label>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ ('Email Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
