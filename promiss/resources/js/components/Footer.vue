<script setup>

</script>

<template>
    <footer class="w-full bg-black/20 backdrop-blur px-4 md:px-6 py-6 mt-16">
        <div class="flex flex-col items-center gap-4">
            <h2 class="h2 text-white">
                <span class="hue">Pro</span>miss
            </h2>
        

            <div class="flex items-center gap-6">
                <a href="https://www.instagram.com/promiss_hostess_agency/" target="_blank" class="text-light hover:text-accent transition-colors duration-300">
                    <i class="bi bi-instagram text-2xl"></i>
                </a>

                <a href="https://www.facebook.com/promisshostessagency" target="_blank" class="text-light hover:text-accent transition-colors duration-300">
                    <i class="bi bi-facebook text-2xl"></i>
                </a>

                <a href="https://www.linkedin.com/company/promiss-hostess-agency" target="_blank" class="text-light hover:text-accent transition-colors duration-300">
                    <i class="bi bi-linkedin text-2xl"></i>
                </a>
            </div>


            <p class="p2 text-light text-center">
                &copy; {{ new Date().getFullYear() }} Promiss. Všetky práva vyhradené.
            </p>
        </div>
    </footer>
</template>