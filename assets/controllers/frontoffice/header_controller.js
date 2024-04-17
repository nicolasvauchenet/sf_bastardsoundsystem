import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        this.scrollHandler()
        window.addEventListener('scroll', this.scrollHandler)
    }

    scrollHandler() {
        const header = document.querySelector('.app-header')
        const nav = document.querySelector('.app-navigation')
        const stickyOffset = nav.offsetTop

        if (window.pageYOffset > stickyOffset) {
            header.classList.add('top')
            nav.classList.add('top')
        } else {
            header.classList.remove('top')
            nav.classList.remove('top')
        }
    }
}
