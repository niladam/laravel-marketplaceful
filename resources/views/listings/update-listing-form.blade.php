<x-mkt-form-section submit="updateListing">
    <x-slot name="title">
        Listing Details
    </x-slot>

    <x-slot name="description">
        The listing's details information.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="title" value="Title" />
            <x-mkt-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="state.title" autofocus />
            <x-mkt-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6">
            <x-mkt-label for="description" value="Description" />
            <x-mkt-textarea id="description" class="mt-1 block w-full" wire:model.defer="state.description" />
            <x-mkt-input-error for="description" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="tags" value="Tags" />
            <div x-data="{
                newTag: '',
                incomingTags: @entangle('currentTags'),
                options: [
                    @foreach ($this->tags->pluck('name', 'id') as $key => $option)
                        { id: '{{ $key }}', name: '{{ $option }}', selected: false },
                    @endforeach
                ],
                selected: [],
                select(index) {
                    if (!this.options[index].selected) {
                        this.options[index].selected = true;
                        this.selected.push(index);
                    } else {
                        this.selected.splice(this.selected.lastIndexOf(index), 1);
                        this.options[index].selected = false
                    }
                    this.incomingTags = this.selectedValues();
                    this.newTag = '';
                },
                remove(index, option) {
                    this.options[option].selected = false;
                    this.selected.splice(index, 1);
                    this.incomingTags = this.selectedValues();
                },
                selectedValues() {
                    return this.selected.map((option) => {
                        return this.options[option].id;
                    })
                },
                loadSelected() {
                    this.incomingTags.forEach((tag) => {
                        index = this.options.findIndex(option => option.id == tag);
                        this.select(index);
                    })
                },
            }" x-init="loadSelected()">
                <select x-model="newTag" x-on:change="select(newTag)" class="form-select rounded-md shadow-sm mt-1 block w-full">
                    <option></option>
                    <template x-for="(option, index) in options" :key="index">
                        <option :value="index" x-text="option.name" x-bind:disabled="option.selected"></option>
                    </template>
                </select>
                <div class="mt-2">
                    <template x-for="(option, index) in selected" :key="index">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium leading-5 bg-gray-100 text-gray-800 mb-2 mr-2">
                            <span class="whitespace-no-wrap" x-text="options[option].name"></span>
                            <button type="button" class="flex-shrink-0 -mr-0.5 ml-1.5 inline-flex text-gray-500 focus:outline-none focus:text-gray-700" x-on:click="remove(index, option)">
                                <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                    <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                                </svg>
                            </button>
                        </span>
                    </template>
                </div>
                <x-mkt-input-error for="tags" class="mt-2" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-mkt-action-message class="mr-3" on="saved">
            Saved.
        </x-mkt-action-message>

        <x-mkt-button>
            Save
        </x-mkt-button>
    </x-slot>
</x-mkt-form-section>
