
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="oulKwgfrrg4lRUDKEpfsnH5HCKU5u4JPDJEDRFDD">

    <title>
        Community Articles |
        Laravel.io

    </title>

    <meta name="description" content="The Laravel portal for problem solving, knowledge sharing and community building." />

    <!-- Scripts -->
    <script src="/js/app.js?id=4d2bf4d164c487ea0fe2" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="/css/app.css?id=3be4cab1ba9acbd95871" rel="stylesheet">


    <script>
        window.Laravel = {"csrfToken":"oulKwgfrrg4lRUDKEpfsnH5HCKU5u4JPDJEDRFDD"};
    </script>

    <link rel="alternate" type="application/atom+xml" href="https://laravel.io/forum/feed" title="Laravel.io Forum RSS Feed">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
    <!-- Twitter sharing -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Community Articles | Laravel.io">
    <meta name="twitter:creator" content="@laravelio" />
    <!-- /Twitter sharing -->

    <!-- Facebook sharing -->
    <meta property="og:url" content="https://laravel.io/articles" />
    <meta property="og:title" content="Community Articles | Laravel.io" />

    <meta property="og:image" content="https://laravel.io/images/laravelio-share.png" />
    <!-- /Facebook sharing -->
    <!-- Fathom - beautiful, simple website analytics -->
    <script src="https://boom.laravel.io/script.js" site="UXCUXOED" defer></script>
    <!-- / Fathom -->

    <style>[wire\:loading], [wire\:loading\.delay], [wire\:loading\.inline-block], [wire\:loading\.inline], [wire\:loading\.block], [wire\:loading\.flex], [wire\:loading\.table], [wire\:loading\.grid] {display: none;}[wire\:offline] {display: none;}[wire\:dirty]:not(textarea):not(input):not(select) {display: none;}input:-webkit-autofill, select:-webkit-autofill, textarea:-webkit-autofill {animation-duration: 50000s;animation-name: livewireautofill;}@keyframes livewireautofill { from {} }</style>
</head>

<body class="  font-sans bg-white antialiased" x-data="{ activeModal: null }" @close-modal.window="activeModal = false"  @open-modal.window="activeModal = $event.detail">

<section class="bg-lio-500 text-white text-base py-2 px-4 flex justify-center text-center">
    <a class="md:flex md:items-center" href="https://github.com/sponsors/laravelio" target="_blank" rel="noopener">
        <svg class="flex-shrink-0 w-4 h-4 inline mr-2" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
        </svg> Support the ongoing development of Laravel.io  →
    </a>
</section>
<nav class="">
    <div class="container mx-auto text-gray-800 lg:block lg:py-8" x-data="{ nav: false, search: false, community: false, chat: false, settings: false }" @click.away="nav = false">
        <div class="block bg-white 2xl:-mx-10">
            <div class="lg:px-4 lg:flex">
                <div class="block lg:flex lg:items-center lg:flex-shrink-0">
                    <div class="flex justify-between items-center p-4 lg:p-0">
                        <a href="https://laravel.io" class="mr-4">
                            <img class="h-6 w-auto lg:h-8" src="https://laravel.io/images/laravelio-logo.svg" alt="" />
                        </a>

                        <div class="flex lg:hidden">
                            <button @click="search = !search" :class="{ 'text-lio-500': search }">
                                <svg class="w-6 h-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>                            </button>

                            <button @click="nav = !nav">
                                <svg x-show="!nav" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
                                </svg>                            </button>

                            <button @click="nav = !nav" x-cloak>
                                <svg x-show="nav" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>                            </button>
                        </div>
                    </div>

                    <div class="mt-2 border-b lg:block lg:mt-0 lg:border-0" x-cloak :class="{ 'block': nav, 'hidden': !nav }">
                        <ul class="flex flex-col px-4 mb-2 gap-y-2 lg:flex-row lg:mb-0 lg:gap-6">
                            <li class="rounded lg:mb-0 lg:hover:bg-gray-100 ">
                                <a href="https://laravel.io/forum" class="inline-block w-full px-2 py-1">
                                    Forum
                                </a>
                            </li>

                            <li class="rounded lg:mb-0 lg:hover:bg-gray-100  bg-gray-100 ">
                                <a href="https://laravel.io/articles" class="inline-block w-full px-2 py-1">
                                    Articles
                                </a>
                            </li>

                            <li class="rounded lg:mb-0 lg:hover:bg-gray-100">
                                <a href="https://paste.laravel.io" class="inline-block w-full px-2 py-1">
                                    Pastebin
                                </a>
                            </li>

                            <li class="rounded lg:mb-0 lg:hover:bg-gray-100">
                                <div @click.away="chat = false" class="relative">
                                    <div>
                                        <button @click="chat = !chat" class="flex items-center lg:mb-0 py-1 px-2">
                                            Chat
                                            <svg x-show="!chat" class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                            </svg>                                            <svg x-cloak="1" x-show="chat" class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>                                        </button>
                                    </div>
                                    <div x-show="chat" x-cloak>
                                        <ul class="ml-4 lg:absolute lg:flex lg:flex-col lg:ml-0 lg:mt-2 lg:w-36 lg:rounded-md lg:shadow-lg lg:z-50 lg:bg-white">
                                            <li class="my-4 lg:hover:bg-gray-100 lg:my-0">
                                                <a href="https://discord.gg/KxwQuKb" class="inline-block w-full lg:px-4 lg:py-3">Discord</a>
                                            </li>

                                            <li class="mb-4 lg:hover:bg-gray-100 lg:mb-0">
                                                <a href="https://larachat.co" class="inline-block w-full lg:px-4 lg:py-3">Larachat</a>
                                            </li>

                                            <li class="hover:bg-gray-100">
                                                <a href="https://web.libera.chat/?nick=laravelnewbie&channels=#laravel" class="inline-block w-full lg:px-4 lg:py-3">IRC</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li class="rounded lg:mb-0 lg:hover:bg-gray-100">
                                <div @click.away="community = false" class="relative" x-data="{ community: false }">
                                    <button @click="community = !community" class="flex items-center lg:mb-0 py-1 px-2">
                                        Community
                                        <svg x-show="!community" class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>                                        <svg x-cloak="1" x-show="community" class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>                                    </button>

                                    <div x-show="community" x-cloak>
                                        <ul class="ml-4 lg:absolute lg:flex lg:flex-col lg:ml-0 lg:mt-2 lg:w-36 lg:rounded-md lg:shadow-lg lg:z-50 lg:bg-white">
                                            <li class="my-4 lg:hover:bg-gray-100 lg:my-0">
                                                <a href="https://github.com/laravelio" class="inline-block w-full lg:px-4 lg:py-3">Github</a>
                                            </li>

                                            <li class="mb-4 lg:hover:bg-gray-100 lg:mb-0">
                                                <a href="https://twitter.com/laravelio" class="inline-block w-full lg:px-4 lg:py-3">Twitter</a>
                                            </li>

                                            <li class="mb-4 lg:hover:bg-gray-100 lg:mb-0">
                                                <a href="https://laravel.com" class="inline-block w-full lg:px-4 lg:py-3">Laravel</a>
                                            </li>

                                            <li class="mb-4 lg:hover:bg-gray-100 lg:mb-0">
                                                <a href="https://laracasts.com" class="inline-block w-full lg:px-4 lg:py-3">Laracasts</a>
                                            </li>

                                            <li class="mb-4 lg:hover:bg-gray-100 lg:mb-0">
                                                <a href="https://laravel-news.com" class="inline-block w-full lg:px-4 lg:py-3">Laravel News</a>
                                            </li>

                                            <li class="mb-4 lg:hover:bg-gray-100 lg:mb-0">
                                                <a href="https://laravelevents.com" class="inline-block w-full lg:px-4 lg:py-3">Laravel Events</a>
                                            </li>

                                            <li class="mb-4 lg:hover:bg-gray-100 lg:mb-0">
                                                <a href="https://www.laravelpodcast.com" class="inline-block w-full lg:px-4 lg:py-3">Podcast</a>
                                            </li>

                                            <li class="hover:bg-gray-100">
                                                <a href="https://ecosystem.laravel.io" class="inline-block w-full lg:px-4 lg:py-3">Ecosystem</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="w-full block gap-x-4 lg:flex lg:items-center lg:justify-end">
                    <div class="lg:block" x-cloak :class="{ 'block': search, 'hidden': !search }" @click.away="search = false">
                        <div x-data="{ results: false, threads: [], articles: [] }">
                            <label for="search" class="sr-only">Search</label>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>        </div>

                                <input
                                    @click.away="results = false"
                                    @keyup="search(event).then(function({ results: hits }) { results = true; threads = hits[0].hits; articles = hits[1].hits; })"
                                    type="search"
                                    name="search"
                                    id="search"
                                    class="border-0 border-t border-b block pl-10 border-gray-300 md:border md:rounded w-full"
                                    placeholder="Search for threads and articles..."
                                />

                                <template x-if="results">
                                    <div class="search absolute md:origin-top-right md:right-0 md:rounded md:shadow-lg bg-white md:mt-2 z-50">
                                        <div class="flex flex-col md:flex-row">
                                            <div class="w-full flex-none border-r border-b md:w-1/2">
                                                <div class="flex text-lg font-medium border-b p-4">
                                                    <span class="text-gray-900 mr-3">Threads</span>

                                                    <span class="text-gray-300" x-text="threads.length + ' Results'"></span>
                                                </div>

                                                <div class="max-h-72 overflow-y-scroll">
                                                    <template x-for="thread in threads" :key="thread.subject">
                                                        <a :href="'/forum/'+thread.slug" class="flex flex-col px-4 py-2 hover:bg-lio-100">
                                                            <span class="text-black-900 text-lg font-medium break-all" x-html="thread._highlightResult.subject.value"></span>
                                                            <span class="text-black-900 break-all" x-html="thread._snippetResult.body.value"></span>
                                                        </a>
                                                    </template>
                                                </div>

                                                <span x-show="threads.length === 0" x-cloak class="p-4 text-gray-500 block">
                            No threads found
                        </span>
                                            </div>

                                            <div class="w-full flex-none border-b md:w-1/2">
                                                <div class="flex text-lg font-medium border-b p-4">
                                                    <span class="text-gray-900 mr-3">Articles</span>

                                                    <span class="text-gray-300" x-text="threads.length + ' Results'"></span>
                                                </div>

                                                <div class="max-h-72 overflow-y-scroll">
                                                    <template x-for="article in articles" :key="article.title">
                                                        <a :href="'/articles/'+article.slug" class="flex flex-col px-4 py-2 hover:bg-lio-100">
                                                            <span class="text-black-900 text-lg font-medium break-all" x-html="article._highlightResult.title.value"></span>
                                                            <span class="text-black-900 break-all" x-html="article._snippetResult.body.value"></span>
                                                        </a>
                                                    </template>
                                                </div>

                                                <span x-show="articles.length === 0" x-cloak class="p-4 text-gray-500 block">
                            No articles found
                        </span>
                                            </div>
                                        </div>

                                        <a href="https://algolia.com" class="flex justify-end px-4 py-2">
                                            <img src="https://laravel.io/images/algolia.svg" class="h-4 mx-4 my-2" />
                                        </a>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <ul class="block lg:flex lg:items-center gap-x-8" x-cloak :class="{ 'block': nav, 'hidden': !nav }">
                        <li class="w-full rounded text-center lg:hover:bg-gray-100">
                            <a href="https://laravel.io/register" class="inline-block w-full  p-2.5">
                                Register
                            </a>
                        </li>

                        <li>
                            <div class="hidden lg:block">
                                    <span class="inline-flex rounded shadow flex items-center">
            <a href="https://laravel.io/login" class="w-full bg-white border border-gray-200 rounded py-2 px-4 inline-flex justify-center text-lg leading-6 text-gray-900 hover:bg-gray-100">
            <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
