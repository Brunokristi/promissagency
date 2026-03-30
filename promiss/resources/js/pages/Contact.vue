<script setup>
import { reactive, ref, watch } from 'vue'
import { prefillService } from '../lib/servicePrefill'
import Tag from '../components/Tag.vue'
import Card from '../components/Card.vue'
import Button from '../components/Button.vue'

const callPhone = () => {
    window.location.href = 'tel:+421910829952'
}

const sendEmail = () => {
    window.location.href = 'mailto:info@promissagency.com'
}

const openMap = () => {
    window.open('https://maps.app.goo.gl/16XX7MXYi9NTbF2Z7', '_blank')
}

const form = reactive({
        name: '',
        email: '',
        phone: '',
        event_type: '',
        message: '',
})

// Prefill event_type and message if prefillService is set
watch(
    () => prefillService.value,
    (service) => {
        if (service) {
            // Try to match the event_type option
            const eventTypeMap = {
                'Korporátne eventy': 'Korporátny event',
                'VIP & Galavečery': 'Galavečer / VIP',
                'Promo akcie': 'Promo akcia',
                'Golfové turnaje': 'Golfový turnaj',
                'Veľtrhy & Výstavy': 'Veľtrh / Výstava',
                'Módne prehliadky': 'Módna prehliadka',
            }
            form.event_type = eventTypeMap[service] || service
            form.message = `Mám záujem o hostessky na ${service}. Prosím o cenovú ponuku.`
        }
    },
    { immediate: true }
)

const isSubmitting = ref(false)
const successMessage = ref('')
const errorMessage = ref('')

const eventOptions = [
    'Korporátny event',
    'Galavečer / VIP',
    'Promo akcia',
    'Golfový turnaj',
    'Veľtrh / Výstava',
    'Módna prehliadka',
    'Iné',
]

const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    ?.getAttribute('content')

const submitForm = async () => {
    isSubmitting.value = true
    successMessage.value = ''
    errorMessage.value = ''

    try {
        const response = await fetch('/contact', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {}),
            },
            body: JSON.stringify(form),
        })

        const data = await response.json().catch(() => ({}))

        if (!response.ok) {
            throw new Error(data.message || 'Nepodarilo sa odoslať formulár.')
        }

        successMessage.value = 'Ďakujeme, vaša správa bola odoslaná.'
        form.name = ''
        form.email = ''
        form.phone = ''
        form.event_type = ''
        form.message = ''
    } catch (error) {
        errorMessage.value = error.message || 'Nastala chyba pri odosielaní.'
    } finally {
        isSubmitting.value = false
    }
}
</script>

<template>
    <div class="flex h-auto w-full flex-col items-center gap-10 py-16">
        <div class="flex w-full flex-col items-center gap-6">
            <Tag text="kontakt" id="contact" />

            <h1 class="h1 mt-4 text-white text-center">
                Poďme <span class="hue">spolupracovať</span>
            </h1>

            <p class="p1 text-light text-center">
                Kontaktujte nás pre nezáväznú konzultáciu a cenovú ponuku.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-2">
            <div class="flex flex-col gap-4">
                <Card
                    icon="bi bi-telephone"
                    value="Telefón"
                    text="+421 910 829 952"
                    @click="callPhone"
                    iconPosition="left"
                />

                <Card
                    icon="bi bi-envelope"
                    value="Email"
                    text="info@promissagency.com"
                    @click="sendEmail"
                    iconPosition="left"
                />

                <Card
                    icon="bi bi-geo-alt"
                    value="Adresa"
                    text="Doležalova 3424/15C, 821 04 Bratislava - Ružinov"
                    @click="openMap"
                    iconPosition="left"
                />

                <Card
                    icon="bi bi-clock"
                    value="Pracovná doba"
                    text="Pondelok - Piatok: 9:00 - 18:00, Sobota: 10:00 - 14:00, Nedeľa: Zatvorené"
                    iconPosition="left"
                />
            </div>

            <div class="flex h-full w-full items-center justify-center">
                <form
                    class="w-full h-full rounded-2xl border border-light/40 bg-light/20 p-6 backdrop-blur md:p-8"
                    @submit.prevent="submitForm"
                >
                    <div class="flex flex-col gap-6">
                        <h2 class="h2 text-white">
                            Dopyt na hostesky
                        </h2>

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div class="flex flex-col gap-2">
                                <label for="name" class="p2 text-light">
                                    Meno a priezvisko
                                </label>
                                <input
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    autocomplete="name"
                                    placeholder="Vaše meno"
                                    class="w-full rounded-2xl border border-light/20 bg-light/10 px-5 py-4 text-white outline-none transition-colors duration-300 placeholder:text-light/60 focus:border-accent"
                                    required
                                />
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="email" class="p2 text-light">
                                    Email
                                </label>
                                <input
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                    name="email"
                                    autocomplete="email"
                                    placeholder="vas@email.sk"
                                    class="w-full rounded-2xl border border-light/20 bg-light/10 px-5 py-4 text-white outline-none transition-colors duration-300 placeholder:text-light/60 focus:border-accent"
                                    required
                                />
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="phone" class="p2 text-light">
                                    Telefón
                                </label>
                                <input
                                    id="phone"
                                    v-model="form.phone"
                                    type="tel"
                                    name="phone"
                                    autocomplete="tel"
                                    placeholder="+421 XXX XXX XXX"
                                    class="w-full rounded-2xl border border-light/20 bg-light/10 px-5 py-4 text-white outline-none transition-colors duration-300 placeholder:text-light/60 focus:border-accent"
                                />
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="event_type" class="p2 text-light">
                                    Typ eventu
                                </label>
                                <select
                                    id="event_type"
                                    v-model="form.event_type"
                                    name="event_type"
                                    class="w-full appearance-none rounded-2xl border border-light/20 bg-light/10 px-5 py-4 text-white outline-none transition-colors duration-300 focus:border-accent"
                                    required
                                >
                                    <option disabled value="" class="bg-dark text-light">
                                        Vyberte typ
                                    </option>
                                    <option
                                        v-for="option in eventOptions"
                                        :key="option"
                                        :value="option"
                                        class="bg-dark text-white"
                                    >
                                        {{ option }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="message" class="p2 text-light">
                                Správa
                            </label>
                            <textarea
                                id="message"
                                v-model="form.message"
                                name="message"
                                rows="6"
                                placeholder="Napíšte nám viac o vašom evente..."
                                class="w-full resize-none rounded-2xl border border-light/20 bg-light/10 px-5 py-4 text-white outline-none transition-colors duration-300 placeholder:text-light/60 focus:border-accent"
                                required
                            ></textarea>
                        </div>

                        <div v-if="successMessage" class="p2 text-white">
                            {{ successMessage }}
                        </div>

                        <div v-if="errorMessage" class="p2 text-accent">
                            {{ errorMessage }}
                        </div>

                        <Button
                            type="submit"
                            variant="primary"
                            :disabled="isSubmitting"
                            text="Odoslať dopyt"
                            class="self-end"
                        >
                        </Button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>