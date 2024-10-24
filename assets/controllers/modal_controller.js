import {Controller} from '@hotwired/stimulus';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ["modal", "background"];

    open(event) {
        event.preventDefault();
        this.modalTarget.classList.add('is-active');
        document.body.style.overflow = 'hidden';
    }

    close(event) {
        if (event.target === this.backgroundTarget || event.target.closest('.modal-close')) {
            this.modalTarget.classList.remove('is-active');
            document.body.style.overflow = '';
        }
    }
}
