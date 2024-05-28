<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
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
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
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

    // Voeg een eventlistener toe voor input op het wachtwoordveld
    passwordInput.addEventListener('input', function() {
        const password = this.value;

        // Voer hier je wachtwoordrestricties uit en update de weergegeven tekst en kleur dienovereenkomstig
        const restrictions = [];

        // Voorbeeld restricties: minimaal 10 tekens
        if (password.length < 10) {
            restrictions.push('Minimaal 10 tekens');
        }

        // Voorbeeld restricties: minimaal 1 hoofdletter
        if (!/[A-Z]/.test(password)) {
            restrictions.push('Minimaal 1 hoofdletter');
        }

        // Voorbeeld restricties: minimaal 1 kleine letter
        if (!/[a-z]/.test(password)) {
            restrictions.push('Minimaal 1 kleine letter');
        }

        // Voorbeeld restricties: minimaal 1 cijfer
        if (!/\d/.test(password)) {
            restrictions.push('Minimaal 1 cijfer');
        }

        // Voorbeeld restricties: minimaal 1 speciaal teken
        if (!/[\W_]/.test(password)) {
            restrictions.push('Minimaal 1 speciaal teken');
        }

        // Update de weergegeven tekst en kleur
        if (restrictions.length > 0) {
            passwordRestrictions.innerHTML = restrictions.map(restriction => `<div class="text-red-600">${restriction}</div>`).join('');
        } else {
            passwordRestrictions.innerHTML = '<div class="text-green-600">Wachtwoord voldoet aan de vereisten</div>';
        }
    });
</script>
