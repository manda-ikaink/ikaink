/**
 * Basic Form Validation
 *
 * Disable form submissions if there are invalid fields for purposes of using Bootstrap validation styles
 *
 * @param {string}  el - Class selector of the forms we want to apply custom Bootstrap validation styles to
 */
export default function validateForm (el) {
  let forms = document.querySelectorAll(el)

  let validation = Array.prototype.filter.call(forms, function (form) {
    let btn = form.querySelector('button[type=submit]')

    form.addEventListener('submit', function (event) {
      if (form.checkValidity() === false) {
        event.preventDefault()
        event.stopPropagation()
      } else {
        btn.setAttribute('disabled', 'disabled')
      }
      form.classList.add('was-validated')
    }, false)
  })
}
