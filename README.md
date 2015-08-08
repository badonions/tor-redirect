# tor-redirect

Redirects TOR users browsing your site over clearweb to your onion address

Idea by [chloe](https://github.com/intchloe)

## Installation instructions

Add 

```php
include_once "tor-redirect.php";
```

to the top of all your files which should do this check.

Make sure to actually add it to the top of the file, since you cannot change location header if anything on the page has been sent to the user