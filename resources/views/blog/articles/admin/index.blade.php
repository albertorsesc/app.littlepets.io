@extends('blog.layouts.blog')

@section('title', 'Admin::Articulos')

@section('blog.content')

    <div class="flex-1 max-w-3xl">
        <div class="flex justify-end mb-4">
            <a href="{{ route('web.blog.admin.articles.create') }}" class="lp-btn rounded-lg shadow-sm">Nuevo Articulo</a>
        </div>
        <div class="-my-2 -mx-0 sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle min-w-full sm:px-6 lg:px-8">
                <div class="hidden md:block shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if($article->published_at) bg-green-100 text-green-800 @else bg-gray-100 text-gray-800 @endif">
                                        {{ $article->published_at ? 'Publicado' : 'Sin Publicar' }}
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
                <div class="block md:hidden">
                    <div class="container mx-auto w-full gap-x-2 lg:flex-row">
                        <section class="mt-8 mb-5 lg:mb-16">
                            {{--Card list--}}
                            <div class="flex flex-col gap-y-4">
                                {{--ArticleCard--}}
                                @foreach($articles as $article)
                                    <div class="h-full rounded-lg">
                                        <div class="flex flex-col">
                                            <a href="{{ $article->profile() }}" class="block">
                                                <div class="w-full h-32 rounded-lg bg-center bg-cover object-contain bg-gray-900"
                                                     style="background-image: url({{ $article->getMedia()->first()->file_name ?? '/logos/favicon.png' }});"
                                                ></div>
                                            </a>

                                            <div class="flex flex-col gap-y-3 p-4 lg:p-0 lg:gap-y-3.5">
                                                <div>
                                                    <div class="flex flex-col gap-y-2 lg:flex-row lg:items-center">
                                            <span class="text-gray-600 font-medium mt-1 lg:mt-0">
                                                {{ $article->created_at->format('M-j-Y') }}
                                            </span>
                                                    </div>
                                                </div>

                                                <div class="break-words">
                                                    <a href="{{ $article->profile() }}" class="hover:underline lp-link">
                                                        <h3 class="text-xl text-gray-900 font-semibold">
                                                            {{ $article->title }}
                                                        </h3>
                                                    </a>

                                                    <p class="text-gray-800 leading-7 mt-1">
                                                        {{ \Illuminate\Support\Str::limit($article->excerpt) }}...
                                                    </p>
                                                </div>

                                                <div class="flex flex-col gap-y-3 lg:flex-row lg:items-center lg:justify-between lg:flex-row-reverse">
                                                    <div>
                                                        <div class="flex flex-wrap gap-2 lg:gap-x-4">
                                                            @foreach($article->categories as $category)
                                                                <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded shadow-sm py-1.5 px-3 leading-none">
                                                    {{ $category->display_name }}
                                                </span>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="flex items-center gap-x-5">
                                        <span class="text-gray-500 text-sm">
                                            {{ $article->readTime() }} min de lectura
                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(auth()->user()->canEditBlog())
                                            <div class="flex justify-between -mx-1">
                                                <a href="{{ route('web.blog.articles.show', $article) }}" class="lp-btn text-sm rounded-lg mx-1">Ver</a>
                                                <a href="{{ route('web.blog.admin.articles.edit', $article) }}" class="lp-btn text-sm rounded-lg mx-1">Editar</a>
                                                <form method="POST" action="{{ route('web.blog.admin.articles.destroy', $article) }}" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="event.preventDefault();this.closest('form').submit();"
                                                        class="lp-btn text-sm mx-1"
                                                        role="menuitem"
                                                        tabindex="-1"
                                                        id="user-menu-item-2">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                                {{ $articles->links() }}
                            </div>
                        </section>
                    </div>
                </div>
                {{ $articles->links() }}

            </div>
        </div>
    </div>

@endsection
