<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="form">
        <div class="py-6 px-4 sm:p-6 lg:pb-8">
            <div>
                <h2 class="text-lg leading-6 font-medium text-gray-900">Mi Perfil</h2>
                <p class="mt-1 text-sm text-gray-500">
                    Actualiza la Información de tu Perfil.
                </p>
            </div>

            <div class="mt-6 flex flex-col lg:flex-row">
                <div class="flex-grow space-y-6">
                    <div class="mt-6 grid grid-cols-12 gap-6">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text"
                                   wire:model.defer="state.first_name"
                                   autocomplete="first_name"
                                   id="first-name"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label for="last-name" class="block text-sm font-medium text-gray-700">Apellido</label>
                            <input type="text"
                                   wire:model.defer="state.last_name"
                                   id="last-name"
                                   autocomplete="family-name"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                        </div>

                        <div class="col-span-12">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="text"
                                   wire:model.defer="state.email"
                                   autocomplete="email"
                                   id="email"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                        </div>
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}"
                     class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                    {{--Mobile Photo--}}
                    <div class="mt-1 lg:hidden">
                        <div class="flex items-center">
                            {{--<div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-28 w-28" aria-hidden="true">
                                <img class="rounded-full h-full w-full"
                                     src="{{ $this->user->getAvatar() }}" alt="">
                            </div>--}}
                            <div class="ml-5">
                                <div class="group relative rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                                    <img x-show="! photoPreview"
                                         class="relative rounded-full w-40 h-40"
                                         src="{{ $this->user->getAvatar() }}"
                                         alt="">
                                    <div class="mt-2" x-show="photoPreview">
                                        <span class="block rounded-full w-40 h-40"
                                              x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                                        </span>
                                    </div>
                                    <label for="user-photo"
                                           class="absolute inset-0 rounded-full w-40 h-40 bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                                        <input type="file"
                                               class="absolute inset-0 rounded-full w-full h-full opacity-0 cursor-pointer border-gray-300"
                                               wire:model="photo"
                                               x-ref="photo"
                                               x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);"
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden relative rounded-full overflow-hidden lg:block">
                        <img x-show="! photoPreview"
                             class="relative rounded-full w-40 h-40"
                             src="{{ $this->user->getAvatar() }}"
                             alt="">
                        <div class="mt-2" x-show="photoPreview">
                            <span class="block rounded-full w-40 h-40"
                                  x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                            </span>
                        </div>
                        <label for="user-photo"
                               class="absolute inset-0 rounded-full w-40 h-40 bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                            <input type="file"
                                   class="absolute inset-0 rounded-full w-full h-full opacity-0 cursor-pointer border-gray-300"
                                   wire:model="photo"
                                   x-ref="photo"
                                   x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);"
                            >
                        </label>
                    </div>

                    @if ($this->user->profile_photo_path)
                        <x-jet-secondary-button type="button"
                                                class="mt-2 hidden lg:block"
                                                wire:click="deleteProfilePhoto">
                            {{ __('Elimina tu imágen') }}
                        </x-jet-secondary-button>
                    @endif

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>
                @endif
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Actualizar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
