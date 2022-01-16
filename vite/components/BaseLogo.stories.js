import BaseLogo from './BaseLogo.vue'

export default {
  title: 'Example/BaseLogo',
  component: BaseLogo,
}

const Template = (args) => ({
  components: { BaseLogo },
  setup() {
    return { args }
  },

  // ↓表示位置を指定
  parameters: {
    layout: 'centered',
  },

  template: '<BaseLogo v-bind="args" />',
})

export const Base = Template.bind({})
