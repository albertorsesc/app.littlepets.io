@extends('blog.layouts.blog')

@section('title', 'Admin::Nuevo Articulo')

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'body', {
            height:350,
        });
    </script>
@endsection

@section('blog.content')

    <form method="POST"
          action="{{ route('web.blog.admin.articles.store') }}"
          class="space-y-8 divide-y divide-gray-200">
        @csrf
        <div class="space-y-8 divide-y divide-gray-200">

            <div class="pt-8">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Datos del Articulo
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Revisa que no hayas publicado un articulo parecido con anterioridad para evitar confusion.
                    </p>
                </div>
                <div class="mt-6 grid grid-cols-3 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Titulo
                        </label>
                        <div class="mt-1">
                            <input type="text" name="title" id="title" autocomplete="title" class="lp-input">
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="excerpt" class="block text-sm font-medium text-gray-700">
                            Descripcion Corta
                        </label>
                        <div class="mt-1">
                            <textarea name="excerpt" class="lp-input" id="excerpt" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="body" class="block text-sm font-medium text-gray-700">
                            Contenido
                        </label>
                        <div class="mt-1">
                            <textarea name="body" class="lp-input" id="body" rows="10"></textarea>
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
                <a href="{{ route('web.blog.admin.articles.index') }}"
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