</svg>                                            Login
                                        </span>
        </a>
    </span>                                </div>

                            <a href="https://laravel.io/login" class="block w-full text-center bg-lio-500 text-white p-2.5 lg:hidden">
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</nav>

<div class="bg-gray-100">

    <div class="bg-white pt-5 lg:pt-2">
        <div class="container mx-auto flex flex-col gap-x-12 px-4 lg:flex-row">
            <div class="flex flex-col gap-y-8 lg:flex-row lg:gap-x-8 lg:mb-16">
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
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
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
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
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
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
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
                                        How to use spatie&#039;s commonmark-highlighter Laravel package
                                    </a>
                                </h4>

                                <p class="text-gray-800 leading-7 mb-3">
                                    Welcome to this tutorial, today we are going to create a Laravel application with the new Laravel Sa...
                                </p>
                            </div>

                            <a class="flex items-center text-base text-gray-300 items-end py-2" href="https://laravel.io/articles/how-to-use-spaties-commonmark-highlighter-laravel-package">
                                <span class="text-gray-700 mr-1 hover:text-gray-500">Read article</span>
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>    </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-5 pb-10 shadow-inner lg:pt-16 lg:pb-0">
        <div class="container mx-auto flex flex-col gap-x-12 px-4 lg:flex-row">
            <div class="lg:w-3/4">
                <div wire:id="Cj2qaP0verdJno24RUg7" wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;Cj2qaP0verdJno24RUg7&quot;,&quot;name&quot;:&quot;show-articles&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;articles&quot;,&quot;method&quot;:&quot;GET&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[],&quot;path&quot;:&quot;https:\/\/laravel.io\/articles?&quot;},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;5f6b5122&quot;,&quot;data&quot;:{&quot;tag&quot;:null,&quot;sortBy&quot;:&quot;recent&quot;,&quot;page&quot;:1},&quot;dataMeta&quot;:[],&quot;checksum&quot;:&quot;a455a4c62e8a7cf52d0ce5b65eb95dc48047a959bebf7383dd6ece547972c9bf&quot;}}">
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
                                    <button
                                        wire:click="sortBy('recent')" type="button"
                                        aria-current="page"
                                        class="w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-gray-900 text-white  border-gray-900 hover:bg-gray-800"
                                    >
                                        Recent
                                        </a>

                                        <button
                                            wire:click="sortBy('popular')" type="button"
                                            aria-current="false"
                                            class="w-full flex justify-center font-medium px-5 py-2 border-t border-b bg-white text-gray-800 border-gray-200 hover:bg-gray-100"
                                        >
                                            Popular
                                            </a>

                                            <button
                                                wire:click="sortBy('trending')" type="button"
                                                aria-current="false"
                                                class="w-full flex items-center gap-x-2 justify-center font-medium rounded-r px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100"
                                            >
                                                Trending
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                                                </svg>    </a>
                                </div>
                                <div class="flex-shrink-0">
                    <span class="inline-flex rounded-md shadow">
            <button class="bg-white border border-gray-200 rounded py-2 px-4 inline-flex justify-center text-base text-gray-900 hover:bg-gray-100 font-medium flex items-center gap-x-2" @click="activeModal = 'tag-filter'">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
