const preloadImage = url => {
  return new Promise((resolve, reject) => {
    const image = new Image();
    image.src = url;
    image.onload = resolve;
    image.onerror = reject;
  });
};

const loadStyles = url => {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.returnType = 'text';
    xhr.onload = function () {
      const link = document.createElement('link');
      link.rel = 'stylesheet';
      link.href = url;
      document.head.appendChild(link);
      resolve();
    };
    xhr.onerror = reject;
    xhr.open('get', url);
    xhr.send();
  });
};

export {
  preloadImage,
  loadStyles
}