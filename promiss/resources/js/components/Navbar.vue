<script setup>
import { ref } from 'vue'
import Button from './Button.vue'

const isOpen = ref(false)

const toggleMenu = () => {
    isOpen.value = !isOpen.value
}

const closeMenu = () => {
    isOpen.value = false
}
</script>

<template>
    <nav class="sticky top-0 z-50 w-full bg-black/50 backdrop-blur px-4 md:px-6">
        <div class="flex h-16 items-center justify-between">
            <a href="/" @click="closeMenu">
                <h2 class="h2 text-white">
                    <span class="hue">Pro</span>miss
                </h2>
            </a>

            <div class="hidden items-center gap-8 md:flex">
                <Button variant="text" text="Domov" />
                <Button variant="text" text="O nás" />
                <Button variant="text" text="Služby" />
                <Button variant="text" text="Tu ste nás mohli stretnúť" />
                <Button variant="text" text="Kontakt" />
            </div>

            <div class="hidden md:block">
                <Button variant="primary" text="Kontaktujte nás" />
            </div>

            <button
                type="button"
                class="flex h-10 w-10 items-center justify-center text-white md:hidden"
                aria-label="Toggle menu"
                @click="toggleMenu"
            >
                <i
                    v-if="!isOpen"
                    class="bi bi-list text-xl text-white"
                ></i>

                <i
                    v-else
                    class="bi bi-x-lg text-xl text-white"
                ></i>
            </button>
        </div>

        <Transition name="mobile-menu">
            <div
                v-if="isOpen"
                class="flex flex-col gap-6 pb-4 md:hidden"
            >
                <Button variant="text" text="Domov" @click="closeMenu" />
                <Button variant="text" text="O nás" @click="closeMenu" />
                <Button variant="text" text="Služby" @click="closeMenu" />
                <Button variant="text" text="Tu ste nás mohli stretnúť" @click="closeMenu" />
                <Button variant="text" text="Kontakt" @click="closeMenu" />
                <Button variant="primary" text="Kontaktujte nás" @click="closeMenu" />
            </div>
        </Transition>
    </nav>
</template>

<style scoped>
.mobile-menu-enter-active,
.mobile-menu-leave-active {
    overflow: hidden;
    transition:
        max-height 0.3s ease,
        opacity 0.3s ease,
        transform 0.3s ease;
}

.mobile-menu-enter-from,
.mobile-menu-leave-to {
    max-height: 0;
    opacity: 0;
    transform: translateY(-10px);
}

.mobile-menu-enter-to,
.mobile-menu-leave-from {
    max-height: 500px;
    opacity: 1;
    transform: translateY(0);
}
</style>