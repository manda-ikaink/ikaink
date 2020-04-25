/**
 * Utility function to easily set cookies
 *
 * Example:
 * cookie.setCookie('status', 'active', 1)
 *
 * @param  {string} cname - name of the cookie
 * @param  {string} cvalue - value set to the cookie
 * @exdays {num} exdays - number of days before expiration
 * @return void
 */
function setCookie (cname, cvalue, exdays, cpath = '/') {
  var d = new Date()
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000))
  var expires = 'expires=' + d.toUTCString()
  var path = 'path=' + cpath
  document.cookie = cname + '=' + cvalue + ';' + path + '; ' + expires
}

/**
 * Utility function to easily retrieve the value of cookies
 *
 * Example:
 * cookie.getCookie('name-of-cookie')
 *
 * @param  {string} cname - name of the cookie you'd like to get information from
 * @return void
 */
function getCookie (cname) {
  var name = cname + '='
  var ca = document.cookie.split(';')

  for (var i = 0; i < ca.length; i++) {
    var c = ca[i].trim()
    if (c.indexOf(name) === 0) return c.substring(name.length, c.length)
  }

  return ''
}

export default {
  getCookie,
  setCookie
}
