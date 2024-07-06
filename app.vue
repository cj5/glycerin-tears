<template>
  <main>
    <Header />
    <Hero />
    <Bio />
    <Shows />
    <Video />
    <Songs />
    <Contact />
    <Footer />
  </main>
</template>

<script setup>
import Header from './ui/sections/Header.vue'
import Hero from './ui/sections/Hero.vue'
import Bio from './ui/sections/Bio.vue'
import Shows from './ui/sections/Shows.vue'
import Video from './ui/sections/Video.vue'
import Songs from './ui/sections/Songs.vue'
import Contact from './ui/sections/Contact.vue'
import Footer from './ui/sections/Footer.vue'

useHead({
  title: 'Glycerin Tears | 70s Pop-Rock Cover Band',
  meta: [
    { name: 'description', content: 'The Glycerin Tears cover the best pop-rock songs recorded between 1970 – 1979, taking you along on a timeless journey through the golden age of music.' },
  ],
  link: [
    { rel: 'preload', href: '/images/hero-placeholder.jpg', as: 'image' },
    { rel: 'prefetch', href: '/images/hero-placeholder.jpg' },
  ],
})

useSeoMeta({
  title: 'Glycerin Tears | 70s Pop-Rock Cover Band',
  ogTitle: 'Glycerin Tears | 70s Pop-Rock Cover Band',
  description: 'The Glycerin Tears cover the best pop-rock songs recorded between 1970 – 1979, taking you along on a timeless journey through the golden age of music.',
  ogDescription: 'The Glycerin Tears cover the best pop-rock songs recorded between 1970 – 1979, taking you along on a timeless journey through the golden age of music.',
  // ogImage: 'https://example.com/image.png',
  // twitterCard: 'summary_large_image',
})
</script>

<style lang="scss">
@import './ui/styles/app.scss';
</style>
