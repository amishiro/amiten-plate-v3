import phpServer from 'php-server'
import open from 'open'
import dotenv from 'dotenv'
dotenv.config({ path: `.env.${process.env.MODE}` })

const mode = process.env.MODE
const base = mode === 'production' || mode === 'staging' ? `./dist` : `./public`
const baseDir = process.env.BASE_DIR ? process.env.BASE_DIR : ''

// docs: https://www.npmjs.com/package/php-server
const server = await phpServer({
  base,
  host: '0,0,0,0',
  port: '3001',
})

await open(`${server.url + '/' + baseDir}`)

console.log(`PHP server running at ${server.url}`)
