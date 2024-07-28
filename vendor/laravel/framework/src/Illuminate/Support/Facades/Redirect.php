<?php

namespace Illuminate\Support\Facades;

use DateInterval;
use DateTimeInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Session\Store;

/**
 * @method static RedirectResponse back(int $status = 302, array $headers = [], mixed $fallback = false)
 * @method static RedirectResponse refresh(int $status = 302, array $headers = [])
 * @method static RedirectResponse guest(string $path, int $status = 302, array $headers = [], bool|null $secure = null)
 * @method static RedirectResponse intended(mixed $default = '/', int $status = 302, array $headers = [], bool|null $secure = null)
 * @method static RedirectResponse to(string $path, int $status = 302, array $headers = [], bool|null $secure = null)
 * @method static RedirectResponse away(string $path, int $status = 302, array $headers = [])
 * @method static RedirectResponse secure(string $path, int $status = 302, array $headers = [])
 * @method static RedirectResponse route(string $route, mixed $parameters = [], int $status = 302, array $headers = [])
 * @method static RedirectResponse signedRoute(string $route, mixed $parameters = [], DateTimeInterface|DateInterval|int|null $expiration = null, int $status = 302, array $headers = [])
 * @method static RedirectResponse temporarySignedRoute(string $route, DateTimeInterface|DateInterval|int|null $expiration, mixed $parameters = [], int $status = 302, array $headers = [])
 * @method static RedirectResponse action(string|array $action, mixed $parameters = [], int $status = 302, array $headers = [])
 * @method static UrlGenerator getUrlGenerator()
 * @method static void setSession(Store $session)
 * @method static string|null getIntendedUrl()
 * @method static Redirector setIntendedUrl(string $url)
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 *
 * @see \Illuminate\Routing\Redirector
 */
class Redirect extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'redirect';
    }
}
