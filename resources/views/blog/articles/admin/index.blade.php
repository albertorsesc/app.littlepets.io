@extends('blog.layouts.blog')

@section('title', 'Admin::Articulos')

@section('blog.content')

    <div class="flex-1 max-w-3xl">
        <div class="flex justify-end mb-4">
            <a href="{{ route('web.blog.admin.articles.create') }}" class="lp-btn rounded-lg shadow-sm">Nuevo Articulo</a>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estatus
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="sr-only">Ver</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($articles as $article)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $article->title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                      Publicado
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('web.blog.articles.show', $article) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-cyan-700 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('web.blog.admin.articles.edit', $article) }}"
                                       class="text-indigo-600 hover:text-indigo-900"
                                    >Editar</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form action="{{ route('web.blog.admin.articles.destroy', $article) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                                class="text-indigo-600 hover:text-indigo-900 bg-transparent"
                                        >Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
