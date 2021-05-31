//install service worker
self.addEventListener("install",(evt)=>{
    console.log("Service worker install");
});

//activate service worker (activate event)
self.addEventListener("activate",(evt)=>{
    console.log("Service worker activated");
});

//fetch event 
self.addEventListener("fetch",(evt)=>{
    //console.log("Fetch event",evt);
})