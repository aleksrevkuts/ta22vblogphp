@extends('partials.layout')
@section('title', 'Confirm Password')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <div class="mb-4 text-sm text-white-600">
                    {{ ('Please confirm your password before continuing.') }}
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">{{ ('Password') }}</span>
                        </div>
                        <input id="password" type="password" name="password" class="input input-bordered @error('password') input-error @enderror w-full" required autocomplete="current-password" />
                        <div class="label">
                            @error('password')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <div class="flex justify-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
