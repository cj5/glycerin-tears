<template>
  <section class="section-contact pt-3 pb-7">
    <a id="contact" class="anchor"></a>
    <div class="container">
      <h2 class="heading mt-4 mb-5">Contact</h2>
      <div class="form-wrap" style="max-width: 600px; margin: 0 auto;">
        <form action="https://formsubmit.co/glycerintearsband@gmail.com" method="POST">
          <!-- <form action="https://formsubmit.co/stac1221@gmail.com" method="POST"> -->
          <input type="hidden" name="_cc" value="stac1221@gmail.com">
          <input type="hidden" name="_next" value="https://glycerintears.com">
          <input type="hidden" name="_template" value="box">
          <!-- <input type="hidden" name="_autoresponse" value="Received a message from someone 🤘"> -->
          <div class="input-wrap">
            <label for="name">Name <span class="required">*(required)</span></label>
            <input id="name" type="text" name="name" required>
          </div>
          <div class="col-2">
            <div class="input-wrap mr-1">
              <label for="email">Email <span class="required">*(required)</span></label>
              <input id="email" type="email" name="email" required>
            </div>
            <div class="input-wrap ml-1">
              <label for="phone">Phone</label>
              <input id="phone" type="phone" name="phone">
            </div>
          </div>
          <div class="input-wrap mb-0">
            <label for="message">Message <span class="required">*(required)</span></label>
            <textarea id="message" name="message" rows="6" required></textarea>
          </div>
          <input type="submit" value="Send" class="btn mt-4">

          <!-- <input type="hidden" name="_next" value="http://localhost:3000/"> -->
        </form>
      </div>
    </div>
  </section>
</template>

<script setup>

</script>

<style lang="scss" scoped>
@import '/ui/styles/variables';

.section-contact {
  background-color: $cream;
}

.col-2 {
  display: flex;

  >* {
    flex: 1 1 50%;
  }

  @media (max-width: 500px) {
    flex-direction: column;

    .input-wrap {
      margin-left: 0 !important;
      margin-right: 0 !important;
    }
  }
}

.required {
  font-size: 14px;
  font-style: italic;
}
</style>
