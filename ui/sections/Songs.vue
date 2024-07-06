<template>
  <section class="section-songs pt-2">
    <a id="songs" class="anchor"></a>
    <div class="container">
      <h2 class="heading mt-4 mb-4">Song List</h2>
    </div>
    <div class="section-wrap flex p-rel" style="overflow: hidden;">
      <img src="/images/pages_d.png" class="desktop" alt="">
      <img src="/images/pages_m.png" class="mobile" alt="">
      <div class="songs-list p-abs w-100 h-100 mt-8">
        <div class="container">
          <div class="pages desktop flex w-100">
            <ul class="left-page">
              <li v-for="(song, index) in leftPageSongs" :key="index" v-html="song"></li>
            </ul>
            <ul class="right-page">
              <li v-for="(song, index) in rightPageSongs" :key="index" v-html="song"></li>
            </ul>
          </div>
          <div class="pages mobile">
            <ul class="">
              <li v-for="(song, index) in allSongs" :key="index" v-html="song"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="flex">
      <img src="/images/performing-porch.jpg" alt="">
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const leftPageSongs = ref([])
const rightPageSongs = ref([])

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

onMounted(() => {
  leftPageSongs.value = songs.splice(0, Math.ceil(songs.length / 2))
  rightPageSongs.value = songs
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
