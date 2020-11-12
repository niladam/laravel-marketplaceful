<x-mkt-form-section submit="updateListingSettings">
    <x-slot name="title">
        Listing Metadata
    </x-slot>

    <x-slot name="description">
        The listing's metadata information.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <x-mkt-label for="public" value="Public" />
            <x-mkt-textarea id="public" rows="3" class="mt-1 block w-full" wire:model.defer="state.public" />
            <x-mkt-input-error for="public" class="mt-2" />
        </div>

        <div class="col-span-6">
            <x-mkt-label for="private" value="Private" />
            <x-mkt-textarea id="private" rows="3" class="mt-1 block w-full" wire:model.defer="state.private" />
            <x-mkt-input-error for="private" class="mt-2" />
        </div>

        <div class="col-span-6">
            <x-mkt-label for="internal" value="Internal" />
            <x-mkt-textarea id="internal" rows="3" class="mt-1 block w-full" wire:model.defer="state.internal" />
            <x-mkt-input-error for="internal" class="mt-2" />
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
