<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                    Correo Electrónico
                </label>
                <div class="mt-1">
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus class="lp-input appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>

            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">
                    Contraseña
                </label>
                <div class="mt-1">
                    <input id="password" type="password" name="password" :value="old('password')" autocomplete="current-password" required autofocus class="lp-input appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>

            <div class="block mt-4 flex justify-between">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordar dispositivo') }}</span>
                </label>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="font-medium text-sm text-gray-600 hover:text-cyan-500">
                    Olvidaste tu contrasena?
                </a>
                @endif
            </div>

            <div class="flex items-center mt-4">


                    {{--<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>--}}


                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                    Iniciar Sesion
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
