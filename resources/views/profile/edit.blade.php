@extends('partials.layout')
@section('title', 'Profile')
@section('content')
    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="card bg-base-300 shadow-xl">
                <div class="card-body">
                    <x-slot name="header">
                        <h2 class="font-semibold text-xl text-white leading-tight">
                            {{ __('Profile') }}
                        </h2>
                    </x-slot>
                    <div class="max-w-xl">
                        <p class="text-white">Update your profile information below.</p>
                        @include('profile/partials/update-profile-information-form')
                    </div>
                </div>
            </div>

            <div class="card bg-base-300 shadow-xl">
                <div class="card-body">
                    <div class="max-w-xl">
                        <p class="text-white">Change your password here.</p>
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="card bg-base-300 shadow-xl">
                <div class="card-body">
                    <div class="max-w-xl">
                        <p class="text-white">Delete your account here.</p>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
