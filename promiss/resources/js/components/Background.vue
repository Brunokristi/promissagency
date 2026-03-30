<script setup>
import { onMounted, onBeforeUnmount } from 'vue'

let canvas, ctx
let particles = []
let animationId
let mouse = { x: null, y: null }

const ACCENT = '#ab3f5c'

const PARTICLE_COUNT = 50

class Particle {
    constructor(x, y) {
        this.x = x
        this.y = y
        this.size = Math.random() * 2
        this.speedX = (Math.random() - 0.5) * 0.2
        this.speedY = (Math.random() - 0.5) * 0.2
    }

    update() {
        this.x += this.speedX
        this.y += this.speedY

        // bounce on edges
        if (this.x < 0 || this.x > canvas.width) this.speedX *= -1
        if (this.y < 0 || this.y > canvas.height) this.speedY *= -1

        // mouse interaction
        const dx = mouse.x - this.x
        const dy = mouse.y - this.y
        const distance = Math.sqrt(dx * dx + dy * dy)

        if (distance < 100) {
            this.x -= dx * 0.02
            this.y -= dy * 0.02
        }
    }

    draw() {
        ctx.beginPath()
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2)
        ctx.fillStyle = ACCENT
        ctx.fill()
    }
}

const init = () => {
    particles = []
    for (let i = 0; i < PARTICLE_COUNT; i++) {
        particles.push(
            new Particle(
                Math.random() * canvas.width,
                Math.random() * canvas.height
            )
        )
    }
}

const animate = () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height)

    particles.forEach(p => {
        p.update()
        p.draw()
    })

    animationId = requestAnimationFrame(animate)
}

const resize = () => {
    canvas.width = window.innerWidth
    canvas.height = window.innerHeight
    init()
}

const handleMouse = e => {
    mouse.x = e.x
    mouse.y = e.y
}

onMounted(() => {
    canvas = document.getElementById('particles')
    ctx = canvas.getContext('2d')

    resize()
    animate()

    window.addEventListener('resize', resize)
    window.addEventListener('mousemove', handleMouse)
})

onBeforeUnmount(() => {
    cancelAnimationFrame(animationId)
    window.removeEventListener('resize', resize)
    window.removeEventListener('mousemove', handleMouse)
})
</script>

<template>
    <canvas
        id="particles"
        class="fixed top-0 left-0 w-full h-full -z-10 bg-black" 
    ></canvas>
</template>