</svg>                        Tag filter
        </button>
    </span>                </div>
                            </div>
                        </div>

                    </div>

                    <div class="pt-2 lg:hidden">
                        <a href="https://fullstackeurope.com/2021?utm_source=Laravel.io&amp;utm_campaign=fseu21&amp;utm_medium=advertisement" target="_blank" rel="noopener noreferrer" onclick="fathom.trackGoal('SRIK2PEE', 0);">
                            <img class="my-4 mx-auto w-full" style="max-width:300px" src="https://laravel.io/images/showcase/fseu-small.png" alt="Full Stack Europe">
                        </a>

                        <p class="text-center px-4 mt-4 md:mt-6">
                            <a href="https://github.com/sponsors/laravelio" target="_blank" rel="noopener"
                               class="text-base border-b pb-1 text-gray-700 border-gray-300 hover:text-gray-500">
                                Your banner here too?
                            </a>
                        </p>
                        <div class="flex gap-x-4 mt-10">
                            <div class="w-1/2">
                <span class="inline-flex rounded shadow w-full">
            <button @click="activeModal = 'tag-filter'" class="w-full bg-white border border-gray-200 rounded py-2 px-4 inline-flex justify-center text-lg leading-6 text-gray-900 hover:bg-gray-100">
            <span class="flex items-center gap-x-2">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
</svg>                        Tag filter
                    </span>
        </button>
    </span>            </div>

                            <div class="w-1/2">
                <span class="inline-flex rounded shadow-sm w-full">
            <a href="https://laravel.io/articles/create" class="w-full bg-lio-500 border border-transparent rounded py-2 px-4 inline-flex justify-center text-lg leading-6 text-white hover:bg-lio-600">
            Create Article
        </a>
    </span>            </div>
                        </div>

                        <div class="flex mt-4">
                            <div class="flex w-full rounded shadow">
                                <button
                                    wire:click="sortBy('recent')" type="button"
                                    aria-current="page"
                                    class="w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-gray-900 text-white  border-gray-900 hover:bg-gray-800"
                                >
                                    Recent
                                    </a>

                                    <button
                                        wire:click="sortBy('popular')" type="button"
                                        aria-current="false"
                                        class="w-full flex justify-center font-medium px-5 py-2 border-t border-b bg-white text-gray-800 border-gray-200 hover:bg-gray-100"
                                    >
                                        Popular
                                        </a>

                                        <button
                                            wire:click="sortBy('trending')" type="button"
                                            aria-current="false"
                                            class="w-full flex items-center gap-x-2 justify-center font-medium rounded-r px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100"
                                        >
                                            Trending
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                                            </svg>    </a>
                            </div>        </div>

                    </div>

                    <section class="mt-8 mb-5 lg:mb-16">
                        <div class="flex flex-col gap-y-4">
                            <div class="h-full rounded-lg shadow-lg bg-white lg:p-5">
                                <div class="flex flex-col gap-x-8 lg:flex-row">
                                    <a href="https://laravel.io/articles/using-database-transactions-to-write-safer-laravel-code" class="block">
                                        <div
                                            class="w-full h-32 rounded-t-lg bg-center bg-cover bg-gray-900 lg:w-48 lg:h-full lg:rounded-lg"
                                            style="background-image: url(https://source.unsplash.com/k24rOBJ2D_0/400x300);"
                                        >
                                        </div>
                                    </a>

                                    <div class="flex flex-col gap-y-3 p-4 lg:p-0 lg:gap-y-3.5">
                                        <div>
                                            <div class="flex flex-col gap-y-2 lg:flex-row lg:items-center">
                                                <div class="flex">
                                                    <img src="https://unavatar.now.sh/github/ash-jc-allen?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Ash Allen" class="rounded-full text-gray-500 w-6 h-6 rounded-full mr-3"/>

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
                                                    Using Database Transactions to Write Safer Laravel Code
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
                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Database
</span>                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Eloquent
</span>                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Laravel
</span>                                                    </div>
                                            </div>

                                            <div class="flex items-center gap-x-5">
                    <span class="text-gray-500 text-sm">
                        11 min read
                    </span>

                                                <span class="flex items-center gap-x-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
</svg>                        <span>3</span>
                        <span class="sr-only">Likes</span>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-full rounded-lg shadow-lg bg-white lg:p-5">
                                <div class="flex flex-col gap-x-8 lg:flex-row">
                                    <a href="https://laravel.io/articles/setting-up-tailwind-css-in-laravel" class="block">
                                        <div
                                            class="w-full h-32 rounded-t-lg bg-center bg-cover bg-gray-900 lg:w-48 lg:h-full lg:rounded-lg"
                                            style="background-image: url(https://source.unsplash.com/6JVlSdgMacE/400x300);"
                                        >
                                        </div>
                                    </a>

                                    <div class="flex flex-col gap-y-3 p-4 lg:p-0 lg:gap-y-3.5">
                                        <div>
                                            <div class="flex flex-col gap-y-2 lg:flex-row lg:items-center">
                                                <div class="flex">
                                                    <img src="https://unavatar.now.sh/github/ash-jc-allen?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Ash Allen" class="rounded-full text-gray-500 w-6 h-6 rounded-full mr-3"/>

                                                    <a href="https://laravel.io/user/ash-jc-allen" class="hover:underline">
                                                        <span class="text-gray-900 mr-5">ash-jc-allen</span>
                                                    </a>
                                                </div>

                                                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                        31 Aug, 2021
                    </span>
                                            </div>
                                        </div>

                                        <div class="break-words">
                                            <a href="https://laravel.io/articles/setting-up-tailwind-css-in-laravel" class="hover:underline">
                                                <h3 class="text-xl text-gray-900 font-semibold">
                                                    Setting Up Tailwind CSS in Laravel
                                                </h3>
                                            </a>

                                            <p class="text-gray-800 leading-7 mt-1">
                                                Introduction
                                                Tailwind CSS is a really cool CSS framework that you can use when building your applica...
                                            </p>
                                        </div>

                                        <div class="flex flex-col gap-y-3 lg:flex-row lg:items-center lg:justify-between lg:flex-row-reverse">
                                            <div>
                                                <div class="flex flex-wrap gap-2 lg:gap-x-4">
                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Blade
</span>                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Laravel
</span>                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Views
</span>                                                    </div>
                                            </div>

                                            <div class="flex items-center gap-x-5">
                    <span class="text-gray-500 text-sm">
                        11 min read
                    </span>

                                                <span class="flex items-center gap-x-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
