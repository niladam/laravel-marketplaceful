<x-mkt-layouts.dashboard>
    <x-slot name="header">
        <x-mkt-navbar />

        <x-mkt-page-header>
            <x-mkt-page-heading-with-actions>
                <h1 class="text-2xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    Listings
                </h1>

                <x-slot name="actions">
                    <div class="flex space-x-4">
                        <div class="flex justify-end">
                            <div class="rounded-md shadow-sm flex bg-white">
                                <div>
                                    <select wire:model="filters.status" id="filter-status aria-label="Status" class="form-select relative block w-full rounded-none rounded-l-md bg-transparent focus:z-10 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        <option value="">All listings</option>
                                        @foreach (Marketplaceful\Models\Listing::STATUSES as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="-ml-px">
                                    <input wire:model="filters.search" placeholder="Search Listings..." aria-label="Search Listings" class="form-input relative block w-full rounded-none rounded-r-md bg-transparent focus:z-10 transition ease-in-out duration-150 sm:text-sm sm:leading-5" />
                                </div>
                            </div>
                        </div>
                        <x-mkt-button href="{{ route('marketplaceful::listings.create') }}">
                            Create Listing
                        </x-mkt-button>
                    </div>
                </x-slot>
            </x-mkt-page-heading-with-actions>
        </x-mkt-page-header>
    </x-slot>

    <div class="flex-col space-y-4">
        <x-mkt-table>
            <x-slot name="head">
                <x-mkt-table.heading sortable wire:click="sortBy('title')" :direction="$sortField === 'title' ? $sortDirection : null" class="w-full">Title</x-mkt-table.heading>
                <x-mkt-table.heading sortable wire:click="sortBy('status')" :direction="$sortField === 'status' ? $sortDirection : null" class="hidden md:table-cell">Status</x-mkt-table.heading>
                <x-mkt-table.heading sortable wire:click="sortBy('updated_at')" :direction="$sortField === 'updated_at' ? $sortDirection : null" class="hidden md:table-cell whitespace-no-wrap">Last Update</x-mkt-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($listings as $listing)
                <x-mkt-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $listing->id }}">
                    <x-mkt-table.cell>
                        <div class="flex flex-col">
                            <a href="{{ route('marketplaceful::listings.show', $listing) }}" class="group inline-flex truncate text-base leading-6 font-semibold">
                                <h3 class="text-gray-800 truncate group-hover:underline transition ease-in-out duration-150">
                                    {{ $listing->title }}
                                </h3>
                            </a>
                            <p class="text-gray-400 truncate leading-5">
                                By <a href="{{ route('marketplaceful::users.show', $listing->author) }}" class="font-medium hover:underline">{{ $listing->author->name }}</a>
                            </p>
                            <span class="md:hidden pt-1">
                                <x-mkt-status-badge :color="$listing->status_color">
                                    {{ $listing->status_label }}
                                </x-mkt-status-badge>
                            </span>
                        </div>
                    </x-mkt-table.cell>
                    <x-mkt-table.cell class="hidden md:table-cell">
                        <x-mkt-status-badge :color="$listing->status_color">
                            {{ $listing->status_label }}
                        </x-mkt-status-badge>
                    </x-mkt-table.cell>
                    <x-mkt-table.cell class="hidden md:table-cell">
                        <span class="text-gray-500">{{ $listing->updated_at->diffForHumans() }}</span>
                    </x-mkt-table.cell>
                </x-mkt-table.row>
                @empty
                <x-mkt-table.row>
                    <x-mkt-table.cell colspan="3">
                        <div class="flex flex-col justify-center items-center">
                            <span class="font-medium py-8 text-gray-400 text-xl">No listings match the current filter</span>
                            <x-mkt-button href="{{ route('marketplaceful::listings.index') }}">Show all listings</x-mkt-button>
                        </div>
                    </x-mkt-table.cell>
                </x-mkt-table.row>
                @endforelse
            </x-slot>
        </x-mkt-table>

        <div>
            {{ $listings->links() }}
        </div>
    </div>
</x-mkt-layouts.dashboard>
