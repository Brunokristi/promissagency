<script setup>
import { computed } from 'vue'

const props = defineProps({
  text: {
    type: String,
    default: '',
  },
  source: {
    type: String,
    default: '',
  },
})
</script>

<template>
    <div class="group relative overflow-hidden rounded-2xl border border-light/40 hover:scale-101 transition-transform duration-300 w-full aspect-square select-none">
        
        <img
          :src="props.source"
          :alt="props.text"
          class="absolute inset-0 w-full h-full object-cover"
        />

        <!-- Overlay -->
        <div class="absolute inset-0 flex flex-col items-center justify-center bg-black/60 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
            <span class="h2 text-white text-center">
                <span class="hue">Pro</span>miss
            </span>
            <span class="p2 text-white text-center mt-2">
                {{ props.text }}
            </span>
        </div>

    </div>
</template>