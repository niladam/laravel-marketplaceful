<x-mkt-action-section>
    <x-slot name="title">
        Delete User
    </x-slot>

    <x-slot name="description">
        Permanently delete this user.
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            Once a user is deleted, all of its resources and data will be permanently deleted. Before deleting this user, please download any data or information regarding this user that you wish to retain.
        </div>

        <div class="mt-5">
            <x-mkt-danger-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                Delete User
            </x-mkt-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-mkt-confirmation-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                Delete User
            </x-slot>

            <x-slot name="content">
                Are you sure you want to delete this user? Once a user is deleted, all of its resources and data will be permanently deleted.
            </x-slot>

            <x-slot name="footer">
                <x-mkt-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    Nevermind
                </x-mkt-secondary-button>

                <x-mkt-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    Delete User
                </x-mkt-danger-button>
            </x-slot>
        </x-mkt-confirmation-modal>
    </x-slot>
</x-mkt-action-section>
