<script setup>
import Tag from '../components/Tag.vue';
import Button from '../components/Button.vue';
import Image from '../components/Image.vue';

const openInstagram = () => {
    window.open('https://www.instagram.com/promiss_hostess_agency/', '_blank');
}

const image1 = '/assets/1.jpeg';
const image2 = '/assets/2.jpeg';
const image3 = '/assets/3.jpeg';
const image4 = '/assets/4.jpeg';
const image5 = '/assets/5.jpeg';
const image6 = '/assets/6.jpeg';
const image7 = '/assets/7.jpeg';
const image8 = '/assets/8.jpeg';
const image9 = '/assets/9.jpeg';
const image10 = '/assets/10.jpeg';
const image11 = '/assets/11.jpeg';
const image12 = '/assets/12.jpeg';
const image13 = '/assets/13.jpeg';
const image14 = '/assets/14.jpeg';
const image15 = '/assets/15.jpeg';
const image16 = '/assets/16.jpeg';


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
                :source="image15"
                :text="'Valentínska promo akcia'"
            />
            <Image
                :source="image11"
                :text="'Ploom-promo event'"
            />
            <Image
                :source="image6"
                :text="'Agri veľtrh'"
            />
            <Image
                :source="image12"
                :text="'Golgový turnaj'"
            />
            <Image
                :source="image16"
                :text="'Golgový turnaj'"
            />
            <Image
                :source="image14"
                :text="'Golgový turnaj'"
            />
            <Image
                :source="image7"
                :text="'Veľtrh'"
            />
            <Image
                :source="image8"
                :text="'Degustácia - Koliba'"
            />
            <Image
                :source="image13"
                :text="'Golgový turnaj'"
            />
            <Image
                :source="image9"
                :text="'Degustácia - Koliba'"
            />
            <Image
                :source="image4"
                :text="'Veľtrh'"
            />
            <Image
                :source="image10"
                :text="'Golgový turnaj'"
            />
            <Image
                :source="image2"
                :text="'Festival'"
            />
            <Image
                :source="image3"
                :text="'Golgový turnaj'"
            />
            <Image
                :source="image1"
                :text="'Veľtrh'"
            />
        </div>

        <Button variant="secondary" text="Zobraziť viac na Instagrame" @click="openInstagram()" />
    </div>
</template>