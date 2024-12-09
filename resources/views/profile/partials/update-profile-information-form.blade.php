<section>
    <header>
        <h2 class="mt-4 text-lg font-medium text-white-600">
            <p class="text-white">Profile Information</p>
        </h2>

        <p class="mt-4 text-sm text-white-600">
            <p class="text-white">Update your account's profile information and email address</p>
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="text-white block">Name</label>
            <input id="name" name="name" type="text"
                class="mt-1 block w-full input input-bordered @error('name') input-error @enderror"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
                <span class="text-error mt-2 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email" class="text-white">Email</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full input input-bordered"
                value="{{ old('email', $user->email) }}" required autofocus autocomplete="username" />
            @error('email')
                <span class="text-error mt-2 text-sm">{{ $message }}</span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-300">
                        Your email address is unverified.

                        <button form="send-verification"
                            class="underline text-sm text-gray-300 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="subtim" class="btn btn-primary">Save</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-300">Saved</p>
            @endif
        </div>
    </form>
</section>
