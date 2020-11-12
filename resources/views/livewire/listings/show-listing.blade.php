<x-mkt-layouts.dashboard>
    <x-slot name="header">
        <x-mkt-navbar />

        <x-mkt-page-header>
            <x-mkt-page-heading-with-actions>
                <h1 class="text-2xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    {{ $listing->title }}
                </h1>

                <x-slot name="actions">
                    @if ($listing->isPublished())
                    <livewire:marketplaceful::listings.un-publish-listing-form :listing="$listing" />
                    @else
                    <livewire:marketplaceful::listings.publish-listing-form :listing="$listing" />
                    @endif
                </x-slot>
            </x-mkt-page-heading-with-actions>
        </x-mkt-page-header>
    </x-slot>

    <livewire:marketplaceful::listings.update-listing-form :listing="$listing" />

    <x-mkt-section-border />

    <livewire:marketplaceful::listings.update-listing-settings-form :listing="$listing" />

    <x-mkt-section-border />

    <livewire:marketplaceful::listings.update-listing-metadata-form :listing="$listing" />

    <x-mkt-section-border />

    <div class="mt-10 sm:mt-0">
        <livewire:marketplaceful::listings.delete-listing-form :listing="$listing" />
    </div>
</x-mkt-layouts.dashboard>
