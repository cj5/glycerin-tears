<template>
  <section class="hero flex header-fill">
    <div class="video-wrap p-rel flex w-100">
      <!-- <img src="/images/hero-placeholder.jpg" ref="heroPlaceholder" class="h-100" alt=""> -->
      <video muted autoplay loop playsinline poster="/images/hero-placeholder.jpg" @loadeddata="onHeroVideoLoaded" ref="heroVideo" class="h-100">
        <source src="/images/hero-3.mp4" type="video/mp4" />
      </video>
      <!-- <video muted autoplay loop playsinline @loadeddata="onQualityHeroVideoLoaded" ref="qualityHeroVideo" class="h-100 hide">
        <source src="/images/hero.mp4" type="video/mp4" />
      </video> -->
      <div class="video-controls">
        <button @click="onPlayPause" :title="playPauseAlt" :aria-label="playPauseAlt">
          <IconPause v-if="videoIsPlaying" />
          <IconPlay v-else />
        </button>
        <button @click="onMuteUnmute" :title="muteUnmuteAlt" :aria-label="muteUnmuteAlt">
          <IconUnmute v-if="videoIsMuted" />
          <IconMute v-else />
        </button>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'
import IconPlay from '../components/IconPlay.vue'
import IconPause from '../components/IconPause.vue'
import IconMute from '../components/IconMute.vue'
import IconUnmute from '../components/IconUnmute.vue'

const heroPlaceholder = ref(null)
const heroVideo = ref(null)
const qualityHeroVideo = ref(null)
const videoIsPlaying = ref(true)
const videoIsMuted = ref(true)
const playPauseAlt = ref('Pause video')
const muteUnmuteAlt = ref('Unmute video')

async function playVideo() {
  try {
    await heroVideo.value.play()
  } catch (err) {
    console.error(err);
  }
}

function onPlayPause() {
  if (heroVideo.value.paused) {
    playVideo()
    videoIsPlaying.value = true
    playPauseAlt.value = 'Pause video'
  } else {
    heroVideo.value.pause()
    videoIsPlaying.value = false
    playPauseAlt.value = 'Play video'
  }
}

function onMuteUnmute() {
  heroVideo.value.muted = !heroVideo.value.muted
  videoIsMuted.value = !videoIsMuted.value
  if (videoIsMuted.value) {
    muteUnmuteAlt.value = 'Unmute video'
  } else {
    muteUnmuteAlt.value = 'Mute video'
  }
}

// function onHeroVideoLoaded() {
//   heroPlaceholder.value.classList.add('hide')
//   // qualityHeroVideo.value.classList.add('hide')
//   heroVideo.value.classList.remove('hide')
//   heroVideo.value.play()
// }

// function onQualityHeroVideoLoaded() {
//   heroPlaceholder.value.classList.add('hide')
//   heroVideo.value.classList.add('hide')
//   qualityHeroVideo.value.classList.remove('hide')
//   qualityHeroVideo.value.play()
// }
</script>

<style lang="scss" scoped>
@import '/ui/styles/variables';

.video-controls {
  display: flex;
  position: absolute;
  bottom: 30px;
  right: 30px;

  button {
    padding: 0 12px 0 0;

    &:last-of-type {
      padding: 0;
    }
  }

  @media #{$mxw-sm} {
    bottom: 20px;
    right: 20px;
  }
}
</style>
