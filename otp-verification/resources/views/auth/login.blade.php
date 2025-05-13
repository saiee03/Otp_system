<x-guest-layout>
    <div class="max-w-md mx-auto my-6 border border-gray-300 rounded-lg p-6 bg-white">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Login In</h2>
            <p class="mt-2 text-base text-gray-600">Enter your email to receive a one-time otp</p>
        </div>

        <form method="POST" action="{{ route('otp.send') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email Address')" class="block text-base font-medium text-gray-700" />
                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="email"
                    class="mt-1 block w-full px-5 py-4 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base placeholder-gray-400 transition duration-150 ease-in-out"
                    placeholder="you@example.com"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-base text-red-600" />
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mt-6">
                <a
                    href="{{ route('register') }}"
                    class="text-base font-medium text-indigo-600 hover:text-indigo-800 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out"
                >
                    {{ __('Not registered?') }}
                </a>

                <x-primary-button
                    class="py-4 px-8 bg-black hover:bg-gray-800 text-white font-medium rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition duration-150 ease-in-out"
                >
                    {{ __('Send OTP') }}
                </x-primary-button>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mt-6 p-4 bg-green-100 text-green-700 text-base rounded-lg text-center">
                    {{ session('status') }}
                </div>
            @endif
        </form>
    </div>
</x-guest-layout>