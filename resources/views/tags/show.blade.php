<x-mkt-dashboard-layout>
    <x-slot name="header">
        <x-mkt-navbar />

        <x-mkt-page-header>
            <h1 class="text-lg leading-6 font-semibold text-gray-900">
                {{ $tag->name }}
            </h1>
        </x-mkt-page-header>
    </x-slot>

    @livewire('marketplaceful::tags.update-tag-form', ['tag' => $tag])

    <x-mkt-section-border />

    <div class="mt-10 sm:mt-0">
        @livewire('marketplaceful::tags.delete-tag-form', ['tag' => $tag])
    </div>
</x-mkt-dashboard-layout>
