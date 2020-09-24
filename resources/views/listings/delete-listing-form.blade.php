<x-mkt-action-section>
    <x-slot name="title">
        Delete Listing
    </x-slot>

    <x-slot name="description">
        Permanently delete this listing.
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            Once a listing is deleted, all of its resources and data will be permanently deleted. Before deleting this listing, please download any data or information regarding this listing that you wish to retain.
        </div>

        <div class="mt-5">
            <x-mkt-danger-button wire:click="$toggle('confirmingListingDeletion')" wire:loading.attr="disabled">
                Delete Listing
            </x-mkt-danger-button>
        </div>

        <!-- Delete Listing Confirmation Modal -->
        <x-mkt-confirmation-modal wire:model="confirmingListingDeletion">
            <x-slot name="title">
                Delete Listing
            </x-slot>

            <x-slot name="content">
                Are you sure you want to delete this listing? Once a listing is deleted, all of its resources and data will be permanently deleted.
            </x-slot>

            <x-slot name="footer">
                <x-mkt-secondary-button wire:click="$toggle('confirmingListingDeletion')" wire:loading.attr="disabled">
                    Nevermind
                </x-mkt-secondary-button>

                <x-mkt-danger-button class="ml-2" wire:click="deleteListing" wire:loading.attr="disabled">
                    Delete Listing
                </x-mkt-danger-button>
            </x-slot>
        </x-mkt-confirmation-modal>
    </x-slot>
</x-mkt-action-section>
