<x-mkt-form-section submit="updateListing">
    <x-slot name="title">
        Pricing
    </x-slot>

    <x-slot name="description">
        The listing's details information.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="price" value="Price" />
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500">
                        $
                    </span>
                </div>
                <input wire:model.defer="state.price" id="price" class="form-input block w-full pl-7 pr-12" placeholder="0.00" />
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <span class="text-gray-500">
                        USD
                    </span>
                </div>
            </div>
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
