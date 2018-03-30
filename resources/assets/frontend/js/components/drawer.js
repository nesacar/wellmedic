const ACTIVE_CLASS = 'active';
const NO_SCROLL_CLASS = 'no-scroll';
const DATA_ID = 'data-drawer';

const _close = target => evt => {
  // block clicks on drawer surface
  if (evt.target.closest('.drawer_drawer')) return;

  document.body.classList.remove(NO_SCROLL_CLASS);
  target.classList.remove(ACTIVE_CLASS);
  target.removeEventListener('click', _close);
};

const _open = target => evt => {
  target.classList.add(ACTIVE_CLASS);
  document.body.classList.add(NO_SCROLL_CLASS);
  target.addEventListener('click', _close(target));
};

const _bindEvents = control => {
  const id = control.getAttribute(DATA_ID);
  const target = document.getElementById(id);

  control.addEventListener('click', _open(target));
};

export default {
  init: () => {
    const controls = document.querySelectorAll(`[${DATA_ID}]`);
    Array.from(controls, _bindEvents);
  }
};