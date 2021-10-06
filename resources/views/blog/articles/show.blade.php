@extends('blog.layouts.blog')

@section('title', e($article->title))

@section('blog.content')
    <article class="w-full">
        <div class="w-full bg-center bg-cover bg-gray-900" style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url(https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1470&q=80);">
            <div class="container mx-auto">
                <div class="px-4 lg:px-0 lg:mx-48">
                    <div class="flex items-center justify-between pt-6 mb-28">
                        <a href="#" class="hidden flex items-center text-base text-white hover:underline lg:flex">
                            <span class="text-white ml-1 hover:text-gray-100">Back to articles</span>
                        </a>

                        <div class="hidden lg:flex">
                            Awaiting Approval
                        </div>
                    </div>

                    {{--@if (count($tags = $article->tags()))
                        <div class="flex flex-wrap gap-2 lg:gap-x-4 mb-4">
                            @foreach ($tags as $tag)
                                <x-light-tag>
                                    {{ $tag->name() }}
                                </x-light-tag>
                            @endforeach
                        </div>
                    @endif--}}

                    <h1 class="text-white text-5xl font-bold mb-4">
                        {{ $article->title }}
                    </h1>

                    <div class="flex flex-col gap-y-2 text-white pb-4 lg:pb-12 lg:flex-row lg:items-center">
                        <div class="flex items-center">
                            <a href="#" class="hover:underline">
                                <span class="mr-5">{{ $article->title }}</span>
                            </a>
                        </div>

                        <div class="flex items-center">
                            <span class="font-mono text-sm mr-6 lg:mt-0">
                                {{ $article->created_at->format('j M, Y') }}
                            </span>

                            <span class="text-sm">
                                8 min read
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto">
            <div class="flex px-4 lg:px-0 lg:mx-48">
                <div class="hidden lg:block lg:w-1/5">
                    <div class="py-12 mt-48 sticky top-0">
                        {{--                        <x-articles.engage :article="$article" />--}}
                    </div>
                </div>

                <div class="w-full pt-4 lg:w-4/5 lg:pt-10">
                    {{--                    <x-articles.actions :article="$article" />--}}

                    <div
                        class="prose prose-lg text-gray-800 prose-lio"
                    >
                        {!! $article->body !!}
                    </div>

                    <div class="flex items-center gap-x-6 pt-6 pb-10">
                        <div class="flex flex-col text-gray-900 text-xl font-semibold">
                            Like this article?
                            <span class="text-lg font-medium">
                                Let the author know and give them a clap!
                            </span>
                        </div>
                    </div>

                    <div class="border-t-2 border-gray-200 py-8 lg:pt-14 lg:pb-16">
                        <div class="flex flex-col items-center justify-center gap-y-4 lg:flex-row lg:justify-between">
                            <div class="flex items-center gap-x-4">
                                <div class="flex flex-col items-center text-gray-900 text-xl font-semibold lg:items-start">
                                    Nombre
                                    <span class="text-lg text-gray-700 font-medium">
                                        algo
                                    </span>
                                </div>
                            </div>

                            <div class="flex items-center gap-x-6">
                                asdas
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
