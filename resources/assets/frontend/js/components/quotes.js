import quoteManager from './quote-manager';

class Quotes {
  static init () {
    new Quotes();
  }

  constructor () {
    this._quotes = document.querySelectorAll('.quote');

    Array.from(this._quotes).forEach(quote => {
      quote.addEventListener('click', this._onClick);
    });
  }

  _onClick (evt) {
    if (evt.target.tagName.toLowerCase() === 'a') {
      return;
    }

    const authorData = this.querySelector('.quote_author');

    const text = this.querySelector('.quote_text em').textContent;
    const href = this.dataset.href;
    const author = authorData.textContent;
    let authorURL = authorData.hasChildNodes()
      ? authorData.firstElementChild.href
      : '#';    
    
    quoteManager.showQuote({
      author,
      authorURL,
      text,
      href
    });
  }
}

export default Quotes;