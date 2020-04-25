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

mix.setPublicPath('assets')
  .setResourceRoot('./')
  .autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
    'popper.js/dist/umd/popper.js': ['Popper', 'window.Popper'] // Must require umd version
  })
  .js('resources/js/theme.js', 'theme.js')
  .extract([
    'vue',
    'jquery',
    'bootstrap',
    'lazysizes',
    'popper.js'
  ])
  .sass('resources/scss/theme.scss', 'assets/theme.css')
  .sass('resources/scss/vendor.scss', 'assets/vendor.css')
  .sourceMaps()
  .version()
  .options({
    extractVueStyles: false,
    processCssUrls: true,
    imgLoaderOptions: {
      enabled: false
    }
  })
  .babelConfig({
    presets: [
      ['@babel/preset-env', {
        targets: '> 0.2%, last 2 versions, not ie <= 10, Firefox ESR, safari >= 7, ios_saf >= 7',
        loose: true, // Enable "loose" transformations for any plugins in this preset that allow them
        modules: false,
        useBuiltIns: 'usage',
        corejs: '^3.4.1',
        debug: true
      }]
    ]
  })

mix.copy('resources/images', 'assets/images')

mix.webpackConfig({
  devtool: sourceMap,
  plugins: [
    new FaviconsWebpackPlugin({
      logo: './resources/images/favicon.png',
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
