<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
        <!-- Logo and Title Section -->
        <div class="w-full max-w-md space-y-8">
            <div class="flex flex-col items-center">
                <!-- Logo -->
                <div class="mb-4">
                    <img src="{{ asset('img/sinarmas-removebg-preview.png') }}" alt="Company Logo" class="h-16 w-auto">
                    <!-- Replace with your actual logo path -->
                </div>

                <!-- Title -->
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                    {{ __('INVENTORI ASET IT') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    {{ __('PT. Surya Hutani Jaya') }}
                </p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                @csrf

                <!-- Username -->
                <div>
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="block mt-1 w-full"
                                 type="text"
                                 name="username"
                                 :value="old('username')"
                                 required
                                 autofocus
                                 autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 required
                                 autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Captcha -->
                <div>
                    <x-input-label for="captcha" :value="__('Captcha Verification')" />
                    <div class="flex items-center gap-4 mt-1">
                        <x-text-input id="captcha"
                                     class="block w-full"
                                     type="text"
                                     name="captcha"
                                     required />
                        <img src="{{ captcha_src('flat') }}"
                             alt="captcha"
                             class="h-10 rounded cursor-pointer"
                             onclick="this.src='{{ captcha_src('flat') }}?'+Math.random()">
                    </div>
                    <x-input-error :messages="$errors->get('captcha')" class="mt-2" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="block">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me"
                                   type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                   name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Remember me') }}
                            </span>
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <x-primary-button class="w-full justify-center">
                    {{ __('Log in') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-guest-layout>
