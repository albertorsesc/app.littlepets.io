@extends('blog.layouts.blog')

@section('title', 'Blog')

@section('blog.content')
    <div class="w-full lg:w-1/3">
        <div class="h-full flex flex-1 flex-col flex-grow place-content-between">
            <div class="break-words">
                <a href="https://laravel.io/articles/how-to-add-breadcrumbs-to-your-laravel-website">
                    <div class="w-full h-72 mb-6 rounded-lg bg-center bg-cover bg-gray-900" style="background-image: url(https://source.unsplash.com/tJefy_Vu7Po/400x300);"></div>
                </a>

                <span class="font-mono text-gray-700 leading-6 mb-2 block">
        August 24th 2021
    </span>

                <h3 class="text-gray-900 text-3xl font-bold leading-10 mb-2">
                    <a href="https://laravel.io/articles/how-to-add-breadcrumbs-to-your-laravel-website" class="hover:underline">
                        How to Add Breadcrumbs to Your Laravel Website
                    </a>
                </h3>

                <p class="text-gray-800 leading-7 mb-3">
                    Introduction
                    Breadcrumbs are a great way of improving the UI (user interface) and UX (user experienc...
                </p>
            </div>

            <a class="flex items-center text-base text-gray-300 items-end py-2" href="https://laravel.io/articles/how-to-add-breadcrumbs-to-your-laravel-website">
                <span class="text-gray-700 mr-1 hover:text-gray-500">Read article</span>
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>    </a>
        </div>
    </div>

    <div class="w-full lg:w-1/3">
        <div class="h-full flex flex-1 flex-col flex-grow place-content-between">
            <div class="break-words">
                <a href="https://laravel.io/articles/develop-redeem-code-api-with-laravel-for-mobile-appgame">
                    <div class="w-full h-72 mb-6 rounded-lg bg-center bg-cover bg-gray-900" style="background-image: url(https://source.unsplash.com/f5pTwLHCsAg/400x300);"></div>
                </a>

                <span class="font-mono text-gray-700 leading-6 mb-2 block">
        June 2nd 2021
    </span>

                <h3 class="text-gray-900 text-3xl font-bold leading-10 mb-2">
                    <a href="https://laravel.io/articles/develop-redeem-code-api-with-laravel-for-mobile-appgame" class="hover:underline">
                        Develop Redeem Code API With Laravel For Mobile App/Game
                    </a>
                </h3>

                <p class="text-gray-800 leading-7 mb-3">
                    Have you ever wanted to add a redeem code feature to your game or app? A redeem code system is alway...
                </p>
            </div>

            <a class="flex items-center text-base text-gray-300 items-end py-2" href="https://laravel.io/articles/develop-redeem-code-api-with-laravel-for-mobile-appgame">
                <span class="text-gray-700 mr-1 hover:text-gray-500">Read article</span>
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>    </a>
        </div>
    </div>

    <div class="w-full flex flex-col gap-y-8 lg:w-1/3">
        <div class="lg:border-b-2 lg:border-gray-200 lg:h-72">
            <div class="h-full flex flex-1 flex-col flex-grow place-content-between">
                <div class="break-words">

    <span class="font-mono text-gray-700 leading-6 mb-2 block">
        May 19th 2021
    </span>

                    <h4 class="text-gray-900 text-2xl font-bold leading-8 mb-3">
                        <a href="https://laravel.io/articles/automatically-generate-a-sitemap-for-your-website-in-laravel" class="hover:underline">
                            Automatically Generate a Sitemap for Your Website in Laravel
                        </a>
                    </h4>

                    <p class="text-gray-800 leading-7 mb-3">
                        Hello today I have a short tutorial for you. I was working on this blog to optimize for SEO. I wante...
                    </p>
                </div>

                <a class="flex items-center text-base text-gray-300 items-end py-2" href="https://laravel.io/articles/automatically-generate-a-sitemap-for-your-website-in-laravel">
                    <span class="text-gray-700 mr-1 hover:text-gray-500">Read article</span>
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>    </a>
            </div>
        </div>

        <div class="lg:pt-6 flex-1">
            <div class="h-full flex flex-1 flex-col flex-grow place-content-between">
                <div class="break-words">

    <span class="font-mono text-gray-700 leading-6 mb-2 block">
        March 2nd 2021
    </span>

                    <h4 class="text-gray-900 text-2xl font-bold leading-8 mb-3">
                        <a href="https://laravel.io/articles/how-to-use-spaties-commonmark-highlighter-laravel-package" class="hover:underline">
                            How to use spatie's commonmark-highlighter Laravel package
                        </a>
                    </h4>

                    <p class="text-gray-800 leading-7 mb-3">
                        Welcome to this tutorial, today we are going to create a Laravel application with the new Laravel Sa...
                    </p>
                </div>

                <a class="flex items-center text-base text-gray-300 items-end py-2" href="https://laravel.io/articles/how-to-use-spaties-commonmark-highlighter-laravel-package">
                    <span class="text-gray-700 mr-1 hover:text-gray-500">Read article</span>
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>    </a>
            </div>
        </div>
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
                                Articles
                            </h1>

                            <span class="inline-flex rounded-md shadow-sm">
<a class="bg-lio-500 border border-transparent rounded py-2 px-4 inline-flex justify-center text-base text-white hover:bg-lio-600 font-medium hidden lg:block" href="https://laravel.io/articles/create">
Create Article
</a>
</span>        </div>

                        <div class="flex items-center justify-between lg:mt-6">
                            <h3 class="text-gray-800 text-xl font-semibold">
                                27 Articles
                            </h3>

                            <div class="hidden lg:flex gap-x-2">
                                <div class="flex w-full rounded shadow">
                                    <button type="button" aria-current="page" class="w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-gray-900 text-white  border-gray-900 hover:bg-gray-800">
                                        Recent
                                    </button>
                                    <button type="button"
                                            aria-current="false"
                                            class="w-full flex justify-center font-medium px-5 py-2 border-t border-b bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                                        Popular
                                    </button>
                                    <button type="button" aria-current="false" class="w-full flex items-center gap-x-2 justify-center font-medium rounded-r px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                                        Trending
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex-shrink-0">
                                <span class="inline-flex rounded-md shadow">
                                    <button class="bg-white border border-gray-200 rounded py-2 px-4 inline-flex justify-center text-base text-gray-900 hover:bg-gray-100 font-medium flex items-center gap-x-2" @click="activeModal = 'tag-filter'">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                    </svg>
                                        Tag filter
                                    </button>
                                </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="pt-2 lg:hidden">
                        <a href="#" target="_blank" rel="noopener noreferrer">
                            <img class="my-4 mx-auto w-full" style="max-width:300px"
                                 src="https://laravel.io/images/showcase/fseu-small.png"
                                 alt="Full Stack Europe">
                        </a>

                        <p class="text-center px-4 mt-4 md:mt-6">
                            <a href="#" target="_blank" rel="noopener" class="text-base border-b pb-1 text-gray-700 border-gray-300 hover:text-gray-500">
                                Anunciate
                            </a>
                        </p>
                        <div class="flex gap-x-4 mt-10">
                            <div class="w-1/2">
                            <span class="inline-flex rounded shadow w-full">
                            <button class="w-full bg-white border border-gray-200 rounded py-2 px-4 inline-flex justify-center text-lg leading-6 text-gray-900 hover:bg-gray-100">
                                <span class="flex items-center gap-x-2">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                        </svg>
                                    Tag filter
                                </span>
                            </button>
                            </span>
                            </div>
                        </div>

                        <div class="flex mt-4">
                            <div class="flex w-full rounded shadow">
                                <button type="button" aria-current="page" class="w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-gray-900 text-white  border-gray-900 hover:bg-gray-800">
                                    Recent
                                </button>
                                <button type="button" aria-current="false" class="w-full flex justify-center font-medium px-5 py-2 border-t border-b bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                                    Popular
                                </button>
                                <button type="button" aria-current="false" class="w-full flex items-center gap-x-2 justify-center font-medium rounded-r px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                                    Trending
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>

                    <section class="mt-8 mb-5 lg:mb-16">
                        {{--Card list--}}
                        <div class="flex flex-col gap-y-4">
                            {{--ArticleCard--}}
                            @foreach($articles as $article)
                                <div class="h-full rounded-lg shadow-lg bg-white lg:p-5">
                                    <div class="flex flex-col gap-x-8 lg:flex-row">
                                        <a href="#" class="block">
                                            <div class="w-full h-32 rounded-t-lg bg-center bg-cover bg-gray-900 lg:w-48 lg:h-full lg:rounded-lg"
                                                 style="background-image: url(https://source.unsplash.com/k24rOBJ2D_0/400x300);"
                                            ></div>
                                        </a>

                                        <div class="flex flex-col gap-y-3 p-4 lg:p-0 lg:gap-y-3.5">
                                            <div>
                                                <div class="flex flex-col gap-y-2 lg:flex-row lg:items-center">
                                                    <div class="flex">
                                                        <img src="https://unavatar.now.sh/github/ash-jc-allen?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Ash Allen" class="rounded-full text-gray-500 w-6 h-6 rounded-full mr-3">

                                                        <a href="https://laravel.io/user/ash-jc-allen" class="hover:underline">
                                                            <span class="text-gray-900 mr-5">ash-jc-allen</span>
                                                        </a>
                                                    </div>

                                                    <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                                                    21 Sep, 2021
                                                </span>
                                                </div>
                                            </div>

                                            <div class="break-words">
                                                <a href="https://laravel.io/articles/using-database-transactions-to-write-safer-laravel-code" class="hover:underline">
                                                    <h3 class="text-xl text-gray-900 font-semibold">
                                                        {{ $article->title }}
                                                    </h3>
                                                </a>

                                                <p class="text-gray-800 leading-7 mt-1">
                                                    Introduction
                                                    In web development, data integrity and accuracy is really important. So, making sure th...
                                                </p>
                                            </div>

                                            <div class="flex flex-col gap-y-3 lg:flex-row lg:items-center lg:justify-between lg:flex-row-reverse">
                                                <div>
                                                    <div class="flex flex-wrap gap-2 lg:gap-x-4">
                                                        <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none"
                                                        >Database</span>
                                                        <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none"
                                                        >Eloquent</span>
                                                        <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none"
                                                        >Laravel</span>
                                                    </div>
                                                </div>

                                                <div class="flex items-center gap-x-5">
                                                    <span class="text-gray-500 text-sm">
                                                        11 min read
                                                    </span>

                                                    <span class="flex items-center gap-x-2">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                                                        </svg>
                                                        <span>3</span>
                                                        <span class="sr-only">Likes</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{--Pagination--}}
                        <div class="mt-10">
                            <div>
                                <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                                    <div class="flex justify-between flex-1 sm:hidden">
                                        <span>
                                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                                « Previous
                                            </span>
                                        </span>
                                        <span>
                                            <button class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                                Next »
                                            </button>
                                        </span>
                                    </div>

                                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                        <div>
                                            <p class="text-sm text-gray-700 leading-5">
                                                <span>Showing</span>
                                                <span class="font-medium">1</span>
                                                <span>to</span>
                                                <span class="font-medium">10</span>
                                                <span>of</span>
                                                <span class="font-medium">27</span>
                                                <span>results</span>
                                            </p>
                                        </div>

                                        <div>
    <span class="relative z-0 inline-flex rounded-md shadow-sm">
        <span>

                                            <span aria-disabled="true" aria-label="&amp;laquo; Previous">
                    <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </span>
                                    </span>

                                                                                <span>
                                                                    <span aria-current="page">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">1</span>
                            </span>
                                                            </span>
                                                    <span >
                                                                    <button  class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Go to page 2">
                                2
                            </button>
                                                            </span>
                                                    <span >
                                                                    <button class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Go to page 3">
                                3
                            </button>
                                                            </span>

        <span>

                                            <button  rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next &amp;raquo;">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                                    </span>
    </span>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </section>

                    <div class="modal" style="display: none;">
                        <div class="w-full h-full p-8 lg:w-96 lg:h-3/4 overflow-y-scroll">
                            <div class="flex flex-col bg-white rounded-md shadow max-h-full">
                                <div class="border-b">
                                    <div class="p-4">
                                        <div class="flex justify-between items-center mb-2">
                                            <h3 class="text-3xl font-semibold">Filter tag</h3>

                                            <button>
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="text-gray-800 mb-3">
                                            <p>Select a tag below to filter the results</p>
                                        </div>

                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>

                                            <input type="search" name="filter" id="search" class="border block pl-10 border-gray-300 rounded w-full" placeholder="Filter by tag name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Ads--}}
            <div class="lg:w-1/4">
                <div class="hidden lg:block">
                    <a href="#" target="_blank" rel="noopener noreferrer">
                        <img class="my-4 mx-auto w-full" style="max-width:300px" src="https://laravel.io/images/showcase/fseu-small.png" alt="Full Stack Europe">
                    </a>

                    <p class="text-center px-4 mt-4 md:mt-6">
                        <a href="https://github.com/sponsors/laravelio" target="_blank" rel="noopener" class="text-base border-b pb-1 text-gray-700 border-gray-300 hover:text-gray-500">
                            Your banner here too?
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
