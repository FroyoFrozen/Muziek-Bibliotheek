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




<script>
    const passwordInput = document.getElementById('password');
    const passwordRestrictions = document.getElementById('passwordRestrictions');

    // Add an event listener for focus on the password field
    passwordInput.addEventListener('focus', function() {
        updatePasswordRestrictions();
    });

    // Add an event listener for input on the password field
    passwordInput.addEventListener('input', function() {
        updatePasswordRestrictions();
    });

    function updatePasswordRestrictions() {
        const password = passwordInput.value;

        // Perform your password restrictions here and update the displayed text and color accordingly
        const restrictions = [];

        // Example restrictions: at least 10 characters
        if (password.length < 10) {
            restrictions.push('<div class="text-red-600">At least 10 characters</div>');
        } else {
            restrictions.push('<div class="text-green-600">At least 10 characters</div>');
        }

        // Example restrictions: at least 1 uppercase letter
        if (!/[A-Z]/.test(password)) {
            restrictions.push('<div class="text-red-600">At least 1 uppercase letter</div>');
        } else {
            restrictions.push('<div class="text-green-600">At least 1 uppercase letter</div>');
        }

        // Example restrictions: at least 1 lowercase letter
        if (!/[a-z]/.test(password)) {
            restrictions.push('<div class="text-red-600">At least 1 lowercase letter</div>');
        } else {
            restrictions.push('<div class="text-green-600">At least 1 lowercase letter</div>');
        }

        // Example restrictions: at least 1 digit
        if (!/\d/.test(password)) {
            restrictions.push('<div class="text-red-600">At least 1 digit</div>');
        } else {
            restrictions.push('<div class="text-green-600">At least 1 digit</div>');
        }

        // Example restrictions: at least 1 special character
        if (!/[\W_]/.test(password)) {
            restrictions.push('<div class="text-red-600">At least 1 special character</div>');
        } else {
            restrictions.push('<div class="text-green-600">At least 1 special character</div>');
        }

        // Display restrictions
        passwordRestrictions.innerHTML = restrictions.join('');

        // Check if all restrictions are green
        const allGreen = restrictions.every(restriction => restriction.includes('text-green-600'));

        // Change the color of the restrictions if everything is green
        if (allGreen) {
            passwordRestrictions.innerHTML = '<div class="text-green-600">Password meets requirements</div>';
        }
    }
</script>
