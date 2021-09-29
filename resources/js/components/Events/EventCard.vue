<template>
    <a :href="event.meta.profile">
        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
            <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80" alt="">
            </div>
            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                <div class="flex-1">
                    <div class="block">
                        <p class="text-xl font-semibold text-gray-900" v-text="event.title"></p>
                        <p class="mt-3 text-base text-gray-500">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius,
                            ut atque fuga culpa.
                        </p>
                    </div>
                </div>
                <hr class="my-2">
                <div class="flex justify-between text-center align-middle py-2">
                <span class="flex text-gray-500 text-sm mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 text-gray-400 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Mexicali, BC.
                </span>
                    <span class="flex text-gray-500 text-sm mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 text-gray-400 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    30 Septiembre 2021.
                </span>
                    <span class="flex text-gray-500 text-sm mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 text-gray-400 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Asistentes: 0
                </span>
                </div>
                <div class="mt-6 flex justify-between items-center">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <a href="#">
                                <span class="sr-only">Roel Aufderehar</span>
                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </a>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">
                                <a href="#" class="hover:underline">Roel Aufderehar</a>
                            </p>
                            <div class="flex space-x-1 text-sm text-gray-500">
                                <time datetime="2020-03-16">Mar 16, 2020</time>
                                <span aria-hidden="true">&middot;</span>
                                <span>6 min read</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="rounded-full p-2 hover:bg-green-500 text-gray-300 border border-gray-100 shadow-sm" title="Asistir">
                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-white font-medium h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </a>
</template>

<script>
export default {
    props: {
        event: {
            required: true,
            type: Object
        }
    }
}
</script>
