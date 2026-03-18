<script setup>
import Button from '../components/Button.vue'
import Tag from '../components/Tag.vue'

const image = '/assets/placeholder.jpg'
</script>

<template>
    <div class="relative flex flex-col lg:flex-row lg:items-center py-8">
        <div
            class="absolute inset-0 z-10 flex flex-col justify-center gap-6
                    lg:static lg:w-1/2 lg:p-0"
        >
            <Tag text="profesionálna agentúra" id="home" />

            <h1 class="h1 text-white">
                Vytvárame <span class="hue">dokonalé</span> zážitky
            </h1>

            <p class="p1 text-light">
                Profesionálne hostesingové služby pre vaše podujatia. Od korporátnych eventov po módne prehliadky a promo akcie.
            </p>

            <div class="flex flex-wrap gap-4">
                <Button variant="primary" text="Nezáväzná konzultácia" href="#contact" />
                <Button variant="secondary" text="Naše služby" href="#services" />
            </div>
        </div>

        <div class="relative w-full lg:w-1/2">
            <img
                :src="image"
                alt="Hero"
                class="h-[400px] w-full object-cover lg:h-[520px]
                    [mask-image:radial-gradient(circle,white_65%,transparent_100%)]"
            />

            <div class="absolute inset-0 bg-radial from-black/70 via-black/90 to-black">
            </div>
        </div>

    </div>
</template>