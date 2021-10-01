<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:site_name" content="LittlePets.io">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/logos/favicon.png">

    <title>@yield('title') | Blog Oficial de {{ config('app.name') }} | Haciendo todo lo posible por encontrarle hogar a cada angelito perdido.</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @yield('styles')

    @livewireStyles

</head>
<body class="font-sans antialiased min-w-full bg-gray-100">
@livewireScripts

<div id="app">
    <App inline-template>
        <div class="bg-cyan-600 pb-32">
            @include('blog.layouts.nav')

            <header class="pt-10 pb-4">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-bold text-white">
                            Blog
                        </h1>
                        <div class="">
                            <button class="lp-btn">
                                Regresar a LittlePets
                            </button>
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <main class="-mt-24 pb-8">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="sr-only">Page title</h1>

                <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
                    <div class="grid grid-cols-1 gap-4 lg:col-span-9">
                        <section aria-labelledby="section-1-title">
                            <h2 class="sr-only" id="section-1-title">Section title</h2>
                            <div class="rounded-lg bg-white overflow-hidden shadow">
                                <div class="py-6 px-12">
                                    <div class="flex flex-col gap-y-8 lg:flex-row lg:gap-x-8 lg:mb-16">
                                        @yield('blog.content')
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                @yield('blog.content.bottom')
            </div>
        </main>
    </App>
</div>

</body>
</html>
