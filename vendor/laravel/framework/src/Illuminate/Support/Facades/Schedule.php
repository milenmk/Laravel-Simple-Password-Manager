<?php

namespace Illuminate\Support\Facades;

use DateTimeInterface;
use Illuminate\Console\Scheduling\CallbackEvent;
use Illuminate\Console\Scheduling\Schedule as ConsoleSchedule;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Collection;

/**
 * @method static CallbackEvent call(string|callable $callback, array $parameters = [])
 * @method static \Illuminate\Console\Scheduling\Event command(string $command, array $parameters = [])
 * @method static CallbackEvent job(object|string $job, string|null $queue = null, string|null $connection = null)
 * @method static \Illuminate\Console\Scheduling\Event exec(string $command, array $parameters = [])
 * @method static string compileArrayInput(string|int $key, array $value)
 * @method static bool serverShouldRun(\Illuminate\Console\Scheduling\Event $event, DateTimeInterface $time)
 * @method static Collection dueEvents(Application $app)
 * @method static \Illuminate\Console\Scheduling\Event[] events()
 * @method static ConsoleSchedule useCache(string $store)
 * @method static void macro(string $name, object|callable $macro)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 *
 * @see \Illuminate\Console\Scheduling\Schedule
 */
class Schedule extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ConsoleSchedule::class;
    }
}
