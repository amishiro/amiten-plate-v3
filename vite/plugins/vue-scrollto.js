import VueScrollTo from 'vue-scrollto'

export default {
  install: (app) => {
    app.directive('scroll-to', VueScrollTo)
  },
}