</svg>                        <span>2</span>
                        <span class="sr-only">Likes</span>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-full rounded-lg shadow-lg bg-white lg:p-5">
                                <div class="flex flex-col gap-x-8 lg:flex-row">
                                    <a href="https://laravel.io/articles/automated-deployment-of-laravel-app-using-deploybot-and-cloudways" class="block">
                                        <div
                                            class="w-full h-32 rounded-t-lg bg-center bg-cover bg-gray-900 lg:w-48 lg:h-full lg:rounded-lg"
                                            style="background-image: url(https://source.unsplash.com/TV2gg2kZD1o/400x300);"
                                        >
                                        </div>
                                    </a>

                                    <div class="flex flex-col gap-y-3 p-4 lg:p-0 lg:gap-y-3.5">
                                        <div>
                                            <div class="flex flex-col gap-y-2 lg:flex-row lg:items-center">
                                                <div class="flex">
                                                    <img src="https://unavatar.now.sh/github/mrshahzeb?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Shahzeb Ahmed" class="rounded-full text-gray-500 w-6 h-6 rounded-full mr-3"/>

                                                    <a href="https://laravel.io/user/shahzeb" class="hover:underline">
                                                        <span class="text-gray-900 mr-5">shahzeb</span>
                                                    </a>
                                                </div>

                                                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                        31 Aug, 2021
                    </span>
                                            </div>
                                        </div>

                                        <div class="break-words">
                                            <a href="https://laravel.io/articles/automated-deployment-of-laravel-app-using-deploybot-and-cloudways" class="hover:underline">
                                                <h3 class="text-xl text-gray-900 font-semibold">
                                                    Automated Deployment of Laravel App Using DeployBot and Cloudways
                                                </h3>
                                            </a>

                                            <p class="text-gray-800 leading-7 mt-1">
                                                Deployment tools smoothen the process of software and update distribution. By using tools for schedu...
                                            </p>
                                        </div>

                                        <div class="flex flex-col gap-y-3 lg:flex-row lg:items-center lg:justify-between lg:flex-row-reverse">
                                            <div>
                                                <div class="flex flex-wrap gap-2 lg:gap-x-4">
                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Laravel
</span>                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Installation
</span>                                                    </div>
                                            </div>

                                            <div class="flex items-center gap-x-5">
                    <span class="text-gray-500 text-sm">
                        4 min read
                    </span>

                                                <span class="flex items-center gap-x-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
</svg>                        <span>2</span>
                        <span class="sr-only">Likes</span>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-full rounded-lg shadow-lg bg-white lg:p-5">
                                <div class="flex flex-col gap-x-8 lg:flex-row">
                                    <a href="https://laravel.io/articles/launching-php-github-sponsors" class="block">
                                        <div
                                            class="w-full h-32 rounded-t-lg bg-center bg-cover bg-gray-900 lg:w-48 lg:h-full lg:rounded-lg"
                                            style="background-image: url(https://source.unsplash.com/lCPhGxs7pww/400x300);"
                                        >
                                        </div>
                                    </a>

                                    <div class="flex flex-col gap-y-3 p-4 lg:p-0 lg:gap-y-3.5">
                                        <div>
                                            <div class="flex flex-col gap-y-2 lg:flex-row lg:items-center">
                                                <div class="flex">
                                                    <img src="https://unavatar.now.sh/github/driesvints?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Dries Vints" class="rounded-full text-gray-500 w-6 h-6 rounded-full mr-3"/>

                                                    <a href="https://laravel.io/user/driesvints" class="hover:underline">
                                                        <span class="text-gray-900 mr-5">driesvints</span>
                                                    </a>
                                                </div>

                                                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                        28 Aug, 2021
                    </span>
                                            </div>
                                        </div>

                                        <div class="break-words">
                                            <a href="https://laravel.io/articles/launching-php-github-sponsors" class="hover:underline">
                                                <h3 class="text-xl text-gray-900 font-semibold">
                                                    Launching PHP GitHub Sponsors
                                                </h3>
                                            </a>

                                            <p class="text-gray-800 leading-7 mt-1">
                                                I'm very happy to say that Tom and I finally launched PHP GitHub Sponsors, a package for PHP to inte...
                                            </p>
                                        </div>

                                        <div class="flex flex-col gap-y-3 lg:flex-row lg:items-center lg:justify-between lg:flex-row-reverse">
                                            <div>
                                                <div class="flex flex-wrap gap-2 lg:gap-x-4">
                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Laravel
</span>                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    API
</span>                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Packages
</span>                                                    </div>
                                            </div>

                                            <div class="flex items-center gap-x-5">
                    <span class="text-gray-500 text-sm">
                        3 min read
                    </span>

                                                <span class="flex items-center gap-x-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
</svg>                        <span>1</span>
                        <span class="sr-only">Likes</span>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-full rounded-lg shadow-lg bg-white lg:p-5">
                                <div class="flex flex-col gap-x-8 lg:flex-row">
                                    <a href="https://laravel.io/articles/interfaces-vs-abstract-classes-in-php" class="block">
                                        <div
                                            class="w-full h-32 rounded-t-lg bg-center bg-cover bg-gray-900 lg:w-48 lg:h-full lg:rounded-lg"
                                            style="background-image: url(https://source.unsplash.com/GJao3ZTX9gU/400x300);"
                                        >
                                        </div>
                                    </a>

                                    <div class="flex flex-col gap-y-3 p-4 lg:p-0 lg:gap-y-3.5">
                                        <div>
                                            <div class="flex flex-col gap-y-2 lg:flex-row lg:items-center">
                                                <div class="flex">
                                                    <img src="https://unavatar.now.sh/github/ash-jc-allen?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Ash Allen" class="rounded-full text-gray-500 w-6 h-6 rounded-full mr-3"/>

                                                    <a href="https://laravel.io/user/ash-jc-allen" class="hover:underline">
                                                        <span class="text-gray-900 mr-5">ash-jc-allen</span>
                                                    </a>
                                                </div>

                                                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                        21 Aug, 2021
                    </span>
                                            </div>
                                        </div>

                                        <div class="break-words">
                                            <a href="https://laravel.io/articles/interfaces-vs-abstract-classes-in-php" class="hover:underline">
                                                <h3 class="text-xl text-gray-900 font-semibold">
                                                    Interfaces vs Abstract Classes in PHP
                                                </h3>
                                            </a>

                                            <p class="text-gray-800 leading-7 mt-1">
                                                Introduction
                                                I recently published a blog post that talked about how to write better PHP code using i...
                                            </p>
                                        </div>

                                        <div class="flex flex-col gap-y-3 lg:flex-row lg:items-center lg:justify-between lg:flex-row-reverse">
                                            <div>
                                            </div>

                                            <div class="flex items-center gap-x-5">
                    <span class="text-gray-500 text-sm">
                        8 min read
                    </span>

                                                <span class="flex items-center gap-x-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
</svg>                        <span>5</span>
                        <span class="sr-only">Likes</span>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-full rounded-lg shadow-lg bg-white lg:p-5">
                                <div class="flex flex-col gap-x-8 lg:flex-row">
                                    <a href="https://laravel.io/articles/tooltip-using-tailwindcss-and-alpinejs" class="block">
                                        <div
                                            class="w-full h-32 rounded-t-lg bg-center bg-cover bg-gray-900 lg:w-48 lg:h-full lg:rounded-lg"
                                            style="background-image: url(https://source.unsplash.com/y3ZcWAgVphU/400x300);"
                                        >
                                        </div>
                                    </a>

                                    <div class="flex flex-col gap-y-3 p-4 lg:p-0 lg:gap-y-3.5">
                                        <div>
                                            <div class="flex flex-col gap-y-2 lg:flex-row lg:items-center">
                                                <div class="flex">
                                                    <img src="https://unavatar.now.sh/github/saurabh85mahajan?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Saurabh" class="rounded-full text-gray-500 w-6 h-6 rounded-full mr-3"/>

                                                    <a href="https://laravel.io/user/100r0bh" class="hover:underline">
                                                        <span class="text-gray-900 mr-5">100r0bh</span>
                                                    </a>
                                                </div>

                                                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                        18 Aug, 2021
                    </span>
                                            </div>
                                        </div>

                                        <div class="break-words">
                                            <a href="https://laravel.io/articles/tooltip-using-tailwindcss-and-alpinejs" class="hover:underline">
                                                <h3 class="text-xl text-gray-900 font-semibold">
                                                    Tooltip using TailwindCss and AlpineJs
                                                </h3>
                                            </a>

                                            <p class="text-gray-800 leading-7 mt-1">
                                                In this Tutorial, we will build Tooltip using TailwindCss and AlpineJs and then encapsulate the logi...
                                            </p>
                                        </div>

                                        <div class="flex flex-col gap-y-3 lg:flex-row lg:items-center lg:justify-between lg:flex-row-reverse">
                                            <div>
                                                <div class="flex flex-wrap gap-2 lg:gap-x-4">
                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Alpine.js
