import VueScrollTo from 'vue-scrollto'

export default {
  install: (app, options) => {
    app.directive('scroll-to', VueScrollTo)
  },
}
