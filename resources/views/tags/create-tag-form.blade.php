<x-mkt-form-section submit="createTag">
    <x-slot name="title">
        Tag Details
    </x-slot>

    <x-slot name="description">
        Create a new tag to manage listings.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-3">
            <x-mkt-label for="name" value="Name" />
            <x-mkt-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-mkt-input-error for="name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-1">
            <x-mkt-label for="color" value="Color" />
            <x-mkt-input id="color" type="text" class="mt-1 block w-full" wire:model.defer="state.color" />
            <x-mkt-input-error for="color" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="slug" value="Slug" />
            <x-mkt-input id="slug" type="text" class="mt-1 block w-full" wire:model.defer="state.slug" />
            <x-mkt-input-error for="slug" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="description" value="Description" />
            <x-mkt-textarea id="description" class="mt-1 block w-full" wire:model.defer="state.description" />
            <x-mkt-input-error for="description" class="mt-2" />
        </div>
        <div x-data="{imageName: null, imagePreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Feature Image File Input -->
            <input type="file" class="hidden"
                        wire:model="image"
                        x-ref="image"
                        x-on:change="
                                imageName = $refs.image.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    imagePreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.image.files[0]);
                        " />

            <x-mkt-label for="image" value="Image" />

            <!-- New Feature Image Preview -->
            <div class="mt-2" x-show="imagePreview">
                <span class="block rounded-full w-20 h-20"
                      x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + imagePreview + '\');'">
                </span>
            </div>

            <x-mkt-secondary-button class="mt-2" type="button" x-on:click.prevent="$refs.image.click()">
                Select A New Image
            </x-mkt-secondary-button>

            <x-mkt-input-error for="image" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-mkt-button>
            Create
        </x-mkt-button>
    </x-slot>
</x-mkt-form-section>
