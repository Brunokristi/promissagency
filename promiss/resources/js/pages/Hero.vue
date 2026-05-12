<script setup>
import Button from '../components/Button.vue'
import Tag from '../components/Tag.vue'

const image = '/assets/hero.jpg'
</script>

<template>
    <div class="relative flex flex-col lg:flex-row lg:items-center py-8">
        <div
            class="absolute inset-0 z-10 flex flex-col justify-center gap-6
                    lg:static lg:w-1/2 lg:p-0"
        >
            <Tag text="profesionálna agentúra" id="home" />

            <h1 class="h1 text-white md:text-7xl text-4xl">
                Vytvárame<br> <span class="hue">dokonalé</span> zážitky
            </h1>

            <p class="p1 text-light">
                Profesionálne hostesingové služby pre vaše podujatia. Od korporátnych eventov po módne prehliadky a promo akcie.
            </p>

            <div class="flex flex-wrap gap-4">
                <Button variant="primary" text="Nezáväzná konzultácia" href="#contact" />
                <Button variant="secondary" text="Naše služby" href="#services" />
            </div>
        </div>

        <div class="relative w-full overflow-hidden lg:w-1/2">
            <img
                :src="image"
                alt="Hero"
                class="h-[400px] w-full object-cover object-right md:scale-115 lg:h-[520px]"
            />

            <div class="absolute inset-0 bg-radial from-black/30 via-black/80 to-black/100"></div>
        </div>

    </div>
</template>