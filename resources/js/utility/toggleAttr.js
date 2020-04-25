/**
 * Utility function to toggle boolean attributes
 *
 * Example:
 * toggleAttr(element, 'aria-hidden')
 *
 * @param  {object} element
 * @param  {object} attr - any boolean based element attribute (eg. aria-expanded, aria-hidden, etc..)
 * @return void
 */
export default function toggleAttr (element, attr) {
  if (element.getAttribute(attr) === 'true') {
    element.setAttribute(attr, false)
  } else {
    element.setAttribute(attr, true)
  }
}
