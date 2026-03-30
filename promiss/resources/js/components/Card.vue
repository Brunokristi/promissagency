
<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue'

const props = defineProps({
    icon: String,
    number: String,
    value: String,
    text: String,
    iconPosition: {
        type: String,
        default: 'top',
    },
})


const current = ref(0)
const emit = defineEmits(['click'])
const containerRef = ref(null)
let observer = null


const animate = () => {
    if (!props.number) {
        current.value = ''
        return
    }

    const target = Number(props.number)
    const duration = 1000
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

const containerClass = computed(() =>
    props.iconPosition === 'left'
        ? 'flex items-center gap-4'
        : 'flex flex-col items-center gap-4'
)

onMounted(() => {
    observer = new window.IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animate()
            }
        })
    }, { threshold: 0.3 })
    if (containerRef.value) {
        observer.observe(containerRef.value)
    }
})

onUnmounted(() => {
    if (observer && containerRef.value) {
        observer.unobserve(containerRef.value)
    }
    observer = null
})
</script>

<template>
    <div
        ref="containerRef"
        @click="emit('click')"
        :class="[
            'group bg-light/20 backdrop-blur border border-light/40 rounded-2xl p-6 hover:scale-101 transition-colors transition-transform duration-300 hover:bg-light/30 cursor-pointer',
            containerClass
        ]"
    >
        <i
            v-if="props.icon"
            :class="props.icon"
            class="bg-accent/20 text-md text-accent rounded-xl h-12 w-12 flex items-center justify-center flex-shrink-0"
        ></i>

        <div
            :class="props.iconPosition === 'left' ? 'flex flex-col items-start' : 'flex flex-col items-center'"
        >
            <div class="flex items-center gap-1 text-2xl">
                <span
                    v-if="props.number"
                    class="text-white transition-colors duration-300 group-hover:text-accent"
                >
                    {{ current }}
                </span>
                <span class="text-white transition-colors duration-300 group-hover:text-accent">
                    {{ props.value }}
                </span>
            </div>

            <p
                class="p2 text-light"
                :class="props.iconPosition === 'left' ? 'text-left' : 'text-center'"
            >
                {{ props.text }}
            </p>
        </div>
    </div>
</template>