self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open('twm-static').then(function(cache) {
      return cache.addAll([
        '.'
        './sw.js'
        '/assets/css/bootsrap.css',
        '/assets/css/font-awesome',
        '/assets/css/style.css',
        '/assets/js/bootsrap.min.js',
        '/assets/js/jquery-1.11.1.min.js'   
        ]);
    })
    );
});