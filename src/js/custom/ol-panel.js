/**
 * Overlay Panels
 *
 * Off screen panels for displaying menus, information, anything!
 * Panel display functionality is all controlled via CSS. JS is only responsible for setting open/close state.
 *
 * For full documentation on use please refer to README.md https://github.com/efellemedia/oxygen-theme.
 *
 */
const dataKey = 'ol.panel'
const eventKey = `.${dataKey}`
const className = {
  panel: 'ol-panel',
  init: 'ol-panel--init',
  active: 'ol-panel--active',
  btn: 'ol-panel-btn',
  btnActive: 'ol-panel-btn--active',
  btnCurrent: 'ol-panel-btn--current',
  container: 'ol-panel-container',
  containerActive: 'ol-panel-container--active',
  bodyNoscroll: 'prevent-scroll'
}
const error = {
  init: 'Please indicate a panel element',
  shown: 'This panel is already open',
  hidden: 'This panel is already closed'
}
const event = {
  init: `init${eventKey}`,
  refresh: `refresh${eventKey}`,
  show: `show${eventKey}`,
  shown: `shown${eventKey}`,
  hide: `hide${eventKey}`,
  hidden: `hidden${eventKey}`
}
const api = [
  'init',
  'hide',
  'show'
]
const init = new CustomEvent(event.init, {
  bubbles: false,
  cancelable: true
})
const refresh = new CustomEvent(event.refresh, {
  bubbles: false,
  cancelable: true
})
const show = new CustomEvent(event.show, {
  bubbles: false,
  cancelable: true
})
const shown = new CustomEvent(event.shown, {
  bubbles: false,
  cancelable: true
})
const hide = new CustomEvent(event.hide, {
  bubbles: false,
  cancelable: true
})
const hidden = new CustomEvent(event.hidden, {
  bubbles: false,
  cancelable: true
})
const forEach = function (fn, scope) {
  for (let i = 0, len = this.length; i < len; ++i) {
    fn.call(scope, this[i], i, this)
  }
}

/**
 * Utility method to extend defaults with user options
 *
 * @param  {Object} source
 * @param  {Object} properties
 *
 * @return Object
 */
function extend (source, properties) {
  let property

  for (property in properties) {
    if (properties.hasOwnProperty(property)) {
      source[property] = properties[property]
    }
  }
  return source
}

/**
 * Polyfill for CustomEvent for Internet Explorer
 */
function CustomEvent ( event, params ) {
  params = params || { bubbles: false, cancelable: false, detail: null };
  var evt = document.createEvent( 'CustomEvent' );
  evt.initCustomEvent( event, params.bubbles, params.cancelable, params.detail );
  return evt;
}

window.CustomEvent = CustomEvent;

