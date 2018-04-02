onmessage = e => {
  const workerResult = e.data;
  // calculate stuff
  console.log(workerResult);
  postMessage('message received.');
}