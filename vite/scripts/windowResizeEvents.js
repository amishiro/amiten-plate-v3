// windowリサイズイベント関連

/**
 * viewportのコントローラー
 *
 * minimumサイズ以下の時のデザインを切り捨てられるように、
 * viewportを固定してデザインを崩れないようにする。
 *
 * @param {number} minimum
 */
const viewportController = (minimum) => {
  const w = window.outerWidth
  const content =
    w <= minimum ? 'width=' + minimum : 'width=device-width,initial-scale=1'
  document
    .querySelector("meta[name='viewport']")
    .setAttribute('content', content)
}

/**
 * 10ms秒ごとにリサイズイベントを検知
 *
 * ウィンドウリサイズ時の過度なイベント処理を防ぐために、
 * ウィンドウリサイズ周りはここに書く。
 */
const resizeEvents = () => {
  let timeoutId
  window.addEventListener(
    'resize',
    () => {
      clearTimeout(timeoutId)
      timeoutId = setTimeout(() => {
        viewportController(375)
      }, 10)
    },
    false
  )
}

export default resizeEvents
