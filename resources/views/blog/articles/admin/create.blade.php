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
          enctype="multipart/form-data"
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
                    <div class="col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Titulo
                        </label>
                        <div class="mt-1">
                            <input type="text" name="title" id="title" autocomplete="title" class="lp-input">
                        </div>
                        @error('title')
                            <p class="text-red-500 font-medium">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label for="categories" class="block text-sm font-medium text-gray-700">
                            Categorias del Articulo
                        </label>
                        <div class="mt-1">
                            <select id="categories" name="categories[]" autocomplete="categories" multiple class="lp-select">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('categories')
                        <p class="text-red-500 font-medium">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label for="excerpt" class="block text-sm font-medium text-gray-700">
                            Descripcion Corta
                        </label>
                        <div class="mt-1">
                            <textarea name="excerpt" class="lp-input" id="excerpt" rows="2"></textarea>
                        </div>
                        @error('excerpt')
                        <p class="text-red-500 font-medium">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label for="body" class="block text-sm font-medium text-gray-700">
                            Contenido
                        </label>
                        <div class="mt-1">
                            <textarea name="body" class="lp-input" id="body" rows="10"></textarea>
                        </div>
                        @error('body')
                        <p class="text-red-500 font-medium">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <div class="relative">
                            <button class="lp-btn" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <input class="cursor-pointer absolute block opacity-0 pin-r pin-t" type="file" name="image" accept="image/*">
                            </button>
                        </div>
                    </div>

                    <div class="col-span-6">
                        <div class="relative flex items-end items-center mt-2">
                            <div class="flex items-center h-5">
                                <input id="published_at"
                                       name="published_at"
                                       aria-describedby="published"
                                       type="checkbox"
                                       value="1"
                                       class="focus:ring-cyan-500 h-6 w-6 text-cyan-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="published_at" class="font-medium text-gray-700">
                                    Publicar?
                                    <p id="published_at" class="text-gray-500">
                                        Seleccione la casilla si deseas publicar este articulo.
                                    </p>
                                </label>
                            </div>
                        </div>
                    </div>
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
