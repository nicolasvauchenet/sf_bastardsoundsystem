import {Controller} from '@hotwired/stimulus'

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    open(e) {
        e.preventDefault()
        const popupElt = document.getElementById(this.element.dataset.popupid)
        popupElt.classList.add('open')

        const popupBody = popupElt.querySelector('.popup-body')
        popupElt.addEventListener('click', e => {
            if (!popupBody.contains(e.target)) {
                this.close(e)
            }
        })
    }

    close(e) {
        e.preventDefault()
        const popupElt = document.getElementById(this.element.dataset.popupid)
        popupElt.classList.remove('open')
    }
}
