import sanitize from 'sanitize-html'

declare module '@vue/runtime-core' {
  export interface ComponentCustomProperties {
    $sanitize(dirty: string, options?: sanitize.IOptions | undefined): string
  }
}