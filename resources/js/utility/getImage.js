/**
 * Set promise to load image and return either success or error
 * Uses the Image() constructor
 * For more information see https://developer.mozilla.org/en-US/docs/Web/API/HTMLImageElement/Image
 *
 * Example:
  getImage(imageUrl).then((successurl) => {
   // On success, do something
  }).catch((errorurl) => {
   // If error, log in console
   console.error('Could not load asset: ' + errorurl)
  })
 *
 * @param  {string} url
 * @return Promise
 */
export default function getImage (url) {
  return new Promise(function (resolve, reject) {
    let img = new Image()

    img.onload = function () {
      resolve(url)
    }
    img.onerror = function () {
      reject(url)
    }

    img.src = url
  })
}
