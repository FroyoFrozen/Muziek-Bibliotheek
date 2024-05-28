<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            @if ($errors->has('password'))
                @foreach ($errors->get('password') as $error)
                    <div class="bg-red-500 text-white p-2 rounded mt-1 flex justify-between items-center" role="alert">
                        <span>{{ $error }}</span>
                        <button type="button" class="ml-4" onclick="this.parentElement.style.display='none';">✕</button>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
