var staticCacheName = "cache-static";
var inmutableCacheName = "cache-inmutable";

const APP_SHELL = [
    '/images/icons/icon-72.png',
    '/images/icons/icon-96.png',
    '/images/icons/icon-128.png',
    '/images/icons/icon-192.png',
    '/images/icons/icon-384.png',
    '/images/icons/icon-512.png',
];

const APP_SHELL_INMUTABLE = [
    'https://fonts.googleapis.com/icon?family=Material+Icons',
    'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css',
    'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js',
    '/offline',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    const cacheStatic = caches.open(staticCacheName)
        .then(cache => {
            return cache.addAll(APP_SHELL);
        })

    const cacheInmutable = caches.open(inmutableCacheName)
        .then(cache => {
            return cache.addAll(APP_SHELL_INMUTABLE);
        })

    event.waitUntil(Promise.all([cacheStatic,cacheInmutable]))
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("cache-")))
                    .filter(cacheName => (cacheName !== inmutableCacheName && cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

self.addEventListener('fetch', event => {
    const cacheName = 'cache-dyna-' + event.request.url.pathname; 
    event.respondWith(
      fetch(event.request)
        .then(responseFromNetwork => {
          return caches.open(cacheName)
            .then(cache => {
              cache.put(event.request, responseFromNetwork.clone());
              return responseFromNetwork;
            })
            .catch(() => {
              return responseFromNetwork;
            });
        })
        .catch(() => {
          return caches.open(cacheName)
            .then(cache => {
              return cache.match(event.request)
                .then(responseFromCache => {
                  return responseFromCache || fetch(event.request)
                    .then(responseFromNetwork => {
                      cache.put(event.request, responseFromNetwork.clone());
                      return responseFromNetwork;
                    });
                });
            })
            .catch(() => {
                return caches.match('offline');
              // Si ni la red ni la caché dinámica están disponibles, puedes responder con una página "offline" o un recurso predeterminado
            });
        })
    );
  });
  
  