</span>                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Laravel
</span>                                                    </div>
                                            </div>

                                            <div class="flex items-center gap-x-5">
                    <span class="text-gray-500 text-sm">
                        4 min read
                    </span>

                                                <span class="flex items-center gap-x-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
</svg>                        <span>1</span>
                        <span class="sr-only">Likes</span>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-full rounded-lg shadow-lg bg-white lg:p-5">
                                <div class="flex flex-col gap-x-8 lg:flex-row">
                                    <a href="https://laravel.io/articles/investigating-dark-mode-for-svgs-in-github-readmes" class="block">
                                        <div
                                            class="w-full h-32 rounded-t-lg bg-center bg-cover bg-gray-900 lg:w-48 lg:h-full lg:rounded-lg"
                                            style="background-image: url(https://source.unsplash.com/XE2RmuV6ed0/400x300);"
                                        >
                                        </div>
                                    </a>

                                    <div class="flex flex-col gap-y-3 p-4 lg:p-0 lg:gap-y-3.5">
                                        <div>
                                            <div class="flex flex-col gap-y-2 lg:flex-row lg:items-center">
                                                <div class="flex">
                                                    <img src="https://unavatar.now.sh/github/driesvints?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Dries Vints" class="rounded-full text-gray-500 w-6 h-6 rounded-full mr-3"/>

                                                    <a href="https://laravel.io/user/driesvints" class="hover:underline">
                                                        <span class="text-gray-900 mr-5">driesvints</span>
                                                    </a>
                                                </div>

                                                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                        13 Jun, 2021
                    </span>
                                            </div>
                                        </div>

                                        <div class="break-words">
                                            <a href="https://laravel.io/articles/investigating-dark-mode-for-svgs-in-github-readmes" class="hover:underline">
                                                <h3 class="text-xl text-gray-900 font-semibold">
                                                    Investigating dark mode for SVG&#039;s in GitHub readme&#039;s
                                                </h3>
                                            </a>

                                            <p class="text-gray-800 leading-7 mt-1">
                                                This blog post is about a (failed) attempt at introducing dark mode for our logo SVG's in the readme...
                                            </p>
                                        </div>

                                        <div class="flex flex-col gap-y-3 lg:flex-row lg:items-center lg:justify-between lg:flex-row-reverse">
                                            <div>
                                            </div>

                                            <div class="flex items-center gap-x-5">
                    <span class="text-gray-500 text-sm">
                        6 min read
                    </span>

                                                <span class="flex items-center gap-x-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
</svg>                        <span>2</span>
                        <span class="sr-only">Likes</span>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-full rounded-lg shadow-lg bg-white lg:p-5">
                                <div class="flex flex-col gap-x-8 lg:flex-row">
                                    <a href="https://laravel.io/articles/create-custom-error-pages-in-laravel-8" class="block">
                                        <div
                                            class="w-full h-32 rounded-t-lg bg-center bg-cover bg-gray-900 lg:w-48 lg:h-full lg:rounded-lg"
                                            style="background-image: url(https://source.unsplash.com/sxiSod0tyYQ/400x300);"
                                        >
                                        </div>
                                    </a>

                                    <div class="flex flex-col gap-y-3 p-4 lg:p-0 lg:gap-y-3.5">
                                        <div>
                                            <div class="flex flex-col gap-y-2 lg:flex-row lg:items-center">
                                                <div class="flex">
                                                    <img src="https://unavatar.now.sh/github/larapeak?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Larapeak" class="rounded-full text-gray-500 w-6 h-6 rounded-full mr-3"/>

                                                    <a href="https://laravel.io/user/larapeak" class="hover:underline">
                                                        <span class="text-gray-900 mr-5">larapeak</span>
                                                    </a>
                                                </div>

                                                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                        22 May, 2021
                    </span>
                                            </div>
                                        </div>

                                        <div class="break-words">
                                            <a href="https://laravel.io/articles/create-custom-error-pages-in-laravel-8" class="hover:underline">
                                                <h3 class="text-xl text-gray-900 font-semibold">
                                                    Create custom error pages in Laravel 8
                                                </h3>
                                            </a>

                                            <p class="text-gray-800 leading-7 mt-1">
                                                The standard error pages in Laravel are looking a bit awful. In this tutorial I will show you how yo...
                                            </p>
                                        </div>

                                        <div class="flex flex-col gap-y-3 lg:flex-row lg:items-center lg:justify-between lg:flex-row-reverse">
                                            <div>
                                                <div class="flex flex-wrap gap-2 lg:gap-x-4">
                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Laravel
</span>                                                    </div>
                                            </div>

                                            <div class="flex items-center gap-x-5">
                    <span class="text-gray-500 text-sm">
                        1 min read
                    </span>

                                                <span class="flex items-center gap-x-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
</svg>                        <span>3</span>
                        <span class="sr-only">Likes</span>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-full rounded-lg shadow-lg bg-white lg:p-5">
                                <div class="flex flex-col gap-x-8 lg:flex-row">
                                    <a href="https://laravel.io/articles/releasing-blade-icons-v10" class="block">
                                        <div
                                            class="w-full h-32 rounded-t-lg bg-center bg-cover bg-gray-900 lg:w-48 lg:h-full lg:rounded-lg"
                                            style="background-image: url(https://source.unsplash.com/_zKxPsGOGKg/400x300);"
                                        >
                                        </div>
                                    </a>

                                    <div class="flex flex-col gap-y-3 p-4 lg:p-0 lg:gap-y-3.5">
                                        <div>
                                            <div class="flex flex-col gap-y-2 lg:flex-row lg:items-center">
                                                <div class="flex">
                                                    <img src="https://unavatar.now.sh/github/driesvints?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Dries Vints" class="rounded-full text-gray-500 w-6 h-6 rounded-full mr-3"/>

                                                    <a href="https://laravel.io/user/driesvints" class="hover:underline">
                                                        <span class="text-gray-900 mr-5">driesvints</span>
                                                    </a>
                                                </div>

                                                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                        22 Mar, 2021
                    </span>
                                            </div>
                                        </div>

                                        <div class="break-words">
                                            <a href="https://laravel.io/articles/releasing-blade-icons-v10" class="hover:underline">
                                                <h3 class="text-xl text-gray-900 font-semibold">
                                                    Releasing Blade Icons v1.0
                                                </h3>
                                            </a>

                                            <p class="text-gray-800 leading-7 mt-1">
                                                I'm happy to say that Blade Icons is finally hitting its first major stable version. After releasing...
                                            </p>
                                        </div>

                                        <div class="flex flex-col gap-y-3 lg:flex-row lg:items-center lg:justify-between lg:flex-row-reverse">
                                            <div>
                                                <div class="flex flex-wrap gap-2 lg:gap-x-4">
                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Laravel
</span>                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Blade
</span>                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Views
</span>                                                    </div>
                                            </div>

                                            <div class="flex items-center gap-x-5">
                    <span class="text-gray-500 text-sm">
                        3 min read
                    </span>

                                                <span class="flex items-center gap-x-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
