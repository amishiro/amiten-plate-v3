/**
 * セッティング用CSS
 * 全てのエントリポイントへimportしてください。
 */

// css reset
// docs: https://csstools.github.io/sanitize.css/
import 'sanitize.css'

// settingディレクトリ以下のファイルを読み込み
const styles = import.meta.glob('./**/*.scss')
for (const style in styles) {
  styles[style]()
}
