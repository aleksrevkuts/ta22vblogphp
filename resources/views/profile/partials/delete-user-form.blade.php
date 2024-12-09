<section class="space-y-6">
    <header>
        <h2 class="mt-4 text-lg font-medium text-white">
            Delete Account
        </h2>
    </header>

    <button
        type="button"
        class="btn btn-primary"
        onclick="document.getElementById('confirm-user-deletion-modal').classList.remove('hidden')">
        <p>Delete Account</p>
    </button>

    <div id="confirm-user-deletion-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-base-300 p-6 max-w-md shadow-lg">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-white">
                    Are you sure you want to delete your account?
                </h2>

                <p class="mt-1 text-sm text-gray-300">
                    Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-6">
                    <label for="password" class="sr-only">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="input input-bordered mt-1 block w-3/4 @error('password') input-error @enderror"
                        placeholder="Password"
                        required />

                    @error('password')
                        <span class="label-text-alt text-error mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('confirm-user-deletion-modal').classList.add('hidden')">
                        <p class="text-white">Cancel</p>
                    </button>

                    <button type="submit" class="btn btn-primary ms-3">
                        <p class="text-white">Delete Account</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
