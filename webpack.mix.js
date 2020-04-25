require('pretty-error').start()
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

const mix = require('laravel-mix')
const production = process.env.NODE_ENV === 'production'
const sourceMap = production ? '' : 'inline-source-map'
const FaviconsWebpackPlugin = require('favicons-webpack-plugin')

mix.setPublicPath('dist')
  .setResourceRoot('./')
  .autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
    'popper.js/dist/umd/popper.js': ['Popper', 'window.Popper'] // Must require umd version
  })
  .js('src/js/theme.js', 'theme.js')
  .extract([
    'vue',
    'jquery',
    'bootstrap',
    'lazysizes',
    'popper.js'
  ])
  .sass('src/scss/theme.scss', 'dist/theme.css')
  .sass('src/scss/vendor.scss', 'dist/vendor.css')
  .sourceMaps()
  .version()
  .options({
    extractVueStyles: false,
    processCssUrls: false,
    imgLoaderOptions: {
      enabled: false
    }
  })
  .babelConfig({
    presets: [
      ['@babel/preset-env', {
        targets: '> 1%, last 2 versions, Firefox ESR',
        loose: true, // Enable "loose" transformations for any plugins in this preset that allow them
        modules: false,
        useBuiltIns: 'usage',
        corejs: '^3.6.5',
        debug: true
      }]
    ]
  })

mix.webpackConfig({
  devtool: sourceMap,
  plugins: [
    new FaviconsWebpackPlugin({
      logo: './assets/images/favicon.png',
      outputPath: '/favicons',
      cache: true,
      inject: false,
      favicons: {
        background: 'transparent',
        icons: {
          android: true,
          appleIcon: true,
          appleStartup: false,
          coast: false,
          favicons: true,
          firefox: true,
          yandex: false,
          windows: false
        }
      }
    })
  ]
})

// mix.browserSync({
//   proxy: 'oxygen.test',
//   files: [
//     'resources/**/*',
//     'views/**/*'
//   ]})
