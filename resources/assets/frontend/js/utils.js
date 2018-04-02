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

const getAverageRGB = img => {
  const PIXEL_INTERVAL = 5;
  const canvas = document.createElement('canvas');
  const context = canvas.getContext && canvas.getContext('2d');
  let data;
  let count = 0;
  let i = -4;

  const height = canvas.height = img.naturalHeight || img.offsetHeight || img.height;
  const width = canvas.width = img.naturalWidth || img.offsetWidth || img.width;

  context.drawImage(img, 0, 0);
  data = context.getImageData(0, 0, width, height);

  // TODO: check if Worker not is supported
  if (!window.Worker) {
    // try {
    //   data = context.getImageData(0, 0, width, height);
    // }
    // catch (err) {
    //   console.log(err)
    //   return;
    // }
  
    // data = data.data;
    // const color = {red: 0, green: 0, blue: 0};
    // const length = data.length;
    // while ((i += PIXEL_INTERVAL * 4) < length) {
    //   count++;
    //   color.red += data[i];
    //   color.green += data[i+1];
    //   color.blue += data[i+2];
    // }
  
    // color.red = Math.floor(color.red / count);
    // color.green =Math.floor(color.green / count);
    // color.blue = Math.floor(color.blue / count);
  
    // return color;
  }

  const worker = new Worker(`${window.app_url}/themes/wellmedic/js/image-processor.js`);
  worker.onmessage = function (e) {
    console.log(e.data)
  }
  worker.postMessage(data)
}

export {
  preloadImage,
  loadStyles,
  getAverageRGB
}