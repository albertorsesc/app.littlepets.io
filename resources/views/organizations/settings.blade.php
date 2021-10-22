@extends('layouts.app')

@section('title', 'Configuraciones de mi Organizacion: ' . e($organization->name))

@section('content')
    <organization-settings :organization="{{ json_encode($organization) }}" inline-template>
        <div>
            <div class="relative bg-sky-700 pb-32 overflow-hidden">
                <header class="relative py-10">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between">
                        <h1 class="text-3xl font-bold text-white" v-text="headerTitle"></h1>

                        <button @click="redirectTo(organization.meta.profile)"
                                class="lp-btn">
                            Regresar a mi @{{ organization.type }}
                        </button>
                    </div>
                </header>
            </div>

            <main class="relative -mt-32">
                <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">

                            <aside class="py-6 lg:col-span-3">
                                <nav class="space-y-1">
                                    <a href="#"
                                       @click="activeTab = 'profile'"
                                       :class="activeTab === 'profile' ?
                                            'bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700' :
                                            'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group'"
                                       class="border-l-4 px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             :class="activeTab === 'profile' ? 'text-teal-500 group-hover:text-teal-500' : 'text-gray-400 group-hover:text-gray-500'"
                                             class="flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                        </svg>
                                        <span class="truncate" v-text="organization.type"></span>
                                    </a>

                                    <a href="#"
                                       @click="activeTab = 'members'"
                                       :class="activeTab === 'members' ?
                                            'bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700' :
                                            'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group'"
                                       class="border-l-4 px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
                                        <svg :class="activeTab === 'members' ? 'text-teal-500 group-hover:text-teal-500' : 'text-gray-400 group-hover:text-gray-500'"
                                             class="flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                        </svg>
                                        <span class="truncate">
                                          Miembros de @{{ organization.type }}
                                        </span>
                                    </a>
                                </nav>
                            </aside>

                            <update-organization v-if="activeTab === 'profile'"></update-organization>

                            <members v-if="activeTab === 'members'"></members>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </organization-settings>
@endsection
