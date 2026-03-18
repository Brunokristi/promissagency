<script setup>
import { computed } from 'vue'

const props = defineProps({
  icon: {
    type: String,
    default: '',
  },
  text: {
    type: String,
    default: '',
  },
  id: {
    type: String,
    default: '',
  },
})
</script>

<template>
    <div
        class="h3 flex items-center gap-2 text-sm uppercase w-max text-accent bg-light/20 border border-accent/40 rounded-full px-3 py-1 hover:scale-102 duration-300"
        :id="props.id"
    >
        <i
            v-if="props.icon"
            :class="props.icon"
        ></i>
        <span>{{ props.text }}</span>
    </div>
</template>