export const  getBaseURL = (url) =>{
    // Use new URL object for reliable parsing
    const parsedURL = new URL(url);
    // Return the origin (protocol + hostname + port, if specified)
    return parsedURL.origin;
  }
