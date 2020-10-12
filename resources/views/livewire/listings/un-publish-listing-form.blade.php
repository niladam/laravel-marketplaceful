<x-mkt-action-section>
    <x-slot name="title">
        Un-publish Listing
    </x-slot>

    <x-slot name="description">
        Un-publish this listing.
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            Once a listing is un-published, it will be no longer public to the users.
        </div>

        <div class="mt-5">
            <x-mkt-danger-button wire:click="$toggle('confirmingListingUnPublication')" wire:loading.attr="disabled">
                Un-publish Listing
            </x-mkt-danger-button>
        </div>

        <!-- Publish Listing Confirmation Modal -->
        <x-mkt-confirmation-modal wire:model="confirmingListingUnPublication">
            <x-slot name="title">
                Un-publish Listing
            </x-slot>

            <x-slot name="content">
                Are you sure you want to un-publish this listing?.
            </x-slot>

            <x-slot name="footer">
                <x-mkt-secondary-button wire:click="$toggle('confirmingListingUnPublication')" wire:loading.attr="disabled">
                    Nevermind
                </x-mkt-secondary-button>

                <x-mkt-danger-button class="ml-2" wire:click="unPublishListing" wire:loading.attr="disabled">
                    Un-Publish Listing
                </x-mkt-danger-button>
            </x-slot>
        </x-mkt-confirmation-modal>
    </x-slot>
</x-mkt-action-section>
