<x-mkt-dashboard-layout>
    <x-slot name="header">
        <x-mkt-navbar />

        <x-mkt-page-header>
            <h1 class="text-lg leading-6 font-semibold text-gray-900">
                {{ $listing->title }}
            </h1>
        </x-mkt-page-header>
    </x-slot>

    <livewire:marketplaceful::listings.update-listing-form :listing="$listing" />

    <x-mkt-section-border />

    <div class="mt-10 sm:mt-0">
        <livewire:marketplaceful::listings.delete-listing-form :listing="$listing" />
    </div>
</x-mkt-dashboard-layout>
