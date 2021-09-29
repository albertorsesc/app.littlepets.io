<template>
    <form @submit.prevent>
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Registra un Evento</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Registra los datos básicos y accede al perfil de tu Evento para continuar con el resto de la información
                        necesaria para tu evento...
                    </p>
                </div>

                <div class="grid grid-cols-6 gap-6">
                    <!--Title-->
                    <div class="col-span-6">
                        <label for="title" class="block md:flex-none text-sm font-medium text-gray-700">
                            <strong class="required">*</strong>
                            Titulo
                        </label>
                        <div class="mt-2">
                            <input type="text"
                                   v-model="eventForm.title"
                                   id="title"
                                   class="lp-input"
                                   :class="errors.title ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.title"
                           v-text="errors.title[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--StartsAt-->
                    <div class="col-span-6 md:col-span-2">
                        <label for="starts_at" class="block text-sm font-medium text-gray-700">
                            <strong class="required">*</strong>
                            Hora y Fecha de inicio
                        </label>
                        <div class="mt-1">
                            <input type="datetime-local"
                                   v-model="eventForm.startsAt"
                                   id="starts_at"
                                   class="lp-input">
                        </div>
                        <p v-if="errors.starts_at"
                           v-text="errors.starts_at[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--EndsAt-->
                    <div class="col-span-6 md:col-span-2">
                        <label for="ends_at" class="block text-sm font-medium text-gray-700">
                            <strong class="required">*</strong>
                            Hora y Fecha de Termino
                        </label>
                        <div class="mt-1">
                            <input type="datetime-local"
                                   v-model="eventForm.endsAt"
                                   id="ends_at"
                                   class="lp-input">
                        </div>
                        <p v-if="errors.ends_at"
                           v-text="errors.ends_at[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Phone-->
                    <div class="col-span-6 md:col-span-2">
                        <label for="phone" class="block text-sm font-medium text-gray-700">
                            Teléfono
                            <span class="optional">(opcional)</span>
                        </label>
                        <div class="mt-2">
                            <input type="text"
                                   v-model="eventForm.phone"
                                   id="phone"
                                   class="lp-input"
                                   :class="errors.phone ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.phone"
                           v-text="errors.phone[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Facebook event link-->
                    <div class="col-span-6 md:col-span-2">
                        <label for="facebook_link" class="block text-sm font-medium text-gray-700">
                            Enlace del Evento en Facebook
                            <span class="optional">(opcional)</span>
                        </label>
                        <div class="mt-1">
                            <input type="text"
                                   v-model="eventForm.facebookLink"
                                   id="facebook_link"
                                   class="lp-input"
                                   :class="errors.facebook_link ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.facebook_link"
                           v-text="errors.facebook_link[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Excerpt-->
                    <div class="col-span-6 md:col-span-4">
                        <div>
                            <label for="excerpt" class="block text-sm font-medium text-gray-700">
                                Descripcion Corta
                                <span class="optional">(opcional; 255 caracteres maximo)</span>
                            </label>
                            <div class="mt-1">
                                <textarea id="excerpt"
                                          v-model="eventForm.excerpt"
                                          rows="4"
                                          class="lp-input"
                                ></textarea>
                            </div>
                            <p v-if="errors.excerpt"
                               v-text="errors.excerpt[0]"
                               class="text-red-500 font-medium"
                            ></p>
                        </div>
                    </div>

                    <!--Description-->
                    <div class="col-span-6">
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Descripcion del Evento
                                <span class="optional">(opcional)</span>
                            </label>
                            <div class="mt-1">
                                <textarea id="description"
                                          v-model="eventForm.description"
                                          rows="4"
                                          class="lp-input"
                                ></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="px-6 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                        @click="store"
                        :disabled="isLoading"
                        class="btn text-lg font-medium hover:bg-cyan-500 hover:text-white hover:font-semibold">
                    Guardar
                </button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    name: "CreateEvent",
    data() {
        return {
            eventForm: {
            },

            isLoading: false,
            errors: [],
        }
    },
    methods: {
        store() {
            this.isLoading = true
            axios.post('/events', {
                title: this.eventForm.title,
                starts_at: this.eventForm.startsAt,
                ends_at: this.eventForm.endsAt,
                excerpt: this.eventForm.excerpt,
                description: this.eventForm.description,
            })
                .then(response => {
                    window.Event.$emit('event-form:store', response.data.data)
                    this.isLoading = false
                    this.eventForm = {}
                    this.errors = []
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    } else {
                        this.errors = []
                    }
                    this.isLoading = false
                })
        },
    }
}
</script>
