/**
 * Utility function to detect if an element has a specific class in it's class list
 *
 * Example:
 * hasClass(element, 'class-name')
 *
 * @param  {object} element
 * @param  {string} cls
 * @return Boolean
 */
export default function hasClass (element, cls) {
  return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1
}