export default class OverlayPanel {
  constructor (selector, options) {
    this.defaults = {
      beforeOpen: function () {},
      afterOpen: function () {},
      beforeClose: function () {},
      afterClose: function () {},
      startEvent: 'DOMContentLoaded',
      container: document.body,
      bodyNoscroll: true,
      focusFirst: true
    }
    this.settings = extend(this.defaults, options || {})
    this.panel =
      typeof selector === 'string' ? document.querySelector(selector) : selector
    this.btns = document.querySelectorAll(`[data-ol-toggle="${selector}"]`)
    this.isOpen = false
    this.current = null
    this.focusable = this.panel ? this.panel.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])') : null
    this.container = this.settings.container

    this.init(this.panel, this.settings)
  }

  /**
   * Set values to constructor objects and initialize panel setup & events
   *
   * @param  {Object} selector
   * @param  {Object} options
   *
   * @return void
   */
  init (selector, options) {
    // Listen to this.settings.startEvent and initialize overlay panel
    document.addEventListener(this.settings.startEvent, () => {
      // Assure the necessary elements exist
      if (!this.panel) {
        return console.error(error.init)
      }

      this.container.classList.add(className.container)

      this.panelState()
    })
  }

  /**
   * Bind all events to buttons, settings and callbacks
   *
   * @listens  show.ol.panel
   * @listens  shown.ol.panel
   * @listens  hide.ol.panel
   * @listens  hidden.ol.panel
   *
   * @return   void
   */
  bindEvents () {
    this.unbindEvents()

    forEach.call(this.btns, (btn) => {
      btn.classList.add(className.btn)
      btn.setAttribute('aria-expanded', false)
      btn.addEventListener('click', (event) => { this.bindBtnActions(event, btn, 'toggle') })
    })

    this.panel.addEventListener(event.show, (event) => { this.settings.beforeOpen() })

    this.panel.addEventListener(event.shown, (event) => { this.settings.afterOpen() })

    this.panel.addEventListener(event.hide, (event) => { this.settings.beforeClose() })

    this.panel.addEventListener(event.hidden, (event) => { this.settings.afterClose() })
  }

  /**
   * Unbind all events to buttons, settings and callbacks
   *
   * @return void
   */
  unbindEvents () {
    forEach.call(this.btns, (btn) => {
      btn.classList.remove(className.btn)
      btn.removeAttribute('aria-expanded')
      btn.removeEventListener('click', (event) => { this.bindBtnActions(event, btn) })
    })

    this.panel.removeEventListener(event.show, (event) => { this.settings.beforeOpen() })

    this.panel.removeEventListener(event.shown, (event) => { this.settings.afterOpen() })

    this.panel.removeEventListener(event.hide, (event) => { this.settings.beforeClose() })

    this.panel.removeEventListener(event.hidden, (event) => { this.settings.afterClose() })
  }

  /**
   * Refresh all panel functionality and events
   * Useful if new elements have been dynamically added to the page
   *
   * @return void
   */
  refresh () {
    this.panelState(true)
  }

  /**
   * Remove all panel functionality and events
   *
   * @return void
   */
  destroy () {
    this.unbindEvents()
  }

  /**
   * Add required classes and aria attribute to any panels present on the page
   *
   * @param  {Boolean} refresh  Optional to detect if init or refresh
   *
   * @return void
   */
  panelState (refresh) {
    this.panel.classList.add(className.panel)
    this.panel.classList.add(className.init)
    this.panel.setAttribute('aria-hidden', true)
    this.negativeTabindex()
    this.bindEvents()

    if (refresh) {
      this.panel.dispatchEvent(refresh)
    } else {
      this.panel.dispatchEvent(init)
    }
  }

  /**
   * Use with an event to set button hide/show panel actions
   *
   * @param  {Object} event
   * @param  {Object} btn
   *
   * @return void
   */
  bindBtnActions (event, btn) {
    event.preventDefault()

    if (this.isOpen) {
      this.hide(event.target)
    } else {
      this.show(event.target)
    }
  }

  /**
   * Actions to show/open a panel
   *
   * @param  {Object} trigger  Optional to detect clicked element to set as current.
   * @return void
   */
  show (trigger = null) {
    if (!this.isOpen) {
      this.isOpen = true
      this.panel.dispatchEvent(show)
      this.panel.classList.add(className.active)
      this.panel.setAttribute('aria-hidden', false)
      this.positiveTabindex()

      if (trigger) {
        this.current = trigger
        this.current.classList.add(className.btnCurrent)
        if (this.settings.focusFirst) {
          this.focusable[0].focus()
        }
      }

      if (this.settings.bodyNoscroll) { document.body.classList.add(className.bodyNoscroll) }

      this.activateBtns(this.btns)

      this.container.classList.add(className.containerActive)

      this.bindOutsideClick(this.container, () => { this.hide() })

      this.panel.dispatchEvent(shown)
    } else {
      console.error(error.shown)
    }
  }

  /**
   * Actions to hide/close a panel
   *
   * @return void
   */
  hide () {
    if (this.isOpen) {
      this.isOpen = false
      this.unbindOutsideClick(this.container, () => { this.hide() })
      this.panel.dispatchEvent(hide)
      this.panel.classList.remove(className.active)
      this.panel.setAttribute('aria-hidden', true)
      this.negativeTabindex()

      if (this.current) {
        this.current.focus()
        this.current.classList.remove(className.btnCurrent)
        this.current = null
      }

      if (this.settings.bodyNoscroll) { document.body.classList.remove(className.bodyNoscroll) }

      this.deactivateBtns(this.btns)

      this.container.classList.remove(className.containerActive)

      this.panel.dispatchEvent(hidden)
    } else {
      console.error(error.hidden)
    }
  }

  /**
   * Set active state of panel buttons
   *
   * @param  {Object} btns
   *
   * @return void
   */
  activateBtns (btns) {
    forEach.call(btns, (btn, i) => {
      btn.classList.add(className.btnActive)
      btn.setAttribute('aria-expanded', true)
    })
  }

  /**
   * Remove active state of panel buttons
   *
   * @param  {Object} btns
   *
   * @return void
   */
  deactivateBtns (btns) {
    forEach.call(btns, (btn, i) => {
      btn.classList.remove(className.btnActive)
      btn.setAttribute('aria-expanded', false)
    })
  }

  /**
   * Set focusable elements to neutral tab index to allow focus
   *
   * @param  {Object} items  Optional, will default to constructor object if not set
   *
   * @return void
   */
  positiveTabindex (items = this.focusable) {
    forEach.call(items, (item, i) => {
      item.setAttribute('tabindex', 0)
    })
  }

  /**
   * Set focusable elements to negative tab index, preventing focus
   *
   * @param  {Object} items  Optional, will default to constructor object if not set
   *
   * @return void
   */
  negativeTabindex (items = this.focusable) {
    forEach.call(items, (item, i) => {
      item.setAttribute('tabindex', -1)
    })
  }

  /**
   * Bind click event to outside of container. Hide panel if clicked outside. Limit function to one occurrence.
   *
   * @param  {Object} target
   * @param  {Function} listener
   *
   * @listens click
   *
   * @return void
   */
  bindOutsideClick (target, listener) {
    let self = this

    target.addEventListener('mouseup', function fn (event) {
      if (self.detectOutsideClick(event) && self.isOpen) {
        target.removeEventListener('mouseup', fn)
        listener.apply(this, arguments)
      }
    })
  }

  /**
   * Unbind click event to outside of container. No longer needed when panel is hidden.
   *
   * @param  {Object} target
   * @param  {Function} listener
   *
   * @listens click
   *
   * @return void
   */
  unbindOutsideClick (target, listener) {
    target.removeEventListener('mouseup', function fn (event) {
      listener.apply(this, arguments)
    })
  }

  /**
   * Detect if click event has happen outside of panel or toggle button
   *
   * @param  {Object} event
   *
   * @return Boolean
   */
  detectOutsideClick (event) {
    let targetElement = event.target

    do {
      for (let btn of this.btns) {
        if (targetElement == btn || targetElement == this.panel) {
          return false
        }
      }
      targetElement = targetElement.parentNode
    } while (targetElement)

    return true
  }
}
