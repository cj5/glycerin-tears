<template>
  <section class="section-bio pt-4 pb-10">
    <a id="bio" class="anchor"></a>
    <div class="container">
      <h2 class="heading mt-4 mb-5">Bio</h2>
      <div class="fz-22" style="max-width: 815px; margin: 0 auto;">

        <p v-if="data" v-for="(p, index) of data[0].bio_paragraph" :key="index" v-html="p"></p>

        <!-- <p>It’s a glorious, sunny summer afternoon, Saturday, 1975. You’re at the beach with a bright yellow transistor radio next to your ear, and it’s pumping out fun, danceable hits.</p>
        <p>That’s the sound of Glycerin Tears.</p>
        <p>Fronted by dynamic female vocalist Melissa Martin, the Glycerin Tears cover the best pop-rock songs recorded between 1970 and 1979 and totally own them, taking you along on a timeless journey through the golden age of music. Glycerin Tears guarantees a night of dancing, singing along, and pure musical bliss.</p>
        <p>The Glycerin Tears are: Melissa Martin, vocals; Jason Dahl, bass; Chris Stack, drums; John Jarvis, keyboards; Keith Shifrin, guitar; David Whitman, guitar and vocals; and Dan Andreason, saxophone.</p> -->

      </div>
    </div>
  </section>
</template>

<script setup>
const { data, pending, error, refresh, clear } = await useFetch('https://admin.glycerintears.com/wp-json/wp/v2/bio')
</script>

<style lang="scss" scoped>
@import '/ui/styles/variables';

.section-bio {
  background-color: $cream;
}

p {
  padding-bottom: 18px;

  &:last-of-type {
    padding-bottom: 0;
  }
}
</style>
