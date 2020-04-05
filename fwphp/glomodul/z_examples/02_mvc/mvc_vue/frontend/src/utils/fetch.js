import axios from 'axios';

export function fetch(options) {
  return new Promise((resolve, reject) => {
    const instance = axios.create({
      timeout: 30000
    })
    instance(options)
      .then(response => {
        const res = response.data
        resolve(res)
      })
      .catch(error => {
        console.log(error)
        reject(error)
      })
  });
};
