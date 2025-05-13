<x-guest-layout>
    <div class="w-full max-w-xl mx-auto my-10 border border-gray-300 rounded-lg bg-white shadow-md mt-10">
        <div class="px-6 py-8">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900">Register</h2>
                <p class="mt-2 text-base text-gray-600">Create your account below</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Full Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" class="text-base font-medium text-gray-700" />
                    <x-text-input
                        id="name"
                        name="name"
                        type="text"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email Address')" class="text-base font-medium text-gray-700" />
                    <x-text-input
                        id="email"
                        name="email"
                        type="email"
                        :value="old('email')"
                        required
                        autocomplete="email"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-base font-medium text-gray-700" />
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        required
                        autocomplete="new-password"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-base font-medium text-gray-700" />
                    <x-text-input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        required
                        autocomplete="new-password"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base"
                    />
                </div>

                <!-- Combined Actions Row -->
                <div class="flex items-center justify-between mt-6 mb-6 pl-4 pr-4">
                    <div class="flex-1">
                        <a
                            href="{{ route('login') }}"
                            class="text-base font-medium text-indigo-600 hover:text-indigo-800 hover:underline"
                        >
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                    
                    <div class="flex-shrink-0">
                        <x-primary-button
                            class="py-3 px-6 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md text-base focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>