<script setup>
import { ref, onMounted } from 'vue'

const props = defineProps({
    icon: String,
    number: String,
    value: String,
    text: String,
})

const current = ref(0)

const animate = () => {
    if (!props.number) {
        current.value = ''
        return
    }

    const target = Number(props.number)
    const duration = 3000
    const startTime = performance.now()

    const update = (now) => {
        const progress = Math.min((now - startTime) / duration, 1)

        current.value = Math.floor(progress * target)

        if (progress < 1) {
            requestAnimationFrame(update)
        } else {
            current.value = target
        }
    }

    requestAnimationFrame(update)
}

onMounted(() => {
    animate()
})
</script>

<template>
    <div class="group flex flex-col items-center gap-4 bg-light/20 backdrop-blur border border-light/40 rounded-2xl p-6 hover:scale-101 transition-colors transition-transform duration-300 hover:bg-light/30">
         <i
            v-if="props.icon"
            :class="props.icon"
            class="bg-accent/20 text-md text-accent rounded-xl h-12 w-12 flex items-center justify-center"
        ></i>
        <div class="flex items-center gap-1 text-2xl">
            <span v-if="props.number" class="text-white transition-colors duration-300 group-hover:text-accent">
                {{ current }}
            </span>
            <span class="text-white transition-colors duration-300 group-hover:text-accent">
                {{ props.value }}
            </span>
        </div>
        <p class="p2 text-light text-center">{{ props.text }}</p>
    </div>
</template>