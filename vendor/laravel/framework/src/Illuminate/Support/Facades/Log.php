<?php

namespace Illuminate\Support\Facades;

use Closure;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Log\Logger;
use Illuminate\Log\LogManager;
use Illuminate\Support\Stringable;
use Psr\Log\LoggerInterface;

/**
 * @method static LoggerInterface build(array $config)
 * @method static LoggerInterface stack(array $channels, string|null $channel = null)
 * @method static LoggerInterface channel(string|null $channel = null)
 * @method static LoggerInterface driver(string|null $driver = null)
 * @method static LogManager shareContext(array $context)
 * @method static array sharedContext()
 * @method static LogManager withoutContext()
 * @method static LogManager flushSharedContext()
 * @method static string|null getDefaultDriver()
 * @method static void setDefaultDriver(string $name)
 * @method static LogManager extend(string $driver, Closure $callback)
 * @method static void forgetChannel(string|null $driver = null)
 * @method static array getChannels()
 * @method static void emergency(string|\Stringable $message, array $context = [])
 * @method static void alert(string|\Stringable $message, array $context = [])
 * @method static void critical(string|\Stringable $message, array $context = [])
 * @method static void error(string|\Stringable $message, array $context = [])
 * @method static void warning(string|\Stringable $message, array $context = [])
 * @method static void notice(string|\Stringable $message, array $context = [])
 * @method static void info(string|\Stringable $message, array $context = [])
 * @method static void debug(string|\Stringable $message, array $context = [])
 * @method static void log(mixed $level, string|\Stringable $message, array $context = [])
 * @method static LogManager setApplication(Application $app)
 * @method static void write(string $level, Arrayable|Jsonable|Stringable|array|string $message, array $context = [])
 * @method static Logger withContext(array $context = [])
 * @method static void listen(Closure $callback)
 * @method static LoggerInterface getLogger()
 * @method static Dispatcher getEventDispatcher()
 * @method static void setEventDispatcher(Dispatcher $dispatcher)
 * @method static Logger|mixed when(Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
 * @method static Logger|mixed unless(Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
 *
 * @see \Illuminate\Log\LogManager
 */
class Log extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'log';
    }
}
