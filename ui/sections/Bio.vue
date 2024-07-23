<template>
  <section class="section-bio pt-4 pb-10">
    <a id="bio" class="anchor"></a>
    <div class="container">
      <h2 class="heading mt-4 mb-5">Bio</h2>
      <div class="fz-22" style="max-width: 815px; margin: 0 auto;">

        <p v-if="data" v-for="(p, index) of data[0].paragraph" :key="index" v-html="p"></p>

      </div>
    </div>
  </section>
</template>

<script setup>
const { data, pending, error, refresh, clear } = await useFetch('https://glycerintears-admin.chrisstack.co/wp-json/wp/v2/bio')
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
