/**
 * Checkbox Required Helper
 *
 * Will add or remove require flag on checkbox input group based on if any of those values are clicked
 *
 * @param {string} element - checkbox group class
 */

export default function requireCheckbox (element) {
  const checkboxGroups = Array.from(document.querySelectorAll(element))
  checkboxGroups.forEach(group => {
    group.addEventListener('click', () => {
      // Check if there are any selected checkboxes
      if (group.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
        for (let checkbox of group.querySelectorAll('input[type="checkbox"]')) { checkbox.required = false }

        // Optional: Removed custom required class to form group
        // group.classList.remove('form-group--required')
      } else {
        for (let checkbox of group.querySelectorAll('input[type="checkbox"]')) { checkbox.required = true }

        // Optional: Add back custom required class to form group
        // group.classList.remove('form-group--required')
      }
    })
  })
}
