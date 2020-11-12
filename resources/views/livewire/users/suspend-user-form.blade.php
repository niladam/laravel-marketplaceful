<div>
    <x-mkt-secondary-button wire:click="$toggle('confirmingUserSuspension')" wire:loading.attr="disabled">
        Suspend
    </x-mkt-secondary-button>

    <!-- Suspend User Confirmation Modal -->
    <x-mkt-confirmation-modal wire:model="confirmingUserSuspension">
        <x-slot name="title">
            Suspend User
        </x-slot>

        <x-slot name="content">
            Are you sure you want to suspend this user? This user will no longer be able to log in but their listings will be kept.
        </x-slot>

        <x-slot name="footer">
            <x-mkt-secondary-button wire:click="$toggle('confirmingUserSuspension')" wire:loading.attr="disabled">
                Nevermind
            </x-mkt-secondary-button>

            <x-mkt-danger-button class="ml-2" wire:click="suspendUser" wire:loading.attr="disabled">
                Suspend User
            </x-mkt-danger-button>
        </x-slot>
    </x-mkt-confirmation-modal>
</div>
