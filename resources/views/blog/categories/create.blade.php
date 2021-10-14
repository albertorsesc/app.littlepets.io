@extends('blog.layouts.blog')

@section('title', 'Admin::Nueva Categoría')

@section('blog.content')

    <form method="POST"
          action="{{ route('web.blog.admin.categories.store') }}"
          class="space-y-8 divide-y divide-gray-200">
        @csrf
        <div class="space-y-8 divide-y divide-gray-200">

            <div class="pt-8">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Datos de la Categoría
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Revisa que no este registrada la categoría que estas por crear para evitar confusion.
                    </p>
                </div>
                <div class="mt-6 grid grid-cols-3 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Nombre
                        </label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name" autocomplete="name" class="shadow-sm focus:ring-cyan-500 focus:border-cyan-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="display_name" class="block text-sm font-medium text-gray-700">
                            Nombre a Mostrar
                        </label>
                        <div class="mt-1">
                            <input type="text" name="display_name" id="display_name" autocomplete="display_name" class="shadow-sm focus:ring-cyan-500 focus:border-cyan-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <!--                    <div class="sm:col-span-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700">
                                                Email address
                                            </label>
                                            <div class="mt-1">
                                                <input id="email" name="email" type="email" autocomplete="email" class="shadow-sm focus:ring-cyan-500 focus:border-cyan-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="country" class="block text-sm font-medium text-gray-700">
                                                Country / Region
                                            </label>
                                            <div class="mt-1">
                                                <select id="country" name="country" autocomplete="country" class="shadow-sm focus:ring-cyan-500 focus:border-cyan-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                    <option>United States</option>
                                                    <option>Canada</option>
                                                    <option>Mexico</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label for="street-address" class="block text-sm font-medium text-gray-700">
                                                Street address
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="shadow-sm focus:ring-cyan-500 focus:border-cyan-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </div>-->
                </div>
            </div>

        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <a href="{{ route('web.blog.admin.categories.index') }}"
                   class="lp-btn rounded-lg shadow-sm mr-2">
                    Cancelar
                </a>
                <button type="submit" class="lp-btn-success rounded-lg shadow-sm">
                    Guardar
                </button>
            </div>
        </div>
    </form>


@endsection
