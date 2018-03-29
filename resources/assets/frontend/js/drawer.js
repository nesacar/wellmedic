const _close = target => evt => {
  if (evt.target.closest('.drawer_drawer')) return;

  document.body.classList.remove('no-scroll');
  target.classList.remove('active');
  target.removeEventListener('click', _close);
};

const _open = target => evt => {
  target.classList.add('active');
  document.body.classList.add('no-scroll');
  target.addEventListener('click', _close(target));
};

const _bindEvents = control => {
  const id = control.getAttribute('data-drawer');
  const target = document.getElementById(id);

  control.addEventListener('click', _open(target));
};


export default {
  init: () => {
    const controls = document.querySelectorAll('[data-drawer]');
    Array.from(controls, _bindEvents);
  }
};