import phpServer from 'php-server'
import open from 'open'
import dotenv from 'dotenv'
const envFile =
  process.env.MODE === 'production' ? '.env.production' : '.env.development'
dotenv.config({ path: envFile })

const mode = process.env.MODE
const base = mode === 'production' ? `./dist` : `./public`
const baseDir = process.env.BASE_DIR ? process.env.BASE_DIR : ''

// docs: https://www.npmjs.com/package/php-server
const server = await phpServer({
  base,
  host: '0,0,0,0',
  port: '3001',
})

await open(`${server.url + '/' + baseDir}`)

console.log(`PHP server running at ${server.url}`)
