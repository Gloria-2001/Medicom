//Check if the browser supports the Service Worker
if('serviceWorker' in navigator){
    navigator.serviceWorker.register("sw.js") //returns a promise 
        .then((reg)=>console.log("service worker registered"))  //success
        .catch((err)=>console.log("service worker NOT registered"))  //fail
}