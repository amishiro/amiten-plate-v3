const copy = require('copy');
const dotenv = require('dotenv');
dotenv.config({ path: '.env.production' });

const baseDir = process.env.BASE_DIR ? process.env.BASE_DIR : ''

copy('./public/**/*', `./dist/${baseDir}`, function(err, files) {
    if (err) throw err;
    // `files` is an array of the files that were copied
  });