</svg>                        <span>5</span>
                        <span class="sr-only">Likes</span>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-full rounded-lg shadow-lg bg-white lg:p-5">
                                <div class="flex flex-col gap-x-8 lg:flex-row">
                                    <a href="https://laravel.io/articles/create-a-project-in-laravel-8x-with-laravel-sail-docker" class="block">
                                        <div
                                            class="w-full h-32 rounded-t-lg bg-center bg-cover bg-gray-900 lg:w-48 lg:h-full lg:rounded-lg"
                                            style="background-image: url(https://source.unsplash.com/zHg5TXgVoGQ/400x300);"
                                        >
                                        </div>
                                    </a>

                                    <div class="flex flex-col gap-y-3 p-4 lg:p-0 lg:gap-y-3.5">
                                        <div>
                                            <div class="flex flex-col gap-y-2 lg:flex-row lg:items-center">
                                                <div class="flex">
                                                    <img src="https://unavatar.now.sh/github/larapeak?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Larapeak" class="rounded-full text-gray-500 w-6 h-6 rounded-full mr-3"/>

                                                    <a href="https://laravel.io/user/larapeak" class="hover:underline">
                                                        <span class="text-gray-900 mr-5">larapeak</span>
                                                    </a>
                                                </div>

                                                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                        24 Feb, 2021
                    </span>
                                            </div>
                                        </div>

                                        <div class="break-words">
                                            <a href="https://laravel.io/articles/create-a-project-in-laravel-8x-with-laravel-sail-docker" class="hover:underline">
                                                <h3 class="text-xl text-gray-900 font-semibold">
                                                    Create a project in Laravel 8.x with Laravel Sail (docker)
                                                </h3>
                                            </a>

                                            <p class="text-gray-800 leading-7 mt-1">
                                                Welcome to this tutorial, today we are going to create a Laravel application with the new Laravel Sa...
                                            </p>
                                        </div>

                                        <div class="flex flex-col gap-y-3 lg:flex-row lg:items-center lg:justify-between lg:flex-row-reverse">
                                            <div>
                                                <div class="flex flex-wrap gap-2 lg:gap-x-4">
                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Configuration
</span>                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Installation
</span>                                                            <span class="text-sm text-gray-900 bg-gray-100 border border-gray-200 rounded py-1.5 px-3 leading-none">
    Laravel
</span>                                                    </div>
                                            </div>

                                            <div class="flex items-center gap-x-5">
                    <span class="text-gray-500 text-sm">
                        4 min read
                    </span>

                                                <span class="flex items-center gap-x-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
