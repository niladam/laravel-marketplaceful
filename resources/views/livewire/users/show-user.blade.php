<x-mkt-layouts.dashboard>
    <x-slot name="header">
        <x-mkt-navbar />

        <x-mkt-page-header>
            <x-mkt-page-heading-with-actions>
                <h1 class="text-2xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    {{ $user->name }}
                </h1>

                <x-slot name="actions">
                    @if ($user->isActive())
                    <livewire:marketplaceful::users.suspend-user-form :user="$user" />
                    @elseif ($user->isSuspended())
                    <livewire:marketplaceful::users.un-suspend-user-form :user="$user" />
                    @endif
                </x-slot>
            </x-mkt-page-heading-with-actions>
        </x-mkt-page-header>
    </x-slot>

    <livewire:marketplaceful::users.update-user-form :user="$user" />

    <x-mkt-section-border />

    <div class="mt-10 sm:mt-0">
        <livewire:marketplaceful::users.delete-user-form :user="$user" />
    </div>
</x-mkt-layouts.dashboard>
