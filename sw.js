(function() {
  'use strict';

  var filesToCache = [
  '.',  
  'assets/css/bootstrap.css',
  'assets/css/font-awesome.css',
  'assets/css/style.css',
  'assets/js/bootstrap.min.js',
  'assets/js/jquery-1.11.1.min.js',
  'offline/',
  '404/',
  'sw.js',
  'sekrip.js'
  ];

  var cacheName = 'twm-cache-v1';

  self.addEventListener('install', function(event) {
    console.log('Attempting to install service worker and cache static assets');
    event.waitUntil(
      caches.open(cacheName)
      .then(function(cache) {
        return cache.addAll(filesToCache);
      })
      );
    self.skipWaiting();
  });

  self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.open(cacheName).then(function(cache) {
        return cache.match(event.request).then(function(response) {
          var fetchPromise = fetch(event.request).then(function(networkResponse) {
            cache.put(event.request, networkResponse.clone());
            return networkResponse;
          })
          return response || fetchPromise;
        }).catch(function(error) {
            // offline page
            return caches.match('offline/');
          })
      })
      );
  });   
})();