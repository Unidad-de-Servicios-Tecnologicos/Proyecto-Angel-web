
const useFetch = async ({
  url,
  method = 'GET',
  getJson,
  ...fetchBody
}) => {

  let request = {};
  let result = {};
  let hasError = false;
  let error = "";


  try {
    request = await fetch(url, {
      method,
      ...fetchBody
    })

    if (getJson && request.ok) {
      result = await request?.json()
    }
  }
  catch (e) {
    hasError = true
    error = e.message
  }

  return {
    result,
    request,
    hasError,
    error
  }
}

export default useFetch;