<x-mkt-action-section>
    <x-slot name="title">
        Delete Tag
    </x-slot>

    <x-slot name="description">
        Permanently delete this tag.
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            Once a tag is deleted, all of its resources and data will be permanently deleted. Before deleting this tag, please download any data or information regarding this tag that you wish to retain.
        </div>

        <div class="mt-5">
            <x-mkt-danger-button wire:click="$toggle('confirmingTagDeletion')" wire:loading.attr="disabled">
                Delete Tag
            </x-mkt-danger-button>
        </div>

        <!-- Delete Tag Confirmation Modal -->
        <x-mkt-confirmation-modal wire:model="confirmingTagDeletion">
            <x-slot name="title">
                Delete Tag
            </x-slot>

            <x-slot name="content">
                Are you sure you want to delete this tag? Once a tag is deleted, all of its resources and data will be permanently deleted.
            </x-slot>

            <x-slot name="footer">
                <x-mkt-secondary-button wire:click="$toggle('confirmingTagDeletion')" wire:loading.attr="disabled">
                    Nevermind
                </x-mkt-secondary-button>

                <x-mkt-danger-button class="ml-2" wire:click="deleteTag" wire:loading.attr="disabled">
                    Delete Tag
                </x-mkt-danger-button>
            </x-slot>
        </x-mkt-confirmation-modal>
    </x-slot>
</x-mkt-action-section>
