<?php

namespace Illuminate\Support\Facades;

use Closure;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Foundation\Exceptions\ReportableHandler;
use Illuminate\Support\Arr;
use Illuminate\Support\Testing\Fakes\ExceptionHandlerFake;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

/**
 * @method static void register()
 * @method static ReportableHandler reportable(callable $reportUsing)
 * @method static Handler renderable(callable $renderUsing)
 * @method static Handler map(Closure|string $from, Closure|string|null $to = null)
 * @method static Handler dontReport(array|string $exceptions)
 * @method static Handler ignore(array|string $exceptions)
 * @method static Handler dontFlash(array|string $attributes)
 * @method static Handler level(string $type, void $level)
 * @method static void report(Throwable $e)
 * @method static bool shouldReport(Throwable $e)
 * @method static Handler throttleUsing(callable $throttleUsing)
 * @method static Handler stopIgnoring(array|string $exceptions)
 * @method static Handler buildContextUsing(Closure $contextCallback)
 * @method static \Symfony\Component\HttpFoundation\Response render(\Illuminate\Http\Request $request, Throwable $e)
 * @method static Handler respondUsing(callable $callback)
 * @method static Handler shouldRenderJsonWhen(callable $callback)
 * @method static Handler dontReportDuplicates()
 * @method static ExceptionHandler handler()
 * @method static void assertNothingReported()
 * @method static void assertReported(Closure|string $exception)
 * @method static void assertReportedCount(int $count)
 * @method static void assertNotReported(Closure|string $exception)
 * @method static void renderForConsole(OutputInterface $output, Throwable $e)
 * @method static ExceptionHandlerFake throwFirstReported()
 * @method static ExceptionHandlerFake setHandler(ExceptionHandler $handler)
 *
 * @see \Illuminate\Foundation\Exceptions\Handler
 * @see \Illuminate\Contracts\Debug\ExceptionHandler
 * @see \Illuminate\Support\Testing\Fakes\ExceptionHandlerFake
 */
class Exceptions extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @param  array<int, class-string<\Throwable>>|class-string<\Throwable>  $exceptions
     * @return \Illuminate\Support\Testing\Fakes\ExceptionHandlerFake
     */
    public static function fake(array|string $exceptions = [])
    {
        $exceptionHandler = static::isFake()
            ? static::getFacadeRoot()->handler()
            : static::getFacadeRoot();

        return tap(new ExceptionHandlerFake($exceptionHandler, Arr::wrap($exceptions)), function ($fake) {
            static::swap($fake);
        });
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ExceptionHandler::class;
    }
}
