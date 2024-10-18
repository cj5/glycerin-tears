<template>
  <section class="section-shows pt-3 pb-12">
    <a id="shows" class="anchor"></a>
    <div class="container">
      <h2 class="heading mt-4 mb-8">Upcoming Shows</h2>
      <div class="flex jcc">
        <div class="shows-wrap flex fdc">

          <div v-for="(show, index) in shows" class="show flex w-100" :key="index">
            <div class="wrap w-100">
              <img :src="show.show_thumbnail.guid" alt="">
              <div class="copy-wrap flex jcsb w-100">
                <div class="wrap-1 flex fdc jcc aifs mx-3 py-1">
                  <p class="date bold fz-26" v-html="dayjs(show.show_date).format('dddd, MMMM D')"></p>
                  <p class="title italic fz-22">{{ show.title.rendered }}</p>
                  <p class="time gray">
                    {{ formatTime(show.start_time) }} – {{ formatTime(show.end_time) }}
                  </p>
                </div>
                <div class="wrap-2 p-rel">
                  <div class="map flex h-100" v-html="resizeMap(show.google_map_embed)"></div>
                  <div class="loading flex jcc aic p-abs">
                    <p>Loading map...</p>
                  </div>
                </div>
              </div>
              <div class="wrap-2-mobile p-rel">
                <div class="map flex h-100" v-html="resizeMap(show.google_map_embed)"></div>
                <div class="loading flex jcc aic p-abs">
                  <p>Loading map...</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'
import dayjs from 'dayjs'

function formatTime(time) {
  const timeSplits = time.split(':')
  let times = []
  let hours
  let minutes = timeSplits[1]
  let meridiem = 'am'

  timeSplits.forEach((item) => times.push(Number(item)))

  const h = times[0]
  const m = times[1]

  if (h >= 12) {
    meridiem = 'pm'
    if (h === 12) {
      hours = h
    } else {
      hours = h - 12
    }
  } else {
    hours = h
    if (h === 0) hours = '12'
  }
  if (m < 10) minutes = `0${m}`

  return `${hours}:${minutes} ${meridiem}`
} // formatTime()

function resizeMap(embed) {
  const splitEmbed = embed.split(' ')
  let finalEmbed = ''

  splitEmbed.forEach((item, index) => {
    if (item.includes('width')) {
      splitEmbed[index] = 'width="100%"'
    }
    if (item.includes('height')) {
      splitEmbed[index] = 'height="100%"'
    }
  })

  splitEmbed.forEach(item => finalEmbed += ` ${item}`)

  return finalEmbed
}

const { data, pending, error, refresh, clear } = await useFetch('https://glycerintears-admin.chrisstack.co/wp-json/wp/v2/show')

const shows = ref(data.value)

shows.value.sort((a, b) => new Date(a.show_date) - new Date(b.show_date))

const removePastShows = shows.value.filter((date) => {
  let isDateUpcoming = dayjs(date.show_date).diff(dayjs(), 'day')
  return isDateUpcoming >= 0 ? isDateUpcoming = true : isDateUpcoming = false
})

shows.value = removePastShows
</script>

<style lang="scss" scoped>
@import '/ui/styles/variables';

.section-shows {
  background-color: $cream;
  border-top: 4px solid $teal;
}

.show {
  border: 4px solid $teal;
  background-color: $cream-dk;
  margin-bottom: 30px;
  border-radius: 10px;
  overflow: hidden;

  @media #{$mxw-md} {
    max-width: 300px;
  }

  &:last-of-type {
    margin-bottom: 0;
  }

  .wrap {
    display: flex;

    @media #{$mxw-md} {
      display: block;
    }
  }

  img {
    width: 221px;
    object-fit: cover;
    border-right: 4px solid $teal;

    @media #{$mxw-md} {
      width: 100%;
      max-width: 300px;
      border-right: none;
      border-bottom: 4px solid $teal;
    }
  }

  .copy-wrap {
    font-size: 20px;

    @media #{$mxw-md} {
      padding: 0 0 20px 0;
      border-bottom: 4px solid $teal;
    }

    .date {
      line-height: 1.2;
      margin-bottom: 5px;
    }

    .title {
      margin: 5px 0;
      line-height: 1.1;
    }
  }

  .wrap-2 {
    border-left: 4px solid $teal;

    @media #{$mxw-md} {
      display: none;
    }
  }

  .wrap-2-mobile {
    display: none;

    @media #{$mxw-md} {
      display: block;
    }
  }

  .map {
    position: relative;
    z-index: 9;
    width: 300px;

    iframe {
      width: 100%;
      height: 100%;
    }

    @media #{$mxw-lg} {
      width: 200px;
    }

    @media #{$mxw-md} {
      width: 100%;
    }
  }

  .loading {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
}
</style>
