class Accordion {
  static init () {
    new Accordion();
  }

  constructor () {
    const accordions = document.querySelectorAll('.accordion');

    this._toggle = this._toggle.bind(this);

    accordions.forEach(accordion => {
      this._attachEvents(accordion);
    });
  }

  _attachEvents (accordion) {
    const toggleEl = accordion.querySelector('.js-dropdown-toggle');

    toggleEl.addEventListener('click', this._toggle);
  }

  _toggle (evt) {
    const buttonEl = evt.target;
    const pane = document.querySelector(buttonEl.dataset.target);
    const expanded = buttonEl.hasAttribute('data-expanded');

    buttonEl.setAttribute('aria-expanded', !expanded);

    if (expanded) {
      buttonEl.removeAttribute('data-expanded');
      Accordion.collapse(pane);
    }
    else {
      buttonEl.setAttribute('data-expanded', '');
      Accordion.expand(pane);
    }
  }

  static expand (element) {
    const content = element.querySelector('.accordion_container');
    const { height } = content.getBoundingClientRect();

    element.style.height = `${height}px`;
  }

  static collapse (element) {
    element.style.height = '';
  }
}

export default Accordion;