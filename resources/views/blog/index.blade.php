@extends('blog.layouts.blog')

@section('title', 'Blog')

@section('blog.content')
    @foreach($articles->take(2) as $article)
        <div class="w-full lg:w-1/3">
            <div class="h-full flex flex-1 flex-col flex-grow place-content-between">
                <div class="break-words">
                    <a href="{{ $article->profile() }}">
                        <div class="w-full h-72 mb-6 rounded-lg bg-center bg-cover bg-gray-900"
                             style="background-image: url({{ $article->getMedia()->first()->file_name ?? '/logos/favicon.png' }});"></div>
                    </a>

                    <span class="text-gray-700 leading-6 mb-2 block">
                        {{ $article->created_at->format('M-j-Y') }}
                    </span>

                    <h3 class="text-gray-900 text-3xl font-bold leading-10 mb-2">
                        <a href="{{ $article->profile() }}" class="hover:underline">
                            {{ $article->title }}
                        </a>
                    </h3>

                    <p class="text-gray-800 leading-7 mb-3">
                        {{ \Illuminate\Support\Str::limit($article->excerpt) }}
                    </p>
                </div>

                <a class="flex items-center text-base text-gray-300 items-end py-2" href="{{ $article->profile() }}">
                    <span class="text-gray-700 mr-1 hover:text-gray-500">Leer Articulo</span>
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    @endforeach

    <div class="w-full flex flex-col gap-y-8 lg:w-1/3">
        @foreach($articles->skip(2)->take(2) as $article)
            <div class="lg:border-b-2 lg:border-gray-200 lg:h-52">
                <div class="h-full flex flex-1 flex-col flex-grow place-content-between">
                    <div class="break-words">
                    <span class="font-mono text-gray-700 leading-6 mb-2 block">
                        {{ $article->published_at->diffForHumans() }}
                    </span>

                        <h4 class="text-gray-900 text-2xl font-bold leading-8 mb-3">
                            <a href="https://laravel.io/articles/automatically-generate-a-sitemap-for-your-website-in-laravel" class="hover:underline">
                                {{ $article->title }}
                            </a>
                        </h4>

                        <p class="text-gray-800 leading-7 mb-3">
                            Hello today I have a short tutorial for you. I was working on this blog to optimize for SEO. I wante...
                        </p>
                    </div>

                    <a class="flex items-center text-base text-gray-300 items-end py-2" href="{{ $article->profile() }}">
                        <span class="text-gray-700 mr-1 hover:text-gray-500">Leer Articulo</span>
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('blog.content.bottom')
    <div class="mt-20">
        <div class="container mx-auto flex flex-col gap-x-12 px-4 lg:flex-row">
            <div class="lg:w-3/4">
                <div>
                    <div class="flex justify-between items-center lg:block">
                        <div class="flex justify-between items-center">
                            <h1 class="text-4xl text-gray-900 font-bold">
                                Artículos
                            </h1>
                        </div>

                        <div class="flex items-center justify-between lg:mt-6">
                            <h3 class="text-gray-800 text-xl font-semibold">
                                {{ $articleCount }} Artículos
                            </h3>
                        </div>

                    </div>

                    <div class="pt-2 lg:hidden">
                        <a href="#" target="_blank" rel="noopener noreferrer">
                            <img class="my-4 mx-auto w-full" style="max-width:300px"
                                 src="/logos/little_pets.png"
                                 alt="LittlePets.io logo">
                        </a>

                        <p class="text-center px-4 mt-4 md:mt-6">
                            <a href="mailto:soporte@littlepets.io" target="_blank" rel="noopener" class="text-base border-b pb-1 text-gray-700 border-gray-300 hover:text-gray-500">
                                Te gustaría anunciarte aquí?
                            </a>
                        </p>
                    </div>

                    <section class="mt-8 mb-5 lg:mb-16">
                        {{--Card list--}}
                        <div class="flex flex-col gap-y-4">
                            {{--ArticleCard--}}
                            @foreach($articles as $article)
                                <div class="h-full rounded-lg shadow-lg bg-white lg:p-5">
                                    <div class="flex flex-col gap-x-8 lg:flex-row">
                                        <a href="{{ $article->profile() }}" class="block">
                                            <div class="w-full h-32 rounded-t-lg bg-center bg-cover object-contain bg-gray-900 lg:w-48 lg:h-full lg:rounded-lg"
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
                                </div>
                            @endforeach
                            {{ $articles->links() }}
                        </div>
                    </section>
                </div>
            </div>

            {{--Ads--}}
            <div class="lg:w-1/4">
                <div class="hidden lg:block">
                    <a href="#" target="_blank" rel="noopener noreferrer">
                        <img class="my-4 mx-auto w-full" style="max-width:300px" src="/logos/little_pets.png" alt="Full Stack Europe">
                    </a>

                    <p class="text-center px-4 mt-4 md:mt-6">
                        <a href="mailto:soporte@littlepets.io" target="_blank" rel="noopener" class="text-base border-b pb-1 text-gray-700 border-gray-300 hover:text-gray-500">
                            Te gustaría anunciarte aquí?
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
