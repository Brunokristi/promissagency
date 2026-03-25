<script setup>
import { computed, onMounted, ref } from 'vue'
import {
    applyGoogleConsent,
    getDefaultConsent,
    getStoredConsent,
    saveConsent,
} from '../lib/consent'

const consent = ref(getDefaultConsent())
const hasSavedConsent = ref(false)
const showPreferences = ref(false)

const showBanner = computed(() => !hasSavedConsent.value)

onMounted(() => {
    const stored = getStoredConsent()

    if (!stored) {
        return
    }

    consent.value = {
        necessary: true,
        analytics: stored.analytics,
    }
    hasSavedConsent.value = true
    applyGoogleConsent(stored)
})

function persistAndApply(value) {
    consent.value = {
        necessary: true,
        analytics: value.analytics,
    }

    const saved = saveConsent(consent.value)
    hasSavedConsent.value = true
    showPreferences.value = false
    applyGoogleConsent(saved)
}

function acceptAll() {
    persistAndApply({ analytics: true })
}

function rejectAll() {
    persistAndApply({ analytics: false })
}

function savePreferences() {
    persistAndApply({ analytics: consent.value.analytics })
}

function openPreferences() {
    showPreferences.value = true
}

function closePreferences() {
    showPreferences.value = false
}
</script>

<template>
    <div>
        <transition name="cookie-slide">
            <section
                v-if="showBanner"
                class="fixed inset-x-3 bottom-3 z-[100] rounded-2xl border border-white/20 bg-black/90 p-5 text-white shadow-2xl backdrop-blur md:inset-x-auto md:right-6 md:bottom-6 md:max-w-xl"
                aria-live="polite"
            >
                <p class="text-lg font-semibold text-white">
                    Nastavenie cookies
                </p>
                <p class="mt-2 text-sm leading-relaxed text-light">
                    Používame nevyhnutné cookies na fungovanie stránky a analytické cookies na meranie návštevnosti.
                    Analytiku aktivujeme iba po vašom súhlase.
                </p>

                <div class="mt-4 flex flex-wrap gap-2">
                    <button
                        type="button"
                        class="rounded-full border border-light/40 px-4 py-2 text-sm text-light transition hover:border-light hover:text-white"
                        @click="rejectAll"
                    >
                        Odmietnuť analytiku
                    </button>
                    <button
                        type="button"
                        class="rounded-full border border-accent bg-accent px-4 py-2 text-sm font-medium text-white transition hover:bg-accent/90"
                        @click="acceptAll"
                    >
                        Prijať všetko
                    </button>
                    <button
                        type="button"
                        class="rounded-full px-4 py-2 text-sm text-white underline-offset-4 transition hover:underline"
                        @click="openPreferences"
                    >
                        Upraviť nastavenia
                    </button>
                </div>
            </section>
        </transition>

        <button
            type="button"
            class="fixed bottom-3 left-3 z-[99] rounded-full border border-light/40 bg-black/80 px-4 py-2 text-xs tracking-wide text-light backdrop-blur transition hover:border-light hover:text-white md:bottom-6 md:left-6"
            @click="openPreferences"
        >
            Nastavenie cookies
        </button>

        <transition name="cookie-fade">
            <div
                v-if="showPreferences"
                class="fixed inset-0 z-[120] flex items-end justify-center bg-black/60 p-3 md:items-center"
                @click.self="closePreferences"
            >
                <section class="w-full max-w-md rounded-2xl border border-white/20 bg-black p-5 text-white shadow-2xl">
                    <h2 class="text-lg font-semibold">
                        Preferencie cookies
                    </h2>
                    <p class="mt-2 text-sm text-light">
                        Nevyhnutné cookies sú vždy zapnuté. Analytické cookies môžete zapnúť alebo vypnúť.
                    </p>

                    <div class="mt-4 rounded-xl border border-light/30 bg-white/5 p-3">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-sm font-medium text-white">
                                    Nevyhnutné cookies
                                </p>
                                <p class="text-xs text-light">
                                    Potrebné pre základnú funkčnosť webu.
                                </p>
                            </div>
                            <span class="rounded-full bg-light/20 px-2 py-1 text-xs text-light">Vždy aktívne</span>
                        </div>
                    </div>

                    <div class="mt-3 rounded-xl border border-light/30 bg-white/5 p-3">
                        <label class="flex items-start justify-between gap-3" for="analytics-consent">
                            <div>
                                <p class="text-sm font-medium text-white">
                                    Analytické cookies (Google Analytics)
                                </p>
                                <p class="text-xs text-light">
                                    Pomáhajú nám pochopiť návštevnosť a zlepšovať obsah.
                                </p>
                            </div>
                            <input
                                id="analytics-consent"
                                v-model="consent.analytics"
                                type="checkbox"
                                class="mt-1 h-5 w-5 accent-accent"
                            >
                        </label>
                    </div>

                    <div class="mt-5 flex flex-wrap gap-2">
                        <button
                            type="button"
                            class="rounded-full border border-light/40 px-4 py-2 text-sm text-light transition hover:border-light hover:text-white"
                            @click="rejectAll"
                        >
                            Odmietnuť analytiku
                        </button>
                        <button
                            type="button"
                            class="rounded-full border border-accent bg-accent px-4 py-2 text-sm font-medium text-white transition hover:bg-accent/90"
                            @click="savePreferences"
                        >
                            Uložiť nastavenia
                        </button>
                    </div>
                </section>
            </div>
        </transition>
    </div>
</template>

<style scoped>
.cookie-slide-enter-active,
.cookie-slide-leave-active {
    transition: all 0.3s ease;
}

.cookie-slide-enter-from,
.cookie-slide-leave-to {
    opacity: 0;
    transform: translateY(24px);
}

.cookie-fade-enter-active,
.cookie-fade-leave-active {
    transition: opacity 0.2s ease;
}

.cookie-fade-enter-from,
.cookie-fade-leave-to {
    opacity: 0;
}
</style>
