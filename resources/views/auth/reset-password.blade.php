<x-mkt-layouts.guest>
    <x-mkt-authentication-card>
        <x-slot name="logo">
            <x-mkt-authentication-card-logo />
        </x-slot>

        <x-mkt-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-mkt-label for="email" value="{{ __('Email') }}" />
                <x-mkt-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
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
                <x-mkt-button>
                    {{ __('Reset Password') }}
                </x-mkt-button>
            </div>
        </form>
    </x-mkt-authentication-card>
</x-mkt-layouts.guest>
