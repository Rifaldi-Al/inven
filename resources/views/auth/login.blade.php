<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- username_or_nip Address -->
        <div>
            <x-input-label for="username_or_nip" :value="__('Username/NIP')" />
            <x-text-input id="username_or_nip" class="block mt-1 w-full" type="text" name="username_or_nip" :value="old('username_or_nip')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username_or_nip')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- captcha --}}
        <div class="block mt-4">
            <label for="captcha" class="col-md-4 col-form-label text-md-right">{{ __('Captcha') }}</label>
    
            <div class="col-md-6">
                <input id="captcha" type="text" class="block mt-1 w-full @error('captcha') is-invalid @enderror" name="captcha" required autocomplete="off">
                <img src="{{ captcha_src('flat') }}" alt="captcha" class="captcha-img" data-refresh-config="flat">
            </div>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
