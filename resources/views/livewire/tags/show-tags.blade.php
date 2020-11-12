<x-mkt-layouts.dashboard>
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

    <div class="flex-col space-y-4">
        <x-mkt-table>
            <x-slot name="head">
                <x-mkt-table.heading class="w-full">Tag</x-mkt-table.heading>
                <x-mkt-table.heading class="hidden md:table-cell">Slug</x-mkt-table.heading>
                <x-mkt-table.heading class="hidden md:table-cell whitespace-no-wrap">No. of Listings</x-mkt-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($tags as $tag)
                <x-mkt-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $tag->id }}">
                    <x-mkt-table.cell>
                        <a href="{{ route('marketplaceful::tags.show', $tag) }}" class="group inline-flex truncate text-base leading-6 font-semibold">
                            <h3 class="text-gray-800 truncate group-hover:underline transition ease-in-out duration-150">
                                {{ $tag->name }}
                            </h3>
                        </a>
                    </x-mkt-table.cell>
                    <x-mkt-table.cell class="hidden md:table-cell">
                        <span class="text-gray-700">{{ $tag->slug }}</span>
                    </x-mkt-table.cell>
                    <x-mkt-table.cell class="hidden md:table-cell">
                        <span class="text-gray-500">{{ $tag->listings_count }} listings</span>
                    </x-mkt-table.cell>
                </x-mkt-table.row>
                @empty
                <x-mkt-table.row>
                    <x-mkt-table.cell colspan="3">
                        <div class="flex flex-col justify-center items-center">
                            <span class="font-medium py-8 text-gray-400 text-xl">No listings match the current filter</span>
                            <x-mkt-button href="{{ route('marketplaceful::tags.index') }}">Show all tags</x-mkt-button>
                        </div>
                    </x-mkt-table.cell>
                </x-mkt-table.row>
                @endforelse
            </x-slot>
        </x-mkt-table>

        <div>
            {{ $tags->links() }}
        </div>
    </div>
</x-mkt-layouts.dashboard>
