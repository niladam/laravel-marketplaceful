<x-mkt-form-section submit="updateUser">
    <x-slot name="title">
        Profile Information
    </x-slot>

    <x-slot name="description">
        Update your account's profile information and email address.
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden"
                        wire:model="photo"
                        x-ref="photo"
                        x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                        " />

            <x-mkt-label for="photo" value="Photo" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" class="rounded-full h-20 w-20">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview">
                <span class="block rounded-full w-20 h-20"
                      x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-mkt-secondary-button class="mt-2" type="button" x-on:click.prevent="$refs.photo.click()">
                Select A New Photo
            </x-mkt-secondary-button>

            <x-mkt-input-error for="photo" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="name" value="Name" />
            <x-mkt-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-mkt-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="email" value="Email" />
            <x-mkt-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-mkt-input-error for="email" class="mt-2" />
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
