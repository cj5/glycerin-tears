<template>
  <ul class="social">
    <li>
      <a href="https://www.instagram.com/glycerintears/" target="_blank">
        <img src="/images/logo_instagram.png" class="logo logo-ig" alt="Instagram logo">
      </a>
    </li>
    <li>
      <a href="https://www.facebook.com/glycerintears" target="_blank">
        <img src="/images/logo_facebook.png" class="logo logo-fb" alt="Facebook logo">
      </a>
    </li>
  </ul>
</template>

<style lang="scss" scoped>
@import '/ui/styles/variables';
@import '/ui/styles/mixins';

.social {
  display: flex;

  li {
    margin-right: 25px;

    &:last-of-type {
      margin-right: 0;
      margin-left: 0;
    }
  }

  a,
  .logo {
    width: $social-icon-ht-d;
    height: $social-icon-ht-d;
  }

  a {
    display: inline-block;
    opacity: 1;
    @include transition;

    &:hover {
      opacity: 0.6;
    }
  }
}

.icon {
  display: inline-block;
  width: $social-icon-ht-d;
  height: $social-icon-ht-d;
  stroke-width: 0;
  stroke: $teal-dk;
  fill: $teal-dk;
}

.icon-logo_fb {
  color: red;
}
</style>
