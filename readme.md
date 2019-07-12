# Eddy/Route

Eddy/Route is an abstraction of [nikic/FastRoute](https://github.com/nikic/FastRoute).

Similarly to [League/Route](https://route.thephpleague.com/), this library aims to provide a friendlier API for [FastRoute](https://github.com/nikic/FastRoute), as well as adding a few tweaks.

It is not as feature rich as [League/Route](https://route.thephpleague.com/), but intends to be simple and flexible.

## Tweaks to FastRoute

Eddy/Route adds a few tweaks to FastRoute's default behaviour:

- __Routes are stored in an `ArrayObject` instance instead of a plain array.__
  - The idea here is to allow creating a Dispatcher instance before routes have been added, since an `ArrayObject` is passed by reference, while a plain array is copied.

- __Various convenience methods.__
  - The `Router` object provides a number of convenience methods that wrap FastRoute's own methods. These helpers are less verbose than FastRoute's method names, and may be preferred.
