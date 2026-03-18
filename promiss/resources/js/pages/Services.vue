<script setup>
import Tag from '../components/Tag.vue';
import Button from '../components/Button.vue';
import Card from '../components/Card.vue';
</script>

<template>
    <div class="w-full h-auto gap-10 py-16 space-y-10">
        <div class="flex w-full flex-col items-center gap-6">
            <Tag text="naše služby" id="services" />

            <h1 class="h1 mt-4 text-white text-center">
                Pre každú príležitosť
            </h1>

            <p class="p1 text-light text-center">
                Komplexné hostesingové služby prispôsobené vašim jedinečným potrebám.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-3">
            <Card
                icon="bi bi-suitcase-lg"
                value="Korporátne eventy"
                text="Profesionálne hostessky pre konferencie, firemné večierky a prezentácie."
            />
            <Card
                icon="bi bi-patch-plus"
                value="VIP & Galavečery"
                text="Exkluzívny servis pre premiérové podujatia a luxusné súkromné akcie"
            />
            <Card
                icon="bi bi-megaphone"
                value="Promo akcie"
                text="Profesionálni promotéri pre degustácie, sampling a letákové kampane."
            />
            <Card
                icon="bi bi-flag"
                value="Golfové turnaje"
                text="Hostessky a personál pre golfové turnaje a firemné golf days."
            />
            <Card
                icon="bi bi-stars"
                value="Módne prehliadky"
                text="Elegantné hostessky a modelky pre módne show a vernisáže."
            />
            <Card
                icon="bi bi-people"
                value="Veľtrhy & Výstavy"
                text="Promotérky pre stánky na výstavách, autosalóny a propagačné akcie."
            />
        </div>
    </div>
</template>