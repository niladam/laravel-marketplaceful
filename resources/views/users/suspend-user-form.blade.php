<x-jet-action-section>
    <x-slot name="title">
        Suspend User
    </x-slot>

    <x-slot name="description">
        Suspend this user.
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            Once a user is suspended, all of its resources and data will be permanently suspended. Before suspending this user, please download any data or information regarding this user that you wish to retain.
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="$toggle('confirmingUserSuspension')" wire:loading.attr="disabled">
                Suspend User
            </x-jet-danger-button>
        </div>

        <!-- Suspend User Confirmation Modal -->
        <x-jet-confirmation-modal wire:model="confirmingUserSuspension">
            <x-slot name="title">
                Suspend User
            </x-slot>

            <x-slot name="content">
                Are you sure you want to suspend this user? Once a user is suspended, all of its resources and data will be permanently suspended.
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserSuspension')" wire:loading.attr="disabled">
                    Nevermind
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="suspendUser" wire:loading.attr="disabled">
                    Suspend User
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
    </x-slot>
</x-jet-action-section>
