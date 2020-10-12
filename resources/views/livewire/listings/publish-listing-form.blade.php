<x-mkt-action-section>
    <x-slot name="title">
        Publish Listing
    </x-slot>

    <x-slot name="description">
        Publish this listing.
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            Once a listing is published, it will be public to the users.
        </div>

        <div class="mt-5">
            <x-mkt-danger-button wire:click="$toggle('confirmingListingPublication')" wire:loading.attr="disabled">
                Publish Listing
            </x-mkt-danger-button>
        </div>

        <!-- Publish Listing Confirmation Modal -->
        <x-mkt-confirmation-modal wire:model="confirmingListingPublication">
            <x-slot name="title">
                Publish Listing
            </x-slot>

            <x-slot name="content">
                Are you sure you want to publish this listing?.
            </x-slot>

            <x-slot name="footer">
                <x-mkt-secondary-button wire:click="$toggle('confirmingListingPublication')" wire:loading.attr="disabled">
                    Nevermind
                </x-mkt-secondary-button>

                <x-mkt-danger-button class="ml-2" wire:click="publishListing" wire:loading.attr="disabled">
                    Publish Listing
                </x-mkt-danger-button>
            </x-slot>
        </x-mkt-confirmation-modal>
    </x-slot>
</x-mkt-action-section>