</svg>                        <span>5</span>
                        <span class="sr-only">Likes</span>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <div>
                                <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                                    <div class="flex justify-between flex-1 sm:hidden">
                <span>
                                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                            &laquo; Previous
                        </span>
                                    </span>

                                        <span>
                                            <button wire:click="nextPage" wire:loading.attr="disabled" dusk="nextPage.before" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            Next &raquo;
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
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                                                    </span>





                                                                                                <span wire:key="paginator-page1">
                                                                                    <span aria-current="page">
                                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">1</span>
                                            </span>
                                                                            </span>
                                                                    <span wire:key="paginator-page2">
                                                                                    <button wire:click="gotoPage(2)" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Go to page 2">
                                                2
                                            </button>
                                                                            </span>
                                                                    <span wire:key="paginator-page3">
                                                                                    <button wire:click="gotoPage(3)" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Go to page 3">
                                                3
                                            </button>
                                                                            </span>

                        <span>

                                                            <button wire:click="nextPage" dusk="nextPage.after" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next &amp;raquo;">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
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

                    <div class="modal" x-show="activeModal === 'tag-filter'" x-cloak>
                        <div class="w-full h-full p-8 lg:w-96 lg:h-3/4 overflow-y-scroll">
                            <div
                                class="flex flex-col bg-white rounded-md shadow max-h-full"
                                x-data="{ selectedTag: '', filter: '', isFiltered(value) { return !this.filter || value.toLowerCase().includes(this.filter.toLowerCase()) } }"
                                x-cloak
                            >
                                <div class="border-b">
                                    <div class="p-4">
                                        <div class="flex justify-between items-center mb-2" x-cloak>
                                            <h3 class="text-3xl font-semibold">Filter tag</h3>

                                            <button @click="$dispatch('close-modal')">
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>                </button>
                                        </div>

                                        <div class="text-gray-800 mb-3">
                                            <p>Select a tag below to filter the results</p>
                                        </div>

                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                                </svg>                </div>

                                            <input
                                                type="search"
                                                name="filter"
                                                id="search"
                                                class="border block pl-10 border-gray-300 rounded w-full"
                                                placeholder="Filter by tag name"
                                                x-model="filter"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="border-b overflow-y-scroll">
                                    <div class="flex flex-col text-lg p-4">
                                        <button
                                            type="button"
                                            wire:click="toggleTag('alpinejs')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '60' === selectedTag }"
                                            x-show="isFiltered('Alpine.js')"
                                        >
                                            Alpine.js
                                            <svg x-cloak="1" x-show="'60' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('api')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '61' === selectedTag }"
                                            x-show="isFiltered('API')"
                                        >
                                            API
                                            <svg x-cloak="1" x-show="'61' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('architecture')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '22' === selectedTag }"
                                            x-show="isFiltered('Architecture')"
                                        >
                                            Architecture
                                            <svg x-cloak="1" x-show="'22' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('artisan')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '50' === selectedTag }"
                                            x-show="isFiltered('Artisan')"
                                        >
                                            Artisan
                                            <svg x-cloak="1" x-show="'50' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('authentication')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '3' === selectedTag }"
                                            x-show="isFiltered('Authentication')"
                                        >
                                            Authentication
                                            <svg x-cloak="1" x-show="'3' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('blade')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '13' === selectedTag }"
                                            x-show="isFiltered('Blade')"
                                        >
                                            Blade
                                            <svg x-cloak="1" x-show="'13' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('configuration')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '2' === selectedTag }"
                                            x-show="isFiltered('Configuration')"
                                        >
                                            Configuration
                                            <svg x-cloak="1" x-show="'2' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('database')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '9' === selectedTag }"
                                            x-show="isFiltered('Database')"
                                        >
                                            Database
                                            <svg x-cloak="1" x-show="'9' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('eloquent')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '10' === selectedTag }"
                                            x-show="isFiltered('Eloquent')"
                                        >
                                            Eloquent
                                            <svg x-cloak="1" x-show="'10' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('envoyer')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '29' === selectedTag }"
                                            x-show="isFiltered('Envoyer')"
                                        >
                                            Envoyer
                                            <svg x-cloak="1" x-show="'29' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('Forge')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '28' === selectedTag }"
                                            x-show="isFiltered('Forge')"
                                        >
                                            Forge
                                            <svg x-cloak="1" x-show="'28' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('installation')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '1' === selectedTag }"
                                            x-show="isFiltered('Installation')"
                                        >
                                            Installation
                                            <svg x-cloak="1" x-show="'1' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('jobs')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '23' === selectedTag }"
                                            x-show="isFiltered('Jobs')"
                                        >
                                            Jobs
                                            <svg x-cloak="1" x-show="'23' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('laravel')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '25' === selectedTag }"
                                            x-show="isFiltered('Laravel')"
                                        >
                                            Laravel
                                            <svg x-cloak="1" x-show="'25' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('laravelio')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '18' === selectedTag }"
                                            x-show="isFiltered('Laravel.io')"
                                        >
                                            Laravel.io
                                            <svg x-cloak="1" x-show="'18' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('lumen')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '26' === selectedTag }"
                                            x-show="isFiltered('Lumen')"
                                        >
                                            Lumen
                                            <svg x-cloak="1" x-show="'26' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('packages')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '19' === selectedTag }"
                                            x-show="isFiltered('Packages')"
                                        >
                                            Packages
                                            <svg x-cloak="1" x-show="'19' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('queues')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '17' === selectedTag }"
                                            x-show="isFiltered('Queues')"
                                        >
                                            Queues
                                            <svg x-cloak="1" x-show="'17' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('security')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '4' === selectedTag }"
                                            x-show="isFiltered('Security')"
                                        >
                                            Security
                                            <svg x-cloak="1" x-show="'4' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('testing')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '24' === selectedTag }"
                                            x-show="isFiltered('Testing')"
                                        >
                                            Testing
                                            <svg x-cloak="1" x-show="'24' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('validation')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '15' === selectedTag }"
                                            x-show="isFiltered('Validation')"
                                        >
                                            Validation
                                            <svg x-cloak="1" x-show="'15' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                        <button
                                            type="button"
                                            wire:click="toggleTag('views')"
                                            @click="$dispatch('close-modal')"
                                            class="flex items-center py-3.5 hover:text-lio-500"
                                            :class="{ 'text-lio-500': '12' === selectedTag }"
                                            x-show="isFiltered('Views')"
                                        >
                                            Views
                                            <svg x-cloak="1" x-show="'12' === selectedTag" class="ml-3 w-6 h-6 text-lio-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>                </button>
                                    </div>
                                </div>

                                <div class="flex gap-x-2 justify-end p-4">
        <span class="inline-flex rounded-md shadow">
            <button class="bg-white border border-gray-200 rounded py-2 px-4 inline-flex justify-center text-base text-gray-900 hover:bg-gray-100 font-medium" @click="$dispatch('close-modal')">
            Cancel
        </button>
    </span>
                                    <span class="inline-flex rounded-md shadow">
            <button class="bg-white border border-gray-200 rounded py-2 px-4 inline-flex justify-center text-base text-gray-900 hover:bg-gray-100 font-medium" wire:click="toggleTag('')" @click="$dispatch('close-modal')">
            Remove filter
        </button>
    </span>    </div>
                            </div>        </div>
                    </div>
                </div>            </div>

            <div class="lg:w-1/4">
                <div class="hidden lg:block">
                    <a href="https://fullstackeurope.com/2021?utm_source=Laravel.io&amp;utm_campaign=fseu21&amp;utm_medium=advertisement" target="_blank" rel="noopener noreferrer" onclick="fathom.trackGoal('SRIK2PEE', 0);">
                        <img class="my-4 mx-auto w-full" style="max-width:300px" src="https://laravel.io/images/showcase/fseu-small.png" alt="Full Stack Europe">
                    </a>

                    <p class="text-center px-4 mt-4 md:mt-6">
                        <a href="https://github.com/sponsors/laravelio" target="_blank" rel="noopener"
                           class="text-base border-b pb-1 text-gray-700 border-gray-300 hover:text-gray-500">
                            Your banner here too?
                        </a>
                    </p>                </div>

                <div class="mt-6">
                    <div class="bg-white shadow rounded-md p-5 pb-3">
                        <h3 class="text-xl font-semibold">Moderators</h3>

                        <ul>
                            <li class="border-b flex items-center gap-x-5 pb-3 pt-5">
                                <a href="https://laravel.io/user/taftse" class="hover:underline">
                                    <img src="https://unavatar.now.sh/github/taftse?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Taftse" class="rounded-full text-gray-500 w-10 h-10"/>
                                </a>

                                <span class="flex flex-col">
                    <a href="https://laravel.io/user/taftse" class="hover:underline">
                        <span class="text-gray-900 font-medium">
                            taftse
                        </span>
                    </a>

                    <span class="text-gray-700">
                        Joined 8 Dec 2013
                    </span>
                </span>
                            </li>
                            <li class="border-b flex items-center gap-x-5 pb-3 pt-5">
                                <a href="https://laravel.io/user/driesvints" class="hover:underline">
                                    <img src="https://unavatar.now.sh/github/driesvints?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Dries Vints" class="rounded-full text-gray-500 w-10 h-10"/>
                                </a>

                                <span class="flex flex-col">
                    <a href="https://laravel.io/user/driesvints" class="hover:underline">
                        <span class="text-gray-900 font-medium">
                            driesvints
                        </span>
                    </a>

                    <span class="text-gray-700">
                        Joined 16 Dec 2013
                    </span>
                </span>
                            </li>
                            <li class="border-b flex items-center gap-x-5 pb-3 pt-5">
                                <a href="https://laravel.io/user/joedixon" class="hover:underline">
                                    <img src="https://unavatar.now.sh/github/joedixon?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Joe Dixon" class="rounded-full text-gray-500 w-10 h-10"/>
                                </a>

                                <span class="flex flex-col">
                    <a href="https://laravel.io/user/joedixon" class="hover:underline">
                        <span class="text-gray-900 font-medium">
                            joedixon
                        </span>
                    </a>

                    <span class="text-gray-700">
                        Joined 23 Jun 2014
                    </span>
                </span>
                            </li>
                            <li class="flex items-center gap-x-5 pb-3 pt-5">
                                <a href="https://laravel.io/user/tvbeek" class="hover:underline">
                                    <img src="https://unavatar.now.sh/github/tvbeek?fallback=https%3A%2F%2Flaravel.io%2Fimages%2Fuser.svg" alt="Tobias van Beek" class="rounded-full text-gray-500 w-10 h-10"/>
                                </a>

                                <span class="flex flex-col">
                    <a href="https://laravel.io/user/tvbeek" class="hover:underline">
                        <span class="text-gray-900 font-medium">
                            tvbeek
                        </span>
                    </a>

                    <span class="text-gray-700">
                        Joined 8 Jan 2018
                    </span>
                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="mb-14 lg:mb-40">
    <div class="container mx-auto flex justify-center mt-14">
        <div class="w-full mx-4 text-center">
            <p class="text-base mb-6 md:text-lg md:mb-12">
                We'd like to thank these <span class="text-lio-500 font-bold relative inline-block stroke-current">
    amazing companies
    <svg class="absolute bottom-0 w-full max-h-1.5" viewBox="0 0 55 5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
    <path d="M0.652466 4.00002C15.8925 2.66668 48.0351 0.400018 54.6853 2.00002" stroke-width="2"/>
