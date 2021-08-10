<x-jet-form-section submit="updatePassword">
    <x-slot name="form">
        {{--<div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('New Password') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>--}}

        <div class="py-6 px-4 sm:p-6 lg:pb-8">
            <div>
                <h2 class="text-lg leading-6 font-medium text-gray-900">Actualiza tu contraseña</h2>
                <p class="mt-1 text-sm text-gray-500">
                    Asegúrate que tu cuenta utilice una contraseña larga y contenga caracteres especiales por seguridad.
                </p>
            </div>

            <div class="mt-6 flex flex-col lg:flex-row">
                <div class="flex-grow space-y-6">
                    <div class="mt-6 grid grid-cols-12 gap-6">
                        <div class="col-span-12">
                            <label for="current-password" class="block text-sm font-medium text-gray-700">
                                Contraseña actual
                            </label>
                            <input type="password"
                                   wire:model.defer="state.current_password"
                                   autocomplete="current_password"
                                   id="current-password"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                            <x-jet-input-error for="current_password" class="mt-2" />
                        </div>

                        <div class="col-span-12">
                            <label for="new-password" class="block text-sm font-medium text-gray-700">
                                Nueva Contraseña
                            </label>
                            <input type="password"
                                   wire:model.defer="state.password"
                                   id="new-password"
                                   autocomplete="new-password"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                            <x-jet-input-error for="password" class="mt-2" />
                        </div>

                        <div class="col-span-12">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                Confirma tu Contraseña
                            </label>
                            <input type="password"
                                   wire:model.defer="state.password_confirmation"
                                   autocomplete="password_confirmation"
                                   id="password_confirmation"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                            <x-jet-input-error for="password_confirmation" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Actualizado.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Actualizar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
