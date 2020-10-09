<x-mkt-dashboard-layout>
    <x-slot name="header">
        <x-mkt-navbar />

        <x-mkt-page-header>
            <h1 class="text-lg leading-6 font-semibold text-gray-900">
                {{ $user->name }}
            </h1>
        </x-mkt-page-header>
    </x-slot>

    <livewire:marketplaceful::users.update-user-form :user="$user" />

    @if ($user->isActive())
        <x-mkt-section-border />

        <div class="mt-10 sm:mt-0">
            <livewire:marketplaceful::users.suspend-user-form :user="$user" />
        </div>
    @elseif ($user->isSuspended())
        <x-mkt-section-border />

        <div class="mt-10 sm:mt-0">
            <livewire:marketplaceful::users.un-suspend-user-form :user="$user" />
        </div>
    @endif

    <x-mkt-section-border />

    <div class="mt-10 sm:mt-0">
        <livewire:marketplaceful::users.delete-user-form :user="$user" />
    </div>
</x-mkt-dashboard-layout>
