<x-guest-layout>
    <div class="w-full max-w-xl mx-auto my-10 border border-gray-300 rounded-lg bg-white shadow-md mt-10">
        <div class="px-6 py-8">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900">Verify OTP</h2>
                <p class="mt-2 text-base text-gray-600">Enter the OTP sent to your email</p>
            </div>

            <form method="POST" action="{{ route('otp.verify') }}" class="space-y-6">
                @csrf

                <!-- OTP Input -->
                <div>
                    <x-input-label for="otp" :value="__('Enter OTP')" class="text-base font-medium text-gray-700" />
                    <div class="mt-1 flex justify-between space-x-2">
                        <input type="text" name="otp1" maxlength="1" pattern="[0-9]" required autofocus
                            class="w-full h-12 text-center text-base border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'');if(this.value.length===1)this.nextElementSibling.focus()">
                        <input type="text" name="otp2" maxlength="1" pattern="[0-9]" required
                            class="w-full h-12 text-center text-base border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'');if(this.value.length===1)this.nextElementSibling.focus()">
                        <input type="text" name="otp3" maxlength="1" pattern="[0-9]" required
                            class="w-full h-12 text-center text-base border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'');if(this.value.length===1)this.nextElementSibling.focus()">
                        <input type="text" name="otp4" maxlength="1" pattern="[0-9]" required
                            class="w-full h-12 text-center text-base border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'');if(this.value.length===1)this.nextElementSibling.focus()">
                        <input type="text" name="otp5" maxlength="1" pattern="[0-9]" required
                            class="w-full h-12 text-center text-base border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'');if(this.value.length===1)this.nextElementSibling.focus()">
                        <input type="text" name="otp6" maxlength="1" pattern="[0-9]" required
                            class="w-full h-12 text-center text-base border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                    </div>
                    <input type="hidden" id="otp" name="otp">
                    <x-input-error :messages="$errors->get('otp')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Combined Actions Row -->
                <div class="flex items-center justify-between mt-6 mb-6 pl-4 pr-4">
                    <div class="flex-1">
                        <button type="button" onclick="resendOtp()"
                            class="text-base font-medium text-indigo-600 hover:text-indigo-800 hover:underline">
                            Resend OTP
                        </button>
                    </div>
                    
                    <div class="flex-shrink-0">
                        <x-primary-button
                            class="py-3 px-6 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md text-base focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            onclick="combineOtp()">
                            Verify
                        </x-primary-button>
                    </div>
                </div>
            </form>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mt-3 p-2 bg-green-100 text-green-700 text-base rounded text-center">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <script>
        function combineOtp() {
            const otp1 = document.querySelector('input[name="otp1"]').value;
            const otp2 = document.querySelector('input[name="otp2"]').value;
            const otp3 = document.querySelector('input[name="otp3"]').value;
            const otp4 = document.querySelector('input[name="otp4"]').value;
            const otp5 = document.querySelector('input[name="otp5"]').value;
            const otp6 = document.querySelector('input[name="otp6"]').value;
            
            const fullOtp = otp1 + otp2 + otp3 + otp4 + otp5 + otp6;
            document.getElementById('otp').value = fullOtp;
        }

        function resendOtp() {
            fetch("{{ route('otp.resend') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    email: "{{ session('email') }}"
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    alert('OTP resent successfully!');
                } else {
                    alert('Failed to resend OTP. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while resending OTP.');
            });
        }
    </script>
</x-guest-layout>