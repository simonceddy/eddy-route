# Eddy/Route

Eddy/Route is an abstraction of [nikic/FastRoute][fastRoute].

Similarly to [League/Route][leagueRoute], this library aims to provide a friendlier API for [FastRoute][fastRoute], as well as adding a few tweaks.

It is not as feature rich as [League/Route][leagueRoute], but intends to be simple and flexible.

## Tweaks to FastRoute

Eddy/Route adds a few tweaks to FastRoute's default behaviour:

- __The default DataGenerator stores routes in an `ArrayObject` instance instead of a plain array.__
  - The idea here is to allow creating a Dispatcher instance before routes have been added, since an `ArrayObject` is passed by reference, while a plain array is copied.
  - _Note:_ __Work In Progress:__ FastRoute passes an empty array to the Dispatcher if no variable routes are set, which breaks this feature for variable routes added after the Dispatcher is created.

- __Various convenience methods.__
  - The Router object provides a number of convenience methods that wrap FastRoute's own methods. These helpers are a little less verbose than FastRoute's method names, and may be preferred.

- __PSR-15 Compliant Router__
  - Eddy/Route implements (psr/http-server-middleware) makes use of the [Middlewares/FastRoute package][fastRouteMiddleware] to allow the router to be added to any PSR-15 compliant dispatcher.
  - The Router object provides a `psr15()` method to directly access the Middlewares/FastRoute instance.

[leagueRoute]: https://route.thephpleague.com/
[fastRoute]: https://github.com/nikic/FastRoute
[fastRouteMiddleware]: https://github.com/middlewares/fast-route
