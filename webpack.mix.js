const mix = require('laravel-mix')
const exec = require('child_process').exec
require('dotenv').config()

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

const glob = require('glob')
const path = require('path')

/*
 |--------------------------------------------------------------------------
 | Vendor assets
 |--------------------------------------------------------------------------
 */

function mixAssetsDir(query, cb) {
  ;(glob.sync('resources/' + query) || []).forEach(f => {
    f = f.replace(/[\\\/]+/g, '/')
    cb(f, f.replace('resources', 'public'))
  })
}


// function mixAssetsDir(query, cb) {
//   ;(glob.sync('resources/customer-resources' + query) || []).forEach(f => {
//     f = f.replace(/[\\\/]+/g, '/')
//     cb(f, f.replace('resources/customer-resources', 'public/customer-resources'))
//   })
// }

const sassOptions = {
  precision: 5,
  includePaths: ['node_modules', 'resources/assets/']
}

// plugins Core stylesheets
mixAssetsDir('sass/base/plugins/**/!(_)*.scss', (src, dest) =>
  mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), {sassOptions})
)

// pages Core stylesheets
mixAssetsDir('sass/base/pages/**/!(_)*.scss', (src, dest) =>
  mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), {sassOptions})
)

// Core stylesheets
mixAssetsDir('sass/base/core/**/!(_)*.scss', (src, dest) =>
  mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), {sassOptions})
)

// script js
mixAssetsDir('js/scripts/**/*.js', (src, dest) => mix.scripts(src, dest))

/*
 |--------------------------------------------------------------------------
 | Application assets
 |--------------------------------------------------------------------------
 */

mixAssetsDir('vendors/js/**/*.js', (src, dest) => mix.scripts(src, dest))
mixAssetsDir('vendors/css/**/*.css', (src, dest) => mix.copy(src, dest))
mixAssetsDir('vendors/**/**/images', (src, dest) => mix.copy(src, dest))

mixAssetsDir('vendors/css/editors/quill/fonts/', (src, dest) => mix.copy(src, dest))

mixAssetsDir('fonts', (src, dest) => mix.copy(src, dest))
mixAssetsDir('fonts/**/**/*.css', (src, dest) => mix.copy(src, dest))
mix.copyDirectory('resources/images', 'public/images')
mix.copyDirectory('resources/data', 'public/data')


mixAssetsDir('customer-resources/**', (src, dest) => mix.copy(src, dest))
// mix.js('resources/customer-resources/js/scripts/app.js', 'public/js').vue()

mix
.sass('resources/customer-resources/sass/base/page-headerfooter.scss', 'public/customer-resources/sass/base/', {sassOptions})
.sass('resources/customer-resources/sass/base/welcome.scss', 'public/customer-resources/sass/base/', {sassOptions})
.sass('resources/customer-resources/sass/base/client.scss', 'public/customer-resources/sass/base/', {sassOptions})



mix
  .js('resources/js/core/app-menu.js', 'public/js/core')
  .js('resources/js/core/app.js', 'public/js/core')
  .js('resources/js/app.js', 'public/js').vue()
  // .js('resources/customer-resources/js/app.js', 'public/customer-resources/js').vue()

  .sass('resources/sass/app.scss', 'public/css')
  .sass('resources/sass/core.scss', 'public/css', {sassOptions})
  .sass('resources/sass/overrides.scss', 'public/css', {sassOptions})
  .sass('resources/sass/base/custom-rtl.scss', 'public/css', {sassOptions})
  .sass('resources/assets/scss/style-rtl.scss', 'public/css', {sassOptions})
  .sass('resources/assets/scss/style.scss', 'public/css', {sassOptions})

mix.then(() => {
  if (process.env.MIX_CONTENT_DIRECTION === 'rtl') {
    let command = `node ${path.resolve('node_modules/rtlcss/bin/rtlcss.js')} -d -e ".css" ./public/css/ ./public/css/`
    exec(command, function(err, stdout, stderr) {
      if (err !== null) {
        console.log(err)
      }
    })
  }
})

if(mix.inProduction()) {
  mix.version();
}

// if (mix.inProduction()) {
//   mix.version()
//   mix.webpackConfig({
//     output: {
//       publicPath: '/demo/vuexy-bootstrap-laravel-admin-template-new/demo-2/'
//     }
//   })
//   mix.setResourceRoot('/demo/vuexy-bootstrap-laravel-admin-template-new/demo-2/')
// }