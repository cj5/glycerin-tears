// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  app: {
    head: {
      charset: 'utf-8',
      viewport: 'width=device-width, initial-scale=1',
      htmlAttrs: {
        lang: 'en',
      },
    }
  },
  routes: {
    '/': { prerender: true },
    '/*': { cors: false },
  },
  routeRules: {
    '/wp-json/wp/v2/**': {
      proxy: { to: "http://localhost:8081/**" },
    }
  },
  devServer: { port: 8081 },
  devtools: { enabled: false },
  router: { base: '/src/' },
  ssr: false,
  modules: ['nuxt-gtag'],
  gtag: { id: 'G-974W36YVXZ' }
})
