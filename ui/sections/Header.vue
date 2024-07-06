<template>
  <header :class="headerClass">
    <div class="container">
      <div class="header-wrap">
        <div class="logo-wrap flex">
          <a href="#" class="flex" aria-label="Go to the top of the page">
            <img src="/images/logo_vertical.png" alt="Glycerin Tears logo">
          </a>
        </div>
        <nav ref="navEl">
          <ul class="nav-1">
            <li>
              <a href="#bio" @click="closeMobileNav" @keydown.Enter="closeMobileNav">Bio</a>
            </li>
            <li>
              <a href="#shows" @click="closeMobileNav" @keydown.Enter="closeMobileNav">Shows</a>
            </li>
            <li>
              <a href="#video" @click="closeMobileNav" @keydown.Enter="closeMobileNav">Video</a>
            </li>
          </ul>
          <ul class="nav-2">
            <li>
              <a href="#songs" @click="closeMobileNav" @keydown.Enter="closeMobileNav">Songs</a>
            </li>
            <li>
              <a href="#contact" @click="closeMobileNav" @keydown.Enter="closeMobileNav">Contact</a>
            </li>
            <li class="social desktop">
              <Social />
            </li>
          </ul>
          <button @click="closeMobileNav" @keydown.Enter="closeMobileNav" class="close-mobile-nav">&times;</button>
        </nav>
        <div class="mobile-nav h-100">
          <ul class="flex jcsb aic w-100 h-100">
            <li>
              <button @click="openMobileNav" @keydown.Enter="openMobileNav" class="open-mobile-nav">☰</button>
            </li>
            <li class="social mobile">
              <Social />
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import Social from '../components/Social.vue'

const headerClass = ref('')
const navEl = ref(null)

function openMobileNav() {
  navEl.value.classList.add('open')
}

function closeMobileNav() {
  navEl.value.classList.remove('open')
}

onMounted(() => {
  function setHeaderClass() {
    if (window.scrollY > 150) {
      headerClass.value = 'header-short'
    } else {
      headerClass.value = ''
    }
  }

  setHeaderClass()

  window.addEventListener('scroll', () => {
    setHeaderClass()
  })
})
</script>

<style lang="scss">
@import '/ui/styles/variables';
@import '/ui/styles/mixins';

header {
  position: fixed;
  width: 100%;
  max-width: $site-mxw;
  top: 0;
  background-color: $teal;
  // box-shadow: 0 0 10px #333;
  z-index: 99;
  @include transition;

  .logo-wrap {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    @include transition;

    &:hover {
      transform: translate(-50%, -50%) scale(1.025);
    }

    img {
      width: auto;
      height: $header-ht - 34px;
      @include transition;
    }
  }

  nav {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: space-between;

    ul {
      display: flex;
      align-items: center;
    }

    ul a {
      font-size: 20px;
      font-weight: 600;
      // color: #fff;
      color: $teal-dk;
      text-transform: uppercase;
      text-decoration: none;
      @include transition;

      &:hover {
        color: darken($teal-dk, 10%);
      }

      @media (max-width: 1080px) {
        font-size: 20px;
      }
    }

    .nav-1,
    .nav-2 {
      display: flex;
      justify-content: space-between;
      flex: 0 1 40%;
      width: 40%;
    }

    ul.nav-1 li {
      margin: 0 15px;

      &:first-of-type {
        margin: 0 15px 0 0;
      }
    }

    ul.nav-2 li {
      margin: 0 15px;

      &:last-of-type {
        margin: 0 0 0 15px;
      }
    }

    .social {
      align-items: center;

      li {
        display: flex;
        align-items: center;
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
          opacity: 0.8;
        }
      }
    }
  }

  // nav
  .mobile-nav {
    display: none;
  }

  .close-mobile-nav {
    display: none;
  }

  @media #{$mxw-lg} {
    .mobile-nav {
      display: block;
    }

    .close-mobile-nav {
      display: block;
      position: absolute;
      top: 2px;
      left: 30px;
      padding: 0;
      color: #fff;
      font-size: 56px;
    }

    nav {
      flex-direction: column;
      justify-content: center;
      position: fixed;
      top: 0;
      left: calc(100% * -1);
      width: 100vw;
      height: 100vh;
      background-color: rgba($teal, 0.95);
      @include transition;

      &.open {
        left: 0;
      }

      .nav-1,
      .nav-2 {
        flex-direction: column;
        justify-content: flex-start;
        flex: unset;
        width: auto;

        li {
          margin: 0 20px !important;
          padding-bottom: 10px;

          a {
            font-size: 36px;
          }
        }
      }

      .social.desktop {
        display: none;
      }

    }

    // nav
    .open-mobile-nav {
      font-size: 40px;
      color: #fff;
      padding: 0;
      cursor: pointer;

      &:hover {
        color: $teal;
      }
    }
  }
}

header,
.header-wrap {
  height: $header-ht;

  @media #{$mxw-lg} {
    height: $header-ht-short;

    .logo-wrap img {
      height: $header-ht-short - 20px;
    }

    nav a {
      font-size: 36px !important;
    }

    .social,
    .social li {
      height: $social-icon-ht-m;
    }

    .social a,
    .social .logo {
      width: $social-icon-ht-m;
      height: $social-icon-ht-m;
    }
  }
}

.header-short,
.header-short .header-wrap {
  height: $header-ht-short;

  .logo-wrap img {
    height: $header-ht-short - 20px;
  }

  nav a {
    font-size: 20px;
  }

  .social,
  .social li {
    height: $social-icon-ht-m;
  }

  .social a,
  .social .logo {
    width: $social-icon-ht-m;
    height: $social-icon-ht-m;
  }
}

.header-fill {
  margin-top: $header-ht;

  @media #{$mxw-lg} {
    margin-top: $header-ht-short;
  }
}
</style>
