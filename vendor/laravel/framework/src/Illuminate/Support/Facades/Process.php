<?php

namespace Illuminate\Support\Facades;

use Closure;
use Illuminate\Contracts\Process\ProcessResult;
use Illuminate\Process\Factory;
use Illuminate\Process\FakeProcessDescription;
use Illuminate\Process\FakeProcessResult;
use Illuminate\Process\FakeProcessSequence;
use Illuminate\Process\InvokedProcess;
use Illuminate\Process\PendingProcess;
use Illuminate\Process\Pool;
use Illuminate\Process\ProcessPoolResults;
use Traversable;

/**
 * @method static PendingProcess command(array|string $command)
 * @method static PendingProcess path(string $path)
 * @method static PendingProcess timeout(int $timeout)
 * @method static PendingProcess idleTimeout(int $timeout)
 * @method static PendingProcess forever()
 * @method static PendingProcess env(array $environment)
 * @method static PendingProcess input(Traversable|resource|string|int|float|bool|null $input)
 * @method static PendingProcess quietly()
 * @method static PendingProcess tty(bool $tty = true)
 * @method static PendingProcess options(array $options)
 * @method static ProcessResult run(array|string|null $command = null, callable|null $output = null)
 * @method static InvokedProcess start(array|string|null $command = null, callable|null $output = null)
 * @method static PendingProcess withFakeHandlers(array $fakeHandlers)
 * @method static PendingProcess|mixed when(Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
 * @method static PendingProcess|mixed unless(Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
 * @method static FakeProcessResult result(array|string $output = '', array|string $errorOutput = '', int $exitCode = 0)
 * @method static FakeProcessDescription describe()
 * @method static FakeProcessSequence sequence(array $processes = [])
 * @method static bool isRecording()
 * @method static Factory recordIfRecording(PendingProcess $process, ProcessResult $result)
 * @method static Factory record(PendingProcess $process, ProcessResult $result)
 * @method static Factory preventStrayProcesses(bool $prevent = true)
 * @method static bool preventingStrayProcesses()
 * @method static Factory assertRan(Closure|string $callback)
 * @method static Factory assertRanTimes(Closure|string $callback, int $times = 1)
 * @method static Factory assertNotRan(Closure|string $callback)
 * @method static Factory assertDidntRun(Closure|string $callback)
 * @method static Factory assertNothingRan()
 * @method static Pool pool(callable $callback)
 * @method static ProcessResult pipe(callable|array $callback, callable|null $output = null)
 * @method static ProcessPoolResults concurrently(callable $callback, callable|null $output = null)
 * @method static PendingProcess newPendingProcess()
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 * @method static mixed macroCall(string $method, array $parameters)
 *
 * @see \Illuminate\Process\PendingProcess
 * @see \Illuminate\Process\Factory
 */
class Process extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Factory::class;
    }

    /**
     * Indicate that the process factory should fake processes.
     *
     * @param  \Closure|array|null  $callback
     * @return \Illuminate\Process\Factory
     */
    public static function fake(Closure|array|null $callback = null)
    {
        return tap(static::getFacadeRoot(), function ($fake) use ($callback) {
            static::swap($fake->fake($callback));
        });
    }
}
