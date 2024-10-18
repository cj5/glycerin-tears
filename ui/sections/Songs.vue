<template>
  <section class="section-songs pt-2">
    <a id="songs" class="anchor"></a>
    <div class="container">
      <h2 class="heading mt-4 mb-4">Song List</h2>
    </div>
    <div class="section-wrap flex p-rel" ref="sectionWrapEl" style="overflow: hidden;">
      <img src="/images/pages_d.png" class="desktop" alt="">
      <img src="/images/pages_m.png" class="mobile" alt="">
      <div class="songs-list p-abs w-100 h-100 mt-8">
        <div class="container">
          <div class="pages-wrap p-rel">
            <div @scroll="onScroll" class="pages desktop flex w-100" ref="pagesDesktopEl">
              <ul class="left-page">
                <li v-for="(song, index) in leftPageSongs" :key="index" v-html="song"></li>
              </ul>
              <ul class="right-page">
                <li v-for="(song, index) in rightPageSongs" :key="index" v-html="song"></li>
              </ul>
            </div>
            <div @scroll="onScroll" class="pages mobile" ref="pagesMobileEl">
              <ul class="">
                <li v-for="(song, index) in allSongs" :key="index" v-html="song"></li>
              </ul>
            </div>

            <div class="scroll-up hide" ref="scrollUpEl" aria-label="Scroll Up">
              <span class="arrow">⇑</span>
              <span class="text">Scroll</span>
            </div>
            <div class="scroll-down" ref="scrollDownEl" aria-label="Scroll Down">
              <span class="text">Scroll</span>
              <span class="arrow">⇓</span>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .section-wrap -->
    <div class="flex">
      <img src="/images/performing-porch.jpg" alt="">
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, nextTick } from 'vue'

const leftPageSongs = ref([])
const rightPageSongs = ref([])
const sectionWrapEl = ref(null)
const pagesDesktopEl = ref(null)
const pagesMobileEl = ref(null)
const scrollDownEl = ref(null)
const scrollUpEl = ref(null)
const elHeight = ref(null)
const elScrollTop = ref(null)
const elScrollHeight = ref(null)
const elDifference = ref(null)

const songs = [
  'Crazy On You — Heart',
  'Piece of My Heart — Janis Joplin',
  'Ramble On — Led Zeppelin',
  'Moondance — Van Morrison',
  'Beast of Burden — The Rolling Stones',
  'Born on the Bayou — Creedence Clearwater Revival',
  'Landslide — Fleetwood Mac',
  'No Sugar Tonight — The Guess Who',
  'Dancing in the Moonlight — King Harvest',
  'Brandy (You’re a Fine Girl) — Looking Glass',
  'Stuck in the Middle With You — Stealers Wheel',
  'What’s Going On — Marvin Gaye',
  'Undun — The Guess Who',
  'Sara — Fleetwood Mac',
  'Rock Steady — Aretha Franklin',
  'Green Onions — Booker T. & <span class="no-wrap">the M.G.’s</span>',
  'My Love Is Alive — Gary Wright',
  'Green-Eyed Lady — Sugarloaf',
  'Rebel Rebel — David Bowie',
  'The Chain — Fleetwood Mac',
  'Feelin’ Stronger Every Day — Chicago',
  'Miss You — The Rolling Stones',
  'Long Train Runnin’ — The Doobie Brothers',
  'Wild Night — Van Morrison',
  'Evil Woman — Electric Light Orchestra',
  'The Core — Eric Clapton',
  'Lola — The Kinks',
  'You’re No Good — Linda Ronstadt',
  'New York — Cat Power',
  'Whole Wide World — Wreckless Eric',
  'Walk on the Wild Side — Lou Reed',
  'Send Me a Postcard — Shocking Blue',
  'Spooky — Classics IV',
  'Season of the Witch — Donovan',
  'Rumble — Link Wray',
  'Rock On — David Essex',
]

const allSongs = structuredClone(songs)

