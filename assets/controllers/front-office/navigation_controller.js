import {Controller} from '@hotwired/stimulus';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    connect() {
        this.dropdownsHandler()
    }

    dropdownsHandler() {
        const dropdowns = document.querySelectorAll('.menu-item')
        const nav = document.querySelector('.app-navigation')

        dropdowns.forEach(element => {
            let anchor = element.querySelector('a')

            anchor.addEventListener('click', function (e) {
                e.preventDefault()
                dropdowns.forEach(el => {
                    if (el !== e.currentTarget.parentNode) {
                        el.classList.remove('open')
                    }
                })
                e.currentTarget.parentNode.classList.toggle('open')
            })

            if (window.innerWidth > 768) {
                anchor.addEventListener('mouseover', function () {
                    dropdowns.forEach(el => {
                        if (el !== element) {
                            el.classList.remove('open')
                        }
                    })
                    element.classList.add('open')
                })

                element.addEventListener('mouseleave', function () {
                    element.classList.remove('open')
                })
            }
        })

        document.addEventListener('click', function (e) {
            const withinBoundaries = e.composedPath().includes(nav)
            if (!withinBoundaries) {
                dropdowns.forEach(element => {
                    element.classList.remove('open')
                })
            }
        })
    }
}
