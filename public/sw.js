const staticCacheName='site-static-v0';
const dynamicCacheName='site-dynamic-v0';
const assets=[
    './',
    './index.html',
    './app.js',
    './nicepage.css',
    './jquery.js',
    './nicepage.js',
    './images/logoMedicom.PNG',
    './images/a4fd60d5dd56393a5b19c905587f3609.png',
    './images/avatar.jpg',
    './images/cbdcdba2c3d2a70b362554a6b4fd749a.jpeg',
    './images/d0f2409a14bb07103fd5e5f4164e09b3.png',
    './images/doctor.png',
    './images/f125ed13efc1086414c8efe253447cc3.png',
    './images/ff8d8bc18ea3d33187ee1aa300a5f9f7.jpeg',
    './images/MaddoxPayneQAonAI.jpg',
    './images/mexico.png',
    './images/Primer-equipo-PET-MR-en-Mexico-1.jpg',
    './images/que-avances-tecnologicos-permitieron-descubrir-la-estructura-del-adn-1024x576.webp',
    './images/usuario.png',
    './images/help.png',
    'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i',
    'https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700',
    'https://fonts.gstatic.com/s/opensans/v20/memnYaGs126MiZpBA-UFUKWyV9hmIqOjjg.woff2',
    'https://fonts.gstatic.com/s/opensans/v20/memnYaGs126MiZpBA-UFUKWyV9hvIqOjjg.woff2',
    'https://fonts.gstatic.com/s/opensans/v20/memnYaGs126MiZpBA-UFUKWyV9hnIqOjjg.woff2',
    'https://fonts.gstatic.com/s/opensans/v20/memnYaGs126MiZpBA-UFUKWyV9hoIqOjjg.woff2',
    'https://fonts.gstatic.com/s/opensans/v20/memnYaGs126MiZpBA-UFUKWyV9hkIqOjjg.woff2',
    'https://fonts.gstatic.com/s/opensans/v20/memnYaGs126MiZpBA-UFUKWyV9hlIqOjjg.woff2',
    'https://fonts.gstatic.com/s/opensans/v20/memnYaGs126MiZpBA-UFUKWyV9hrIqM.woff2',
    'https://fonts.gstatic.com/s/roboto/v27/KFOiCnqEu92Fr1Mu51QrEz0dL_nz.woff2',
    'https://fonts.gstatic.com/s/roboto/v27/KFOiCnqEu92Fr1Mu51QrEzQdL_nz.woff2',
    'https://fonts.gstatic.com/s/roboto/v27/KFOiCnqEu92Fr1Mu51QrEzwdL_nz.woff2',
    'https://fonts.gstatic.com/s/roboto/v27/KFOiCnqEu92Fr1Mu51QrEzMdL_nz.woff2',
    'https://fonts.gstatic.com/s/roboto/v27/KFOiCnqEu92Fr1Mu51QrEz8dL_nz.woff2',
    'https://fonts.gstatic.com/s/roboto/v27/KFOiCnqEu92Fr1Mu51QrEz4dL_nz.woff2',
    'https://fonts.gstatic.com/s/roboto/v27/KFOiCnqEu92Fr1Mu51QrEzAdLw.woff2',
    'https://fonts.gstatic.com/s/oswald/v36/TK3iWkUHHAIjg752FD8Ghe4.woff2',
    'https://fonts.gstatic.com/s/oswald/v36/TK3iWkUHHAIjg752HT8Ghe4.woff2',
    'https://fonts.gstatic.com/s/oswald/v36/TK3iWkUHHAIjg752Fj8Ghe4.woff2',
    'https://fonts.gstatic.com/s/oswald/v36/TK3iWkUHHAIjg752Fz8Ghe4.woff2',
    'https://fonts.gstatic.com/s/oswald/v36/TK3iWkUHHAIjg752GT8G.woff2',
    './Home.css',
    './fallback.html',
];

//cache size limit function
const limitCacheSize = (name,size)=>{
    caches.open(name).then(cache=>{
        cache.keys().then(keys=>{
            if(keys.length>size){
                cache.delete(keys[0]).then(limitCacheSize(name,size));
            }
        })
    })
};

//install service worker
self.addEventListener("install",(evt)=>{
    //console.log("Service worker install");
    evt.waitUntil(
        caches.open(staticCacheName).then(cache=>{
            console.log("Catching shell assets")
            cache.addAll(assets);
        })
    );
});

//activate service worker (activate event)
self.addEventListener("activate",(evt)=>{
    //console.log("Service worker activated");
    evt.waitUntil(
        caches.keys().then(keys=>{
            //console.log(keys);
            return Promise.all(keys
                .filter(key => key!==staticCacheName && key!==dynamicCacheName)    
                .map(key=>caches.delete(key))
            )
        })
    );
});

//fetch event 
self.addEventListener("fetch",(evt)=>{
    //console.log("Fetch event",evt);
    evt.respondWith(
        caches.match(evt.request).then(cacheRes=>{
            return cacheRes || fetch(evt.request).then(fetchRes=>{
                return caches.open(dynamicCacheName).then(cache=>{
                    cache.put(evt.request.url,fetchRes.clone());
                    limitCacheSize(dynamicCacheName,400)
                    return fetchRes;
                })
            });
        }).catch(()=> {
            if(evt.request.url.indexOf('.html') > -1){
                return caches.match('./fallback.html');
            }
        })
    );
});