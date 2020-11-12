<x-mkt-layouts.dashboard>
    <x-slot name="header">
        <x-mkt-navbar />

        <x-mkt-page-header>
            <h1 class="text-2xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                Create Listing
            </h1>
        </x-mkt-page-header>
    </x-slot>

    <livewire:marketplaceful::listings.create-listing-form />
</x-mkt-layouts.dashboard>
