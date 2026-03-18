<script setup>
import Tag from '../components/Tag.vue';
import Button from '../components/Button.vue';
import Card from '../components/Card.vue';
</script>

<template>
    <div class="flex w-full h-auto flex-col gap-10 py-16 lg:flex-row lg:items-center">
        <div class="flex w-full h-full flex-col justify-center gap-6 lg:w-1/2">
            <Tag text="o nás" id="about" />

            <h1 class="h1 mt-4 text-white">
                Prvotriedny <span class="hue">servis</span> pre vás
            </h1>

            <p class="p1 text-light">
                Promiss je prémiová agentúra špecializujúca sa na hostesingové služby, promo akcie a eventy na najvyššej úrovni.
            </p>

            <p class="p1 text-light">
                Náš tím tvoria profesionálne vyškolení pracovníci pripravení reprezentovať vašu značku alebo zbierať kvalitné dáta pre vaše analytické potreby.
            </p>

            <div>
                <Button variant="secondary" text="Dozvedieť sa viac" href="#contact" />
            </div>
        </div>

        <div class="grid w-full grid-cols-2 gap-4 lg:w-1/2">
            <Card
                icon="bi bi-calendar"
                number="500"
                value="+"
                text="Eventov"
            />
            <Card
                icon="bi bi-people"
                number="150"
                value="+"
                text="Hostesiek"
            />
            <Card
                icon="bi bi-graph-up-arrow"
                number="3"
                value="+"
                text="Rokov skúseností"
            />
            <Card
                icon="bi bi-bookmark-star"
                number="100"
                value="%"
                text="Spokojných klientov"
            />
        </div>
    </div>
</template>