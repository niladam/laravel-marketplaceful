<x-jet-form-section submit="updateUser">
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

            <x-jet-label for="photo" value="Photo" />

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

            <x-jet-secondary-button class="mt-2" type="button" x-on:click.prevent="$refs.photo.click()">
                Select A New Photo
            </x-jet-secondary-button>

            <x-jet-input-error for="photo" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="Name" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="Email" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Role -->
        @if (count($this->roles) > 0)
            <div class="col-span-6 lg:col-span-4">
                <x-jet-label for="role" value="{{ __('Role') }}" />
                <x-jet-input-error for="role" class="mt-2" />

                <div class="mt-1 border border-gray-200 rounded-lg cursor-pointer">
                    @foreach ($this->roles as $index => $role)
                            <div class="px-4 py-3 {{ $index > 0 ? 'border-t border-gray-200' : '' }}"
                                            wire:click="$set('state.role', '{{ $role->key }}')">
                                <div class="{{ isset($state['role']) && $state['role'] !== $role->key ? 'opacity-50' : '' }}">
                                    <!-- Role Name -->
                                    <div class="flex items-center">
                                        <div class="text-sm text-gray-600 {{ $state['role'] == $role->key ? 'font-semibold' : '' }}">
                                            {{ $role->name }}
                                        </div>

                                        @if ($state['role'] == $role->key)
                                            <svg class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        @endif
                                    </div>

                                    <!-- Role Description -->
                                    <div class="mt-2 text-xs text-gray-600">
                                        {{ $role->description }}
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            Saved.
        </x-jet-action-message>

        <x-jet-button>
            Save
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
