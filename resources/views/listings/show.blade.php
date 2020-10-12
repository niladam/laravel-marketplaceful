<x-mkt-layouts.dashboard>
    <x-slot name="header">
        <x-mkt-navbar />

        <x-mkt-page-header>
            <h1 class="text-lg leading-6 font-semibold text-gray-900">
                {{ $listing->title }}
            </h1>
        </x-mkt-page-header>
    </x-slot>

    <livewire:marketplaceful::listings.update-listing-form :listing="$listing" />

    @if ($listing->isDraft())
        <x-mkt-section-border />

        <div class="mt-10 sm:mt-0">
            <livewire:marketplaceful::listings.publish-listing-form :listing="$listing" />
        </div>
    @else
        <x-mkt-section-border />

        <div class="mt-10 sm:mt-0">
            <livewire:marketplaceful::listings.un-publish-listing-form :listing="$listing" />
        </div>
    @endif

    <x-mkt-section-border />

    <div class="mt-10 sm:mt-0">
        <livewire:marketplaceful::listings.delete-listing-form :listing="$listing" />
    </div>
</x-mkt-layouts.dashboard>
