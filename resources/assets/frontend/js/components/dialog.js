class Dialog {
  static get VISIBLE_CLASS () {
    return 'dialog--visible';
  }

  constructor () {
    this._dialog = document.querySelector('.dialog');
    const backdrop = this._dialog.querySelector('.dialog_backdrop');
    const closeBtn = this._dialog.querySelector('.dialog_close-btn');

    this.hide = this.hide.bind(this);
    this.show = this.show.bind(this);

    backdrop.addEventListener('click', this.hide);
    closeBtn.addEventListener('click', this.hide);
  }

  show (data) {
    this._dialog.classList.add(Dialog.VISIBLE_CLASS);
  }

  hide () {
    this._dialog.classList.remove(Dialog.VISIBLE_CLASS);
  }
}

export default new Dialog();
