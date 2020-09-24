<x-mkt-dashboard-layout>
    <x-slot name="header">
        <x-mkt-navbar />

        <x-mkt-page-header>
            <x-mkt-page-heading-with-actions>
                <h1 class="text-lg leading-6 font-semibold text-gray-900">
                    Tags
                </h1>

                <x-slot name="actions">
                    <x-mkt-button href="{{ route('marketplaceful::tags.create') }}">
                        Create Tag
                    </x-mkt-button>
                </x-slot>
            </x-mkt-page-heading-with-actions>
        </x-mkt-page-header>
    </x-slot>

    @livewire('marketplaceful::tags.tag-list', ['tags' => $tags])
</x-mkt-dashboard-layout>
