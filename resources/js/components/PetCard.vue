<template>
    <div class="bg-white shadow-md rounded-lg px-4 pt-3 pb-2 hover:bg-gray-50 hover:shadow-2xl transition hover:transform cursor-pointer">
        <div class="flex-none md:flex">
            <div class="h-full w-full md:h-48 md:w-48 md:mb-0 mb-3">
                <img :src="localData.pet.images && localData.pet.images.length > 0 ? localData.pet.images[0].file_name.replace('public', 'storage') : '/img/adoptions.png'"
                     alt="Little Pets photo"
                     class="w-full object-scale-down lg:object-cover md:h-48 rounded-lg shadow-md">
            </div>
            <div class="flex-auto md:ml-6 justify-evenly py-1">
                <div class="flex-wrap">
                    <div class="flex items-center">
                        <div class="mr-2 flex-none text-sm text-sky-500 font-medium">
                            <span v-if="localData.pet.gender === 'male'">Macho</span>
                            <span v-else-if="localData.pet.gender === 'female'">Hembra</span>
                        </div>
                        <div v-text="localData.pet.size"
                             class="mr-4 flex-none text-sm text-green-500 font-medium"
                        ></div>
                    </div>
                    <div class="mt-3 flex-1 items-center">
                        <p class="mr-2 text-sm text-gray-600">Me llamo</p>
                        <h2 v-text="localData.pet.name"
                            class="flex-auto text-xl text-cyan-600 font-medium"
                        ></h2>
                    </div>
                </div>
                <p class="mt-2"></p>
                <span class="text-gray-500 text-xs items-center">Datos adicionales</span>
                <div class="flex pb-3 pt-1 text-sm text-gray-600">
                    <div class="flex-1 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <p class="">Mexicali, BC</p>
                    </div>
                    <div v-if="meta.date"
                         class="flex-1 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p v-text="meta.date"></p>
                    </div>
                </div>
                <div class="flex justify-center pb-2 border-t border-gray-200"></div>
<!--                <div class="flex justify-start text-sm font-medium items-center align-middle">
                    <div class="flex items-center">
                        <div class="bg-white py-2 px-3 shadow-sm tracking-wide border text-gray-600 rounded-full inline-flex items-center space-x-1">
                            <span class="text-green-400 hover:text-green-500 rounded-lg">
                                <i class="far fa-laugh-beam"></i>
                            </span>
                            <span>Encontrado</span>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PetCard',
    props: {
        data: {
            required: true,
            type: Object
        },
        meta: {
            required: true,
            type: Object
        },
    },
    data() {
        return {
            localData: this.data,
        }
    },
}
</script>
