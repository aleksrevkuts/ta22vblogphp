<section>
    <header>
        <h2 class="mt-4 text-lg font-medium text-white">
            Update Password
        </h2>

        <p class="mt-4 text-sm text-gray-300">
            Ensure your account is using a long, random password to stay secure
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="text-white block">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full input input-bordered @error('current_password') input-error @enderror" autocomplete="current-password" />
            @error('current_password')
                <span class="text-error mt-2 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="update_password_password" class="text-white block">New Password</label>
            <input id="update_password_password" name="password" type="password" class="mt-1 block w-full input input-bordered @error('password') input-error @enderror" autocomplete="new-password" />
            @error('password')
                <span class="text-error mt-2 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="update_password_password_confirmation" class="text-white block">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full input input-bordered @error('password_confirmation') input-error @enderror" autocomplete="new-password" />
            @error('password_confirmation')
                <span class="text-error mt-2 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary">
                <p class="text-white">Save</p>
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-300">
                    Saved
                </p>
            @endif
        </div>
    </form>
</section>
