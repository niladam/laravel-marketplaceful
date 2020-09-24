<x-mkt-dashboard-layout>
    <x-slot name="header">
        <x-mkt-navbar />

        <x-mkt-page-header>
            <h1 class="text-lg leading-6 font-semibold text-gray-900">
                Create Listing
            </h1>
        </x-mkt-page-header>
    </x-slot>

    @livewire('marketplaceful::listings.create-listing-form')
</x-mkt-dashboard-layout>
