<x-mkt-action-section>
    <x-slot name="title">
        Un-Suspend User
    </x-slot>

    <x-slot name="description">
        Un-Suspend this user.
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            Once a user is un-suspended, all of its resources and data will be permanently un-suspended. Before un-suspending this user, please download any data or information regarding this user that you wish to retain.
        </div>

        <div class="mt-5">
            <x-mkt-danger-button wire:click="$toggle('confirmingUserUnSuspension')" wire:loading.attr="disabled">
                Un-Suspend User
            </x-mkt-danger-button>
        </div>

        <!-- Un-Suspend User Confirmation Modal -->
        <x-mkt-confirmation-modal wire:model="confirmingUserUnSuspension">
            <x-slot name="title">
                Un-Suspend User
            </x-slot>

            <x-slot name="content">
                Are you sure you want to un-suspend this user? Once a user is un-suspended, all of its resources and data will be permanently un-suspended.
            </x-slot>

            <x-slot name="footer">
                <x-mkt-secondary-button wire:click="$toggle('confirmingUserUnSuspension')" wire:loading.attr="disabled">
                    Nevermind
                </x-mkt-secondary-button>

                <x-mkt-danger-button class="ml-2" wire:click="unSuspendUser" wire:loading.attr="disabled">
                    Un-Suspend User
                </x-mkt-danger-button>
            </x-slot>
        </x-mkt-confirmation-modal>
    </x-slot>
</x-mkt-action-section>
