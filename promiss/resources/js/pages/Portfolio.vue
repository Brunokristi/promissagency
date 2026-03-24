<script setup>
import Tag from '../components/Tag.vue';
import Button from '../components/Button.vue';
import Image from '../components/Image.vue';

const openInstagram = () => {
    window.open('https://www.instagram.com/promiss_hostess_agency/', '_blank');
}

const image1 = '/assets/placeholder.jpg';

</script>
<template>
    <div class="w-full h-auto gap-10 py-16 space-y-10 flex flex-col items-center">
        <div class="flex w-full flex-col items-center gap-6">
            <Tag text="portfólio" id="portfolio" />

            <h1 class="h1 mt-4 text-white text-center">
                Tu ste nás mohli <span class="hue">stretnúť</span>
            </h1>

            <p class="p1 text-light text-center">
                Naše hostessky na eventoch, kde sme zanechali nezabudnuteľný dojem.
            </p>
        </div>

        <div class="grid w-full grid-cols-2 gap-4 sm:grid-cols-5">
            <Image
                :source="image1"
                :text="'Valentínska promo akcia'"
            />
            <Image
                :source="image1"
                :text="'Ploom-promo event'"
            />
            <Image
                :source="image1"
                :text="'Agri veľtrh'"
            />
            <Image
                :source="image1"
                :text="'Golgový turnaj'"
            />
            <Image
                :source="image1"
                :text="'Golgový turnaj'"
            />
            <Image
                :source="image1"
                :text="'Golgový turnaj'"
            />
            <Image
                :source="image1"
                :text="'Golgový turnaj'"
            />
            <Image
                :source="image1"
                :text="'Degustácia - Koliba'"
            />
            <Image
                :source="image1"
                :text="'Golgový turnaj'"
            />
            <Image
                :source="image1"
                :text="'Veľtrh'"
            />
            <Image
                :source="image1"
                :text="'Veľtrh'"
            />
            <Image
                :source="image1"
                :text="'Veľtrh'"
            />
            <Image
                :source="image1"
                :text="'Veľtrh'"
            />
            <Image
                :source="image1"
                :text="'Festival'"
            />
            <Image
                :source="image1"
                :text="'Golgový turnaj'"
            />
        </div>

        <Button variant="secondary" text="Zobraziť viac na Instagrame" @click="openInstagram()" />
    </div>
</template>