# Introduction
#### Implemented performance improvement for Magento.

- Preload https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/rel/preload
- Prefetch https://developer.mozilla.org/en-US/docs/Glossary/Prefetch
- Preconnect https://developer.chrome.com/en/docs/lighthouse/performance/uses-rel-preconnect
- Lazy loading https://developer.mozilla.org/en-US/docs/Web/Performance/Lazy_loading
- Server Push https://www.smashingmagazine.com/2017/04/guide-http2-server-push

All these concepts were implemented in the pages through a plugin in HttpResponse. We search via regex in the html of the pages and implement the concepts mentioned above.

For preconnect you might add new external links as needed in **Stores > Configuration > The IT Nerd > Performance > Additional Preconnect Entries**. By default we added these url's with preconnect:
- https://fonts.gstatic.com
- https://fonts.googleapis.com

For Server push you might add new resources as needed in **Stores > Configuration > The IT Nerd > Performance > Server Push > Aditional Images**.
