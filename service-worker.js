/**
 * Service Worker for Chinese Dictionary PWA
 * Provides offline support and caching
 */

const CACHE_NAME = 'chinese-dict-v1';
const RUNTIME_CACHE = 'chinese-dict-runtime-v1';

// Files to cache immediately on install
const CORE_ASSETS = [
  './',
  './index.php',
  './search-worker.js'
];

// Install event - cache core assets
self.addEventListener('install', (event) => {
  console.log('[ServiceWorker] Installing...');

  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => {
        console.log('[ServiceWorker] Caching core assets');
        return cache.addAll(CORE_ASSETS);
      })
      .then(() => {
        console.log('[ServiceWorker] Core assets cached');
        return self.skipWaiting(); // Activate immediately
      })
  );
});

// Activate event - clean up old caches
self.addEventListener('activate', (event) => {
  console.log('[ServiceWorker] Activating...');

  event.waitUntil(
    caches.keys()
      .then((cacheNames) => {
        return Promise.all(
          cacheNames.map((cacheName) => {
            if (cacheName !== CACHE_NAME && cacheName !== RUNTIME_CACHE) {
              console.log('[ServiceWorker] Deleting old cache:', cacheName);
              return caches.delete(cacheName);
            }
          })
        );
      })
      .then(() => {
        console.log('[ServiceWorker] Claiming clients');
        return self.clients.claim(); // Take control immediately
      })
  );
});

// Fetch event - serve from cache when available, fetch otherwise
self.addEventListener('fetch', (event) => {
  const { request } = event;
  const url = new URL(request.url);

  // Skip cross-origin requests
  if (url.origin !== location.origin) {
    return;
  }

  // For dictionary chunks, use network-first strategy (always try to get latest)
  if (url.pathname.includes('/dict_chunks/')) {
    event.respondWith(networkFirstStrategy(request));
    return;
  }

  // For main app files, use cache-first strategy
  event.respondWith(cacheFirstStrategy(request));
});

/**
 * Cache-first strategy: Check cache first, fallback to network
 * Good for static assets that don't change often
 */
async function cacheFirstStrategy(request) {
  const cache = await caches.open(CACHE_NAME);
  const cached = await cache.match(request);

  if (cached) {
    return cached;
  }

  try {
    const response = await fetch(request);

    // Cache successful responses
    if (response.ok) {
      cache.put(request, response.clone());
    }

    return response;
  } catch (error) {
    console.error('[ServiceWorker] Fetch failed:', error);

    // Return offline page or error response
    return new Response('Offline - please check your connection', {
      status: 503,
      statusText: 'Service Unavailable',
      headers: new Headers({
        'Content-Type': 'text/plain'
      })
    });
  }
}

/**
 * Network-first strategy: Try network first, fallback to cache
 * Good for dynamic content that changes frequently
 */
async function networkFirstStrategy(request) {
  const cache = await caches.open(RUNTIME_CACHE);

  try {
    const response = await fetch(request);

    // Cache successful responses
    if (response.ok) {
      cache.put(request, response.clone());
    }

    return response;
  } catch (error) {
    console.error('[ServiceWorker] Network fetch failed, using cache:', error);

    const cached = await cache.match(request);
    if (cached) {
      return cached;
    }

    return new Response('Offline and not cached', {
      status: 503,
      statusText: 'Service Unavailable',
      headers: new Headers({
        'Content-Type': 'text/plain'
      })
    });
  }
}

// Handle messages from clients
self.addEventListener('message', (event) => {
  if (event.data && event.data.type === 'SKIP_WAITING') {
    self.skipWaiting();
  }

  if (event.data && event.data.type === 'CACHE_URLS') {
    const { urls } = event.data;
    event.waitUntil(
      caches.open(RUNTIME_CACHE)
        .then((cache) => cache.addAll(urls))
    );
  }
});
