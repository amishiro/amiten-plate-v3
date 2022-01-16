import TheMainHeader from './TheMainHeader.vue'

// plugins
// import plugins from './plugins/_index.js'

// styles
import '../styles/setting/_index.js'

export default {
  title: 'Example/TheMainHeader',
  component: { TheMainHeader },

  // ↓ディフォルト値を指定
  // argTypes: {
  //   title: 'ディフォルト',
  //   sub: '',
  // },
}

const Template = (args) => ({
  components: { TheMainHeader },
  setup() {
    return { args }
  },
  // v-bind="args"を利用して、argsを渡す
  template: '<TheMainHeader v-bind="args"/>',
})

export const Base = Template.bind({})
Base.args = {
  title: 'タイトル2',
}

export const AddSub = Template.bind({})
AddSub.args = {
  title: 'タイトル2',
  sub: 'することもなく手持ちぶさたなのにまかせて、一日中、硯に向かって、心の中に浮かんでは消えて（５０文字）',
}
