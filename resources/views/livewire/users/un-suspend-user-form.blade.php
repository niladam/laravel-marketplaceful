<div>
    <x-mkt-button wire:click="$toggle('confirmingUserUnSuspension')" wire:loading.attr="disabled">
        Un-Suspend
    </x-mkt-button>

    <!-- Un-Suspend User Confirmation Modal -->
    <x-mkt-confirmation-modal wire:model="confirmingUserUnSuspension">
        <x-slot name="title">
            Un-Suspend User
        </x-slot>

        <x-slot name="content">
            Are you sure you want to un-suspend this user? This user will be able to log in again and will have the same permissions they had previously.
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
</div>
