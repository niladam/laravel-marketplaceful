<x-mkt-form-section submit="updateListing">
    <x-slot name="title">
        Pricing
    </x-slot>

    <x-slot name="description">
        The listing's details information.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-3">
            <x-mkt-label for="price" value="Price" />
            <x-mkt-input id="price" type="text" class="mt-1 block w-full" wire:model.defer="state.price" autofocus />
            <x-mkt-input-error for="price" class="mt-2" />
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
