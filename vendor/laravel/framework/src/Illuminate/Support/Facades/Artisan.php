<?php

namespace Illuminate\Support\Facades;

use Carbon\CarbonInterval;
use Closure;
use DateTimeInterface;
use Illuminate\Console\Application;
use Illuminate\Contracts\Console\Kernel as ConsoleKernelContract;
use Illuminate\Foundation\Bus\PendingDispatch;
use Illuminate\Foundation\Console\ClosureCommand;
use Illuminate\Foundation\Console\Kernel;
use Illuminate\Support\Carbon;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method static int handle(InputInterface $input, OutputInterface|null $output = null)
 * @method static void terminate(InputInterface $input, int $status)
 * @method static void whenCommandLifecycleIsLongerThan(DateTimeInterface|CarbonInterval|float|int $threshold, callable $handler)
 * @method static Carbon|null commandStartedAt()
 * @method static \Illuminate\Console\Scheduling\Schedule resolveConsoleSchedule()
 * @method static ClosureCommand command(string $signature, Closure $callback)
 * @method static void registerCommand(Command $command)
 * @method static int call(string $command, array $parameters = [], OutputInterface|null $outputBuffer = null)
 * @method static PendingDispatch queue(string $command, array $parameters = [])
 * @method static array all()
 * @method static string output()
 * @method static void bootstrap()
 * @method static void bootstrapWithoutBootingProviders()
 * @method static void setArtisan(Application|null $artisan)
 * @method static Kernel addCommands(array $commands)
 * @method static Kernel addCommandPaths(array $paths)
 * @method static Kernel addCommandRoutePaths(array $paths)
 *
 * @see \Illuminate\Foundation\Console\Kernel
 */
class Artisan extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ConsoleKernelContract::class;
    }
}
