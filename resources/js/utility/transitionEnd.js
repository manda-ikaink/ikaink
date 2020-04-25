/**
 * Utility class to detect the end of a CSS transition
 *
 * Example:
 * transition.init(element)
 *
 * @param  {object} el
 * @return boolean
 */
class TransitionEnd {
  init (el) {
    let transitions = {
      'transition': 'transitionend',
      'OTransition': 'oTransitionEnd',
      'MozTransition': 'transitionend',
      'WebkitTransition': 'webkitTransitionEnd'
    }

    for (let i in transitions) {
      if (el.style[i] !== undefined) {
        return transitions[i]
      }
    }
  }
}

export default new TransitionEnd()
