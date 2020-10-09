<x-mkt-dashboard-layout>
    <x-slot name="header">
        <x-mkt-navbar />

        <x-mkt-page-header>
            <h1 class="text-lg leading-6 font-semibold text-gray-900">
                Users
            </h1>
        </x-mkt-page-header>
    </x-slot>

    @if ($activeUsers->isNotEmpty())
        <x-mkt-action-section>
            <x-slot name="title">
                Active Users
            </x-slot>

            <x-slot name="description">
                All of the active people.
            </x-slot>

            <x-slot name="content">
                <div class="-mx-4 -my-5 sm:-m-6 sm:rounded-lg overflow-hidden">
                    <livewire:marketplaceful::users.user-list :users="$activeUsers" />
                </div>
            </x-slot>
        </x-mkt-action-section>
    @endif

    @if ($suspendedUsers->isNotEmpty())
        <x-mkt-section-border />

        <!-- Manage Team Members -->
        <div class="mt-10 sm:mt-0">
            <x-mkt-action-section>
                <x-slot name="title">
                    Suspended Users
                </x-slot>

                <x-slot name="description">
                    All of the suspended people.
                </x-slot>

                <x-slot name="content">
                    <div class="-mx-4 -my-5 sm:-m-6 sm:rounded-lg overflow-hidden">
                        <livewire:marketplaceful::users.user-list :users="$suspendedUsers" />
                    </div>
                </x-slot>
            </x-mkt-action-section>
        </div>
    @endif
</x-mkt-dashboard-layout>
