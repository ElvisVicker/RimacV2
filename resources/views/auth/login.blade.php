<x-guest-layout id="loginForm">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form class="login-form-cus" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            {{-- <x-input-error id="errorEmail" :messages="$errors->get('email')" class="mt-2" /> --}}
            <div id="errorEmail" class="mt-2" style="color:red;"></div>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            {{-- <div id="errorPassword" class="mt-2" style="color:red;"></div> --}}
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>


    {{-- @include('auth.fetch_login') --}}
</x-guest-layout>

<script src="{{ asset('assets/client/js/jquery-2.1.0.min.js') }}"></script>
<script src="{{ asset('assets/client/js/popper.js') }}"></script>
<script src="{{ asset('assets/client/js/bootstrap.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(document).on('keyup', '#email', function(event) {
            event.preventDefault();
            let email = $('#email').val();
            let password = $('#password').val();
            $.ajax({
                type: "GET",
                url: "{{ route('fetch_data_login') }}",
                data: {
                    email: email,
                    password: password
                },
                success: function(data) {
                    $("#errorEmail").text(data.success);

                }

            });
        });
    });
</script>
