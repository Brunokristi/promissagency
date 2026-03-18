<script setup>
import Navbar from './components/Navbar.vue';
import Background from './components/Background.vue';

import Hero from './pages/Hero.vue';
import About from './pages/About.vue';
import Services from './pages/Services.vue';
import Portfolio from './pages/Portfolio.vue';
import Contact from './pages/Contact.vue';


</script>

<template>
    <main class="p-0">
        <Background />
        <Navbar />
        <div class="p-6">
            <Hero />
            <About />
            <Services />
            <Portfolio />
            <Contact />
        </div>
    </main>
</template>

