import dialog from './dialog';

class QuoteManager {
  constructor() {
    this.author = document.getElementById('js-quote-author');
    this.text = document.getElementById('js-quote-text');
    this.link = document.getElementById('js-quote-link');
  }

  showQuote(data) {
    this.author.innerHTML = data.author;
    this.text.innerHTML = data.text;
    this.link.href = data.href;
    this.author.href = data.authorURL;

    this.link.style.display =
      (data.href === '#')
        ? 'none'
        : '';

    dialog.show();
  }
}

export default new QuoteManager();