<template>
  <section class="section-shows pt-3 pb-12">
    <a id="shows" class="anchor"></a>
    <div class="container">
      <h2 class="heading mt-4 mb-8">Upcoming Shows</h2>
      <div class="flex jcc">
        <div class="shows-wrap flex fdc">
          <div v-for="(event, index) in shows" class="event flex w-100" :key="index">
            <div class="wrap w-100">
              <img :src="`/images/shows/${event.img}`" alt="">
              <div class="copy-wrap flex jcsb w-100">
                <div class="wrap-1 flex fdc jcc aifs mx-3 py-1">
                  <p class="date bold fz-26" v-html="event.date"></p>
                  <p class="title italic fz-22">{{ event.title }}</p>
                  <p class="time gray">{{ event.time }}</p>
                </div>
                <div class="wrap-2 p-rel">
                  <div class="map flex h-100" v-html="event.map"></div>
                  <div class="loading flex jcc aic p-abs">
                    <p>Loading map...</p>
                  </div>
                </div>
              </div>
              <div class="wrap-2-mobile p-rel">
                <div class="map flex h-100" v-html="event.map"></div>
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
const mapWidth = '100%'
const mapHeight = '100%'
const shows = [
  // {
  //   title: 'Tuttle‘s Eat Bowl Play',
  //   date: 'Saturday, June 1',
  //   time: '6:30 pm – 10:00 pm',
  //   img: 'tuttles.jpg',
  //   map: `<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5650.116290088963!2d-93.42906032307131!3d44.92215307107026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87f61f8f0954fa23%3A0x6ecd7cfabde58d8b!2sTuttle&#39;s%20Eat%20Bowl%20Play!5e0!3m2!1sen!2sus!4v1711140490946!5m2!1sen!2sus" width="${mapWidth}" height="${mapHeight}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`,
  // },
  {
    title: 'The Trailhead',
    date: 'Friday, July 26',
    time: '5:00 pm – 7:30 pm',
    img: 'trailhead.jpg',
    map: `<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11288.636080568807!2d-93.33568653216349!3d44.981080637119184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b333302674e8fb%3A0x53cc37e65f850cd9!2sThe%20Trailhead!5e0!3m2!1sen!2sus!4v1717709085081!5m2!1sen!2sus" width="${mapWidth}" height="${mapHeight}" title="Map to The Trailhead" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`,
  },
  {
    title: 'Lake Harriet Bandshell',
    date: 'Friday, August 23',
    time: '7:30 pm – 9:00 pm',
    img: 'lake-harriet.jpg',
    map: `<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2824.76332902675!2d-93.31026162307109!3d44.928148271070185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87f6270e11890f31%3A0x7564417b15e3d8c6!2sLake%20Harriet%20Bandshell%20Park!5e0!3m2!1sen!2sus!4v1717977552033!5m2!1sen!2sus" width="${mapWidth}" height="${mapHeight}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`,
  },
  {
    title: 'SeptemberFest at Annunciation Church Field',
    date: 'Saturday, <span class="no-wrap">September 21</span>',
    time: '4:30 pm – 5:30 pm',
    img: 'annunciation.jpg',
    map: `<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4420.174948725738!2d-93.28575239999999!3d44.9046391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87f62645a68498b5%3A0xe582a688affd8a75!2s509%20W%2054th%20St%2C%20Minneapolis%2C%20MN%2055419!5e0!3m2!1sen!2sus!4v1719262806797!5m2!1sen!2sus" width="${mapWidth}" height="${mapHeight}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`,
  },
]
</script>

<style lang="scss" scoped>
@import '/ui/styles/variables';

.section-shows {
  background-color: $cream;
  border-top: 4px solid $teal;
}

.event {
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