</svg></span> for supporting us
            </p>

            <div class="mt-6 grid grid-cols-2 gap-y-8 lg:grid-cols-4">
                <div class="col-span-2 flex justify-center lg:col-span-1">
                    <a class="flex items-center" href="https://beyondco.de">
                        <img class="max-h-7 max-w-14" src="https://laravel.io/images/sponsors/beyondcode.png" alt="Beyond Code" />
                    </a>
                </div>

                <div class="col-span-2 flex justify-center lg:col-span-1">
                    <a class="flex items-center" href="https://devsquad.com">
                        <img class="max-h-7 max-w-14" src="https://laravel.io/images/sponsors/devsquad.png" alt="DevSquad" />
                    </a>
                </div>

                <div class="col-span-2 flex justify-center lg:col-span-1">
                    <a class="flex items-center" href="https://usefathom.com/ref/7A8QGC">
                        <img class="max-h-7 max-w-14" src="https://laravel.io/images/sponsors/fathom.png" alt="Fathom" />
                    </a>
                </div>

                <div class="col-span-2 flex justify-center lg:col-span-1">
                    <a class="flex items-center" href="https://forge.laravel.com/">
                        <img class="max-h-7 max-w-14" src="https://laravel.io/images/sponsors/forge.png" alt="Forge" />
                    </a>
                </div>

                <div class="col-span-2 flex justify-center lg:col-span-1">
                    <a class="flex items-center" href="https://envoyer.io/">
                        <img class="max-h-7 max-w-14" src="https://laravel.io/images/sponsors/envoyer.png" alt="Envoyer" />
                    </a>
                </div>

                <div class="col-span-2 flex justify-center lg:col-span-1">
                    <a class="flex items-center" href="https://blackfire.io/">
                        <img class="max-h-7 max-w-14" src="https://laravel.io/images/sponsors/blackfire-io.png" alt="Blackfire.io" />
                    </a>
                </div>

                <div class="col-span-2 flex justify-center lg:col-span-1">
                    <a class="flex items-center" href="https://akaunting.com/developers?utm_source=Laravelio&amp;utm_medium=Banner&amp;utm_campaign=Developers">
                        <img class="max-h-7 max-w-14" src="https://laravel.io/images/sponsors/akaunting.png" alt="Akaunting" />
                    </a>
                </div>

                <div class="col-span-2 flex justify-center lg:col-span-1">
                    <a class="flex items-center" href="https://larajobs.com">
                        <img class="max-h-7 max-w-14" src="https://laravel.io/images/sponsors/larajobs.svg" alt="LaraJobs" />
                    </a>
                </div>

                <div class="col-span-2 flex justify-center lg:col-span-1 lg:col-start-2">
                    <a class="flex items-center" href="https://ter.li/vj4bxb">
                        <img class="max-h-7 max-w-14" src="https://laravel.io/images/sponsors/scout-apm.jpg" alt="Scout APM" />
                    </a>
                </div>

                <div class="col-span-2 flex justify-center lg:col-span-1">
                    <a class="flex items-center" href="https://www.cloudways.com/en/?id=972670">
                        <img class="max-h-7 max-w-14" src="https://laravel.io/images/sponsors/cloudways.png" alt="Cloudways" />
                    </a>
                </div>
            </div>

            <p class="text-center px-4 mt-8 md:mt-12">
                <a href="https://github.com/sponsors/laravelio" target="_blank" rel="noopener"
                   class="text-base border-b pb-1 text-lio-500 border-lio-100 hover:text-lio-600">
                    Your logo here?
                </a>
            </p>    </div>
    </div>
</section>

<div class="bg-gray-900 text-white">
    <div class="container mx-auto pt-7 pb-8 lg:pt-20 lg:px-16">
        <div class="mx-4 md:mx-0">
            <div class="flex flex-col pb-8 mb-8 border-b lg:pb-16 border-gray-800 lg:flex-row">
                <div class="w-full mb-6 lg:w-2/5 lg:pr-20 lg:mb-0">
                    <a href="" class="block mb-5">
                        <img src="https://laravel.io/images/laravelio-logo-white.svg" />
                    </a>

                    <p class="text-gray-100 lg:leading-loose">
                        The Laravel portal for problem solving, knowledge sharing and community building.
                    </p>
                </div>

                <div class="lg:w-full lg:flex lg:justify-between">
                    <div class="flex-grow mb-6 lg:mb-0">
                        <h6 class="text-lg mb-4 lg:mb-6">
                            Laravel.io
                        </h6>

                        <div class="flex flex-wrap lg:flex-col lg:flex-no-wrap">
                            <a href="https://laravel.io/forum" class="w-1/2 text-gray-400 mb-4 hover:text-gray-200 lg:mb-6">
                                Forum
                            </a>

                            <a href="https://laravel.io/articles" class="w-1/2 text-gray-400 mb-4 hover:text-gray-200 lg:mb-6">
                                Articles
                            </a>

                            <a href="https://paste.laravel.io" class="w-1/2 text-gray-400 mb-4 hover:text-gray-200 lg:mb-6">
                                Pastebin
                            </a>
                        </div>
                    </div>

                    <div class="flex-grow mb-6 lg:mb-0">
                        <h6 class="text-lg mb-4 lg:mb-6">
                            Socials
                        </h6>

                        <div class="flex flex-wrap lg:flex-col lg:flex-no-wrap">
                            <a href="https://twitter.com/laravelio" class="w-1/2 text-gray-400 mb-4 hover:text-gray-200 lg:mb-6">
                                <svg class="text-white w-4 h-4 inline mr-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"/>
                                </svg>                                Twitter
                            </a>

                            <a href="https://github.com/laravelio" class="w-1/2 text-gray-400 mb-4 hover:text-gray-200 lg:mb-6">
                                <svg class="text-white w-4 h-4 inline mr-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                                </svg>                                GitHub
                            </a>
                        </div>
                    </div>

                    <div class="flex-grow">
                        <h6 class="text-lg mb-6">
                            The community
                        </h6>

                        <div class="flex flex-col flex-nowrap">
                            <div class="flex mb-4 lg:mb-6">
                                <a href="https://laravel.com" class="w-1/2 text-gray-400 hover:text-gray-200">
                                    <img src="https://laravel.io/images/laravel.png" alt="Laravel" class="w-4 h-4 inline mr-2" />
                                    Laravel
                                </a>

                                <a href="https://laravel-news.com" class="w-1/2 text-gray-400 hover:text-gray-200">
                                    <img src="https://laravel.io/images/laravel-news.png" alt="Laravel News" class="w-4 h-4 inline mr-2" />
                                    Laravel News
                                </a>
                            </div>

                            <div class="flex">
                                <a href="https://laracasts.com" class="w-1/2 text-gray-400 hover:text-gray-200">
                                    <img src="https://laravel.io/images/laracasts.png" alt="Laracasts" class="w-4 h-4 inline mr-2" />
                                    Laracasts
                                </a>

                                <a href="https://www.laravelpodcast.com" class="w-1/2 text-gray-400 hover:text-gray-200">
                                    <img src="https://laravel.io/images/podcast.png" alt="Laravel Podcast" class="w-4 h-4 inline mr-2" />
                                    Laravel Podcast
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-gray-100 flex flex-col lg:flex-row">
                <span class="mb-5 lg:mb-0 lg:mr-5">
                    &copy; 2021 Laravel.io - All rights reserved.
                </span>

                <div class="flex flex-wrap lg:block">
                    <a href="https://laravel.io/terms" class="w-1/2 mb-4 hover:text-gray-200 lg:w-full lg:mb-0 lg:mr-8">
                        Terms of service
                    </a>
                    <a href="https://laravel.io/privacy" class="w-1/2 mb-4 hover:text-gray-200 lg:w-full lg:mb-0 lg:mr-8">
                        Privacy policy
                    </a>
                    <a href="https://github.com/sponsors/laravelio" class="w-1/2 hover:text-gray-200 lg:w-full lg:mb-0">
                        Advertise
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/livewire/livewire.js?id=54d078b2ce39327a1702" data-turbo-eval="false" data-turbolinks-eval="false"></script><script data-turbo-eval="false" data-turbolinks-eval="false">window.livewire = new Livewire();window.Livewire = window.livewire;window.livewire_app_url = '';window.livewire_token = 'oulKwgfrrg4lRUDKEpfsnH5HCKU5u4JPDJEDRFDD';window.deferLoadingAlpine = function (callback) {window.addEventListener('livewire:load', function () {callback();});};document.addEventListener("DOMContentLoaded", function () {window.livewire.start();});</script>

</body>
</html>
