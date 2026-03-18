<script setup>
import { computed } from 'vue'

const props = defineProps({
  variant: {
    type: String,
    default: 'text',
  },
  text: {
    type: String,
    default: '',
  },
})

const emit = defineEmits(['click'])

const buttonClasses = computed(() => {
    switch (props.variant) {
        case 'primary':
            return 'bg-accent text-white w-max text-sm rounded-full px-4 py-2 hover:scale-102 transition-transform duration-300'

        case 'secondary':
            return 'bg-light/20 border border-light/40 text-white w-max text-sm rounded-full px-4 py-2 hover:scale-102 transition-colors transition-transform duration-300 hover:bg-light/30'

        case 'text':
        default:
            return 'relative text-light text-start hover:text-white transition-colors duration-300 before:absolute before:inset-0 before:border-b-2 before:border-accent before:scale-x-0 before:origin-left before:transition-transform before:duration-300 hover:before:scale-x-100'    
        }
})
</script>

<template>
    <button
        type="button"
        class="group cursor-pointer"
        :class="buttonClasses"
        @click="emit('click')"
    >
        <span>
            {{ props.text }}
        </span>
    </button>
</template>