import quoteManager from './quote-manager';

class Quotes {
  static init () {
    new Quotes();
  }

  constructor () {
    this._quotes = document.querySelectorAll('.quote');

    Array.from(this._quotes).forEach(quote => {
      quote.addEventListener('click', () => {
        this._onClick(quote);
      });
    });
  }

  _onClick (quote) {
    const authorData = quote.querySelector('.quote_author');

    const text = quote.querySelector('.quote_text em').textContent;
    const href = quote.dataset.href;
    const author = authorData.textContent;
    const authorURL = authorData.dataset.href;
    
    quoteManager.showQuote({
      author,
      authorURL,
      text,
      href
    });
  }
}

export default Quotes;