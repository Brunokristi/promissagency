import { ref } from 'vue'

export const prefillService = ref('')

export function setPrefillService(service) {
    prefillService.value = service
}
