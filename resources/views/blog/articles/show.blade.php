@extends('blog.layouts.blog')

@section('title', e($article->title))

@section('metas')
    <meta property="og:url" content="{{ $article->profile() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $article->title }}" />
    <meta name="description" content="{{ $article->excerpt }}" />
    <meta property="og:image" content="{{ $article->getMedia()->first()->file_name ?? '/logos/little_pets.png' }}" />
@endsection

@section('blog.content')
    <article class="w-full">
        <div class="w-full bg-center bg-cover bg-black rounded-lg"
             style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url({{ $article->getMedia()->first()->file_name ?? '/logos/favicon.png' }});">
            <div class="container mx-auto">
                <div class="px-4 lg:px-0 lg:mx-48">
                    <div class="flex items-center justify-between pt-6 mb-28">
                        <a href="{{ route('web.blog.index') }}" class="hidden flex items-center text-base text-white hover:underline lg:flex">
                            <span class="text-lg text-white ml-1 hover:text-gray-100 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Regresar a Artículos
                            </span>
                        </a>

<!--                        <div class="hidden lg:flex">
                            Awaiting Approval
                        </div>-->
                    </div>

                    @if (count($categories = $article->categories))
                        <div class="flex flex-wrap gap-2 lg:gap-x-4 mb-4">
                            @foreach ($categories as $category)
                                <span class="text-base text-white bg-transparent border border-white rounded py-1.5 px-3 leading-none">
                                    {{ $category->display_name }}
                                </span>
                            @endforeach
                        </div>
                    @endif

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
            <div class="flex px-4 lg:px-0 lg:mx-10">
                <div class="hidden lg:block lg:w-1/5">
                    <div class="py-2 mt-10 sticky top-0">
                        <div class="flex items-start">
                            <div class="flex flex-col items-center">
                                <div class="flex flex-col items-center gap-y-5 mt-10">
                                    <span class="uppercase text-gray-500">Compartir</span>
                                    <a class="text-gray-300 hover:text-blue-400"
                                       target="_blank"
                                       rel="noopener"
                                       aria-label="Share on Facebook"
                                       href="{{ $article->shareOnFacebook() }}">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill="currentColor" fill-rule="evenodd" d="M18.8961111,0 L1.10388889,0 C0.494166667,0 0,0.494166667 0,1.10388889 L0,18.8963889 C0,19.5058333 0.494166667,20 1.10388889,20 L10.6825,20 L10.6825,12.255 L8.07611111,12.255 L8.07611111,9.23666667 L10.6825,9.23666667 L10.6825,7.01055556 C10.6825,4.42722222 12.2602778,3.02083333 14.5647222,3.02083333 C15.6686111,3.02083333 16.6172222,3.10277778 16.8938889,3.13972222 L16.8938889,5.83944444 L15.2955556,5.84027778 C14.0422222,5.84027778 13.7997222,6.43583333 13.7997222,7.30972222 L13.7997222,9.23694444 L16.7886111,9.23694444 L16.3994444,12.2552778 L13.7997222,12.2552778 L13.7997222,20 L18.8963889,20 C19.5058333,20 20,19.5058333 20,18.8961111 L20,1.10388889 C20,0.494166667 19.5058333,0 18.8961111,0 L18.8961111,0 Z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full pt-4 lg:w-4/5 lg:pt-10">
                    <div class="prose prose-lg text-gray-800 prose-lio text-justify">
                        {!! $article->body !!}
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
