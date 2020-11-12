<x-mkt-form-section submit="updateListingSettings">
    <x-slot name="title">
        Listing Settings
    </x-slot>

    <x-slot name="description">
        The listing's settings information.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="slug" value="Slug" />
            <x-mkt-input id="slug" type="text" class="mt-1 block w-full" wire:model.defer="state.slug" />
            <x-mkt-input-error for="slug" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <label for="featured" class="flex items-center">
                <input id="featured" type="checkbox" class="form-checkbox" wire:model.defer="state.featured">
                <span class="ml-2 text-sm text-gray-700">{{ 'Feature this listing' }}</span>
            </label>
            <x-mkt-input-error for="featured" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-mkt-action-message class="mr-3" on="saved">
            Saved.
        </x-mkt-action-message>

        <x-mkt-button>
            Save
        </x-mkt-button>
    </x-slot>
</x-mkt-form-section>
