// tsに書き直したいので、vue-3-sanitizeを外だし
// docs: https://github.com/Vannsl/vue-3-sanitize
import sanitizeHtml from 'sanitize-html'

const Vue3Sanitize = {
  install: (app, options) => {
    app.config.globalProperties.$sanitize = (dirty, opts = null) =>
      sanitizeHtml(dirty, opts || options)
  },

  defaults: sanitizeHtml.defaults,
}

export default Vue3Sanitize
