<x-mkt-dashboard-layout>
    <x-slot name="header">
        <x-mkt-navbar />

        <x-mkt-page-header>
            <x-mkt-page-heading-with-actions>
                <h1 class="text-lg leading-6 font-semibold text-gray-900">
                    Listings
                </h1>

                <x-slot name="actions">
                    <x-mkt-button href="{{ route('marketplaceful::listings.create') }}">
                        Create Listing
                    </x-mkt-button>
                </x-slot>
            </x-mkt-page-heading-with-actions>
        </x-mkt-page-header>
    </x-slot>

    @livewire('marketplaceful::listings.listing-list')
</x-mkt-dashboard-layout>
