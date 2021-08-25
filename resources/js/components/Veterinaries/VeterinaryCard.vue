<template>
    <div class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
        <div class="w-full flex items-center justify-between p-6 space-x-6">
            <div class="flex-1 truncate">
                <div class="flex items-center space-x-3">
                    <h3 v-text="veterinary.name"
                        class="text-gray-700 text-base font-semibold truncate"
                    ></h3>
                </div>
                <p v-if="veterinary.location"
                   v-text="veterinary.location.city + ' - ' + veterinary.location.state.name"
                   class="mt-2 text-sm text-gray-600"
                ></p>
                <p v-else
                   class="mt-2 text-sm text-gray-600">
                    <span class="rounded-full p-2 bg-yellow-100 ring-yellow-200 text-yellow-700 text-xs p-1">
                        La Ubicación es requerida.
                    </span>
                </p>
                <p class="mt-2">
                    <span v-for="(service, index) in veterinary.services"
                          :key="index"
                          v-if="service.length <= 10 && index <= 1"
                          v-text="service"
                          class="mr-1 flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-cyan-100 rounded-full"
                    ></span>
                </p>
            </div>
            <img v-if="isProduction"
                 class="w-24 h-24 shadow-sm rounded-lg flex-shrink-0"
                 :class="veterinary.logo ? 'bg-gray-300' : 'bg-white'"
                 :src="veterinary.logo ? veterinary.logo : '/logos/favicon.png'"
                 alt="">
            <img v-else class="w-24 h-24 shadow-sm rounded-lg flex-shrink-0"
                 :class="veterinary.logo ? 'bg-gray-300' : 'bg-white'"
                 :src="veterinary.logo ? veterinary.logo.replace('public', 'storage') : '/logos/favicon.png'"
                 alt="">
        </div>
        <div>
            <div class="-mt-px flex divide-x divide-gray-200">
                <div class="w-0 flex-1 flex">
                    <a v-if="! contactOpen"
                       @click="contactOpen = true"
                       href="#"
                       class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        <span class="ml-3">Llamar</span>
                    </a>
                    <span v-else
                          v-text="formatPhone(veterinary.phone)"
                          class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500"
                    ></span>
                </div>
                <div class="-ml-px w-0 flex-1 flex">
                    <a :href="veterinary.meta.profile"
                       class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        <span class="ml-3">Perfil</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        veterinary: {
            required: true,
            type: Object
        },
    },
    data() {
        return {
            contactOpen: false,
        }
    },
}
</script>
