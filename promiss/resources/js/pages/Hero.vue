<script setup>
import Button from '../components/Button.vue'
import Tag from '../components/Tag.vue'
</script>

<template>
    <div class="container h-screen flex-col items-start gap-6 md:flex py-16">
                <Tag text="profesionálna agentúra" id="home" />
                <h1 class="h1 mt-4 text-white">
                    Vytvárame <span class="hue">dokonalé</span> zážitky
                </h1>
                <p class="p1 text-light">
                    Profesionálne hostesingové služby pre vaše podujatia. Od korporátnych eventov po módne prehliadky a promo akcie.
                </p>
                <div class="flex items-center gap-4">
                    <Button variant="primary" text="Nezáväzná konzultácia" />
                    <Button variant="secondary" text="Naše služby" />
                </div>
            </div>
</template>