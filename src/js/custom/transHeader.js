/**
 * Header Transition
 *
 * Adds or removes a class on the <body> when user scrolls the equivalent of the header height.
 * Class may then be used to style a header transition effect.
 *
 * @param  {Object} header - Id or class of the page header element.
 * @param  {Object} container - Id or class of the element that should receive the scroll class.
 * @param  {string} scrollClass - Class that should be added/removed on scroll event.
 * @return void
 */
export default class transHeader {
  constructor (header, target, scrollClass) {
    this.element = document.querySelector(header)
    this.classTarget = document.querySelector(target)
    this.scrollClass = scrollClass
    this.offSet = 1

    this.init()
  }

  init () {
    window.onscroll = () => {
      this.scrollState(this.offSet)
    }

    window.onresize = () => {
      this.offSet = this.element.clientHeight
      this.scrollState(this.offSet)
    }
  }

  scrollState (offSet) {
    if (window.pageYOffset >= offSet) {
      this.classTarget.classList.add(this.scrollClass)
    } else {
      this.classTarget.classList.remove(this.scrollClass)
    }
  }
}
