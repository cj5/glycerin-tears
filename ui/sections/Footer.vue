<template>
  <footer class="flex jcfe aic">
    <div class="container w-100">
      <div class="footer-wrap">
        <div class="logo-wrap flex jcc">
          <a href="#" class="flex jcc" aria-label="Go to the top of the page">
            <img src="/images/logo_horizontal.png" alt="Glycerin Tears logo">
          </a>
        </div>
        <div class="social-wrap flex jcfe w-100">
          <Social />
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
import Social from '../components/Social.vue'
</script>

<style lang="scss" scoped>
@import '/ui/styles/variables';
@import '/ui/styles/mixins';

footer {
  position: relative;
  height: 177px;
  background-color: $teal;

  .social a,
  .social .logo {
    width: 50px;
    height: 50px;
  }
}

.logo-wrap {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  @include transition;

  &:hover {
    transform: translate(-50%, -50%) scale(1.01);
  }

  img {
    width: 460px;

  }

}

@media #{$mxw-lg} {
  .logo-wrap img {
    width: 400px;
  }
}

@media #{$mxw-md} {
  footer {
    height: auto;
  }

  .footer-wrap {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .logo-wrap {
    position: relative;
    top: unset;
    left: unset;
    transform: none;
    margin-top: 40px;
    margin-bottom: 20px;

    img {
      width: 350px;
    }
  }


  .social-wrap {
    width: auto;
    margin-bottom: 40px;
  }
}

@media #{$mxw-sm} {
  .logo-wrap img {
    width: 80%;
  }
}
</style>
