<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-10">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-10">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="example@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <span id="email-error" class="text-red-600" style="display: none;">This email is already taken.</span>
            <span id="email-success" class="text-green-600" style="display: none;">This email is available.</span>
        </div>

        <!-- Password -->
        <div class="mb-10">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />

            <div id="passwordRestrictions" class="mt-2 text-sm"></div>

            <!-- Input errors -->
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-10">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#email').on('blur', function() {
            var email = $(this).val();
            if (email) {
                $.ajax({
                    url: '{{ route('check-email') }}',
                    method: 'POST',
                    data: {
                        email: email,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.exists) {
                            $('#email-error').show();
                            $('#email-success').hide();
                        } else {
                            $('#email-error').hide();
                            $('#email-success').show();
                        }
                    }
                });
            }
        });
    });

    const passwordInput = document.getElementById('password');
    const passwordRestrictions = document.getElementById('passwordRestrictions');

    passwordInput.addEventListener('focus', function() {
        updatePasswordRestrictions();
    });

    passwordInput.addEventListener('input', function() {
        updatePasswordRestrictions();
    });

    function updatePasswordRestrictions() {
        const password = passwordInput.value;

        const restrictions = [];

        if (password.length < 10) {
            restrictions.push('<div class="text-red-600">At least 10 characters</div>');
        } else {
            restrictions.push('<div class="text-green-600">At least 10 characters</div>');
        }

        if (!/[A-Z]/.test(password)) {
            restrictions.push('<div class="text-red-600">At least 1 uppercase letter</div>');
        } else {
            restrictions.push('<div class="text-green-600">At least 1 uppercase letter</div>');
        }

        if (!/[a-z]/.test(password)) {
            restrictions.push('<div class="text-red-600">At least 1 lowercase letter</div>');
        } else {
            restrictions.push('<div class="text-green-600">At least 1 lowercase letter</div>');
        }

        if (!/\d/.test(password)) {
            restrictions.push('<div class="text-red-600">At least 1 digit</div>');
        } else {
            restrictions.push('<div class="text-green-600">At least 1 digit</div>');
        }

        if (!/[\W_]/.test(password)) {
            restrictions.push('<div class="text-red-600">At least 1 special character</div>');
        } else {
            restrictions.push('<div class="text-green-600">At least 1 special character</div>');
        }

        passwordRestrictions.innerHTML = restrictions.join('');

        const allGreen = restrictions.every(restriction => restriction.includes('text-green-600'));

        if (allGreen) {
            passwordRestrictions.innerHTML = '<div class="text-green-600">Password meets requirements</div>';
        }
    }
</script>
