<?php

namespace Illuminate\Support\Facades;

use Closure;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Redis\Connections\Connection;
use Illuminate\Redis\Limiters\ConcurrencyLimiterBuilder;
use Illuminate\Redis\Limiters\DurationLimiterBuilder;
use Illuminate\Redis\RedisManager;

/**
 * @method static Connection connection(string|null $name = null)
 * @method static Connection resolve(string|null $name = null)
 * @method static array connections()
 * @method static void enableEvents()
 * @method static void disableEvents()
 * @method static void setDriver(string $driver)
 * @method static void purge(string|null $name = null)
 * @method static RedisManager extend(string $driver, Closure $callback)
 * @method static void createSubscription(array|string $channels, Closure $callback, string $method = 'subscribe')
 * @method static ConcurrencyLimiterBuilder funnel(string $name)
 * @method static DurationLimiterBuilder throttle(string $name)
 * @method static mixed client()
 * @method static void subscribe(array|string $channels, Closure $callback)
 * @method static void psubscribe(array|string $channels, Closure $callback)
 * @method static mixed command(string $method, array $parameters = [])
 * @method static void listen(Closure $callback)
 * @method static string|null getName()
 * @method static Connection setName(string $name)
 * @method static Dispatcher getEventDispatcher()
 * @method static void setEventDispatcher(Dispatcher $events)
 * @method static void unsetEventDispatcher()
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 * @method static mixed macroCall(string $method, array $parameters)
 *
 * @see \Illuminate\Redis\RedisManager
 */
class Redis extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'redis';
    }
}
