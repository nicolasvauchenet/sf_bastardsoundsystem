import {Controller} from '@hotwired/stimulus'

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ["modal", "background"];

    open(event) {
        event.preventDefault();
        this.modalTarget.classList.add('is-active');
    }

    close(event) {
        event.preventDefault();
        if (event.target === this.backgroundTarget || event.currentTarget === this.modalTarget.querySelector('.modal-close')) {
            this.modalTarget.classList.remove('is-active');
        }
    }
}