function onScroll() {
  if (window.innerWidth < 1050) {
    elHeight.value = pagesMobileEl.value.offsetHeight
    elScrollTop.value = pagesMobileEl.value.scrollTop
    elScrollHeight.value = pagesMobileEl.value.scrollHeight
    elDifference.value = (pagesMobileEl.value.offsetHeight + 80) - sectionWrapEl.value.offsetHeight
  } else {
    elHeight.value = pagesDesktopEl.value.offsetHeight
    elScrollTop.value = pagesDesktopEl.value.scrollTop
    elScrollHeight.value = pagesDesktopEl.value.scrollHeight
    elDifference.value = (pagesDesktopEl.value.offsetHeight + 80) - sectionWrapEl.value.offsetHeight
  }

  if (elHeight.value === elScrollHeight.value) {
    scrollUpEl.value.classList.add('hide')
    scrollDownEl.value.classList.add('hide')
  }

  scrollDownEl.value.style.bottom = 30 + elDifference.value + 'px';

  // console.log(elHeight.value, elScrollTop.value, elScrollHeight.value);

  if (elScrollTop.value + elHeight.value === elScrollHeight.value) {
    scrollUpEl.value.classList.remove('hide')
    scrollDownEl.value.classList.add('hide')
  } else if (elScrollTop.value === 0) {
    scrollDownEl.value.classList.remove('hide')
    scrollUpEl.value.classList.add('hide')
  } else {
    scrollDownEl.value.classList.remove('hide')
    scrollUpEl.value.classList.remove('hide')
  }
}

onMounted(() => {
  leftPageSongs.value = songs.splice(0, Math.ceil(songs.length / 2))
  rightPageSongs.value = songs

  nextTick(() => {
    onScroll()
  })

  window.addEventListener('resize', () => {
    onScroll()
  })
})
</script>

<style lang="scss" scoped>
@import '/ui/styles/variables';

.section-songs {
  background-color: $teal;
}

.section-wrap {
  padding: 0 20px;

  @media (max-width: 1310px) {
    padding: 0;
  }
}

.songs-list {
  top: 0;
  left: 0;

  ul {
    padding: 0 45px;

    @media (max-width: 1400px) {
      padding: 0 30px;
    }

    @media (max-width: 650px) {
      padding: 0 30px 100px;
    }

    @media (max-width: 550px) {
      padding: 0 30px 140px;
    }

    @media (max-width: 450px) {
      padding: 0 30px 180px 15px;
    }

    &.left-page {
      flex: 0 0 45%;
      width: 45%;
      padding-left: 0;
    }

    &.right-page {
      flex: 0 0 45%;
      width: 45%;
      padding-right: 0;
    }
  }

  li {
    font-size: 24px;
    font-weight: 500;
    line-height: 1.1;
    padding-bottom: 10px;

    &:last-of-type {
      padding-bottom: 50px;
    }

    @media #{$mxw-sm} {
      font-size: 20px;
    }

    @media #{$mxw-xs} {
      font-size: 18px;
    }
  }
}

.scroll-down,
.scroll-up {
  display: flex;
  flex-direction: column;
  align-items: center;
  position: absolute;
  right: 0;
  background-color: rgba(#fff, 0.5);
  padding: 5px;
  border-radius: 5px;

  @media #{$mxw-sm} {
    right: -20px;
  }

  >* {
    line-height: 1.1;
  }

  .arrow {
    font-size: 20px;

    @media #{$mxw-xs} {
      font-size: 16px;
    }
  }

  .text {
    font-size: 14px;

    @media #{$mxw-xs} {
      font-size: 12px;
    }
  }
}

.scroll-down {
  bottom: 30px;
}

.scroll-up {
  top: 0;
}

.pages {
  position: relative;
  overflow-y: scroll;
  height: 414px;

  &.desktop {
    @media (max-width: 1050px) {
      display: none !important;
    }
  }

  &.mobile {
    display: none;

    @media (max-width: 1050px) {
      display: block;
    }
  }
}

img.desktop {
  @media (max-width: 1050px) {
    display: none;
  }
}

img.mobile {
  display: none;

  @media (max-width: 1050px) {
    display: block;
    max-height: 494px;
  }
}
</style>
