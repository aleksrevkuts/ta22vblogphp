@extends('partials.layout')
@section('title', 'Email Verification')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <div class="mb-4 text-sm text-white-600">
                    <p class="text-white">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        <p class="text-white">A new verification link has been sent to the email address you provided during registration.</p>
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <button type="submit" class="btn btn-primary">
                            <p class="text-white">Resend Verification Email</p>
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-secondary btn-error">
                            <p class="text-white">Log Out</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
