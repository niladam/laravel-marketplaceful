<x-mkt-layouts.guest>
    <x-mkt-authentication-card>
        <x-slot name="logo">
            <x-mkt-authentication-card-logo />
        </x-slot>

        <x-mkt-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-mkt-label for="name" value="{{ __('Name') }}" />
                <x-mkt-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-mkt-label for="email" value="{{ __('Email') }}" />
                <x-mkt-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-mkt-label for="password" value="{{ __('Password') }}" />
                <x-mkt-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-mkt-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-mkt-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-mkt-button class="ml-4">
                    {{ __('Register') }}
                </x-mkt-button>
            </div>
        </form>
    </x-mkt-authentication-card>
</x-mkt-layouts.guest>
