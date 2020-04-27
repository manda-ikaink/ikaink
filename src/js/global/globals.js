import $ from 'jquery'
import lazySizes from 'lazysizes'
import validateForm from '../forms/validation'
import requireCheckbox from '../forms/requiredCheckbox'
import 'lazysizes/plugins/parent-fit/ls.parent-fit'
import header from '../custom/transHeader'
// import overlay from '../custom/ol-panel'
import 'bootstrap/js/dist/modal'
import 'bootstrap/js/dist/collapse'

export default class Globals {
  constructor () {
    // this.menu = new overlay('#nav-panel')
    this.header = new header('#page-header', 'body', 'scrolled')

    this.init()
  }

  init () {
    this.plugins()
    this.forms()
    this.custom()
  }

  plugins () {
    lazySizes.cfg === window.lazySizesConfig || {} // Get default config from window
    Object.assign(lazySizes.cfg, {
      lazyClass: 'lazy',
      loadMode: 2,
      expand: 1,
      expFactor: 0.001,
      hFac: 0.001,
      customMedia: {
        '--xs': '(max-width: 576px)',
        '--sm': '(max-width: 768px)',
        '--md': '(max-width: 992px)',
        '--lg': '(max-width: 1200px)',
        '--xl': '(max-width: 1400px)'
      }
    })
    lazySizes.init()
  }

  forms () {
    validateForm('.needs-validation')
    requireCheckbox('.checkbox-group')
  }

  custom () {}
}
