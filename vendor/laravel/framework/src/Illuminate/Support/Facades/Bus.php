<?php

namespace Illuminate\Support\Facades;

use Closure;
use Illuminate\Bus\Batch;
use Illuminate\Bus\BatchRepository;
use Illuminate\Bus\Dispatcher;
use Illuminate\Bus\PendingBatch;
use Illuminate\Contracts\Bus\Dispatcher as BusDispatcherContract;
use Illuminate\Foundation\Bus\PendingChain;
use Illuminate\Support\Collection;
use Illuminate\Support\Testing\Fakes\BusFake;
use Illuminate\Support\Testing\Fakes\ChainedBatchTruthTest;

/**
 * @method static mixed dispatch(mixed $command)
 * @method static mixed dispatchSync(mixed $command, mixed $handler = null)
 * @method static mixed dispatchNow(mixed $command, mixed $handler = null)
 * @method static Batch|null findBatch(string $batchId)
 * @method static PendingBatch batch(Collection|array|mixed $jobs)
 * @method static PendingChain chain(Collection|array $jobs)
 * @method static bool hasCommandHandler(mixed $command)
 * @method static bool|mixed getCommandHandler(mixed $command)
 * @method static mixed dispatchToQueue(mixed $command)
 * @method static void dispatchAfterResponse(mixed $command, mixed $handler = null)
 * @method static Dispatcher pipeThrough(array $pipes)
 * @method static Dispatcher map(array $map)
 * @method static BusFake except(array|string $jobsToDispatch)
 * @method static void assertDispatched(string|Closure $command, callable|int|null $callback = null)
 * @method static void assertDispatchedTimes(string|Closure $command, int $times = 1)
 * @method static void assertNotDispatched(string|Closure $command, callable|null $callback = null)
 * @method static void assertNothingDispatched()
 * @method static void assertDispatchedSync(string|Closure $command, callable|int|null $callback = null)
 * @method static void assertDispatchedSyncTimes(string|Closure $command, int $times = 1)
 * @method static void assertNotDispatchedSync(string|Closure $command, callable|null $callback = null)
 * @method static void assertDispatchedAfterResponse(string|Closure $command, callable|int|null $callback = null)
 * @method static void assertDispatchedAfterResponseTimes(string|Closure $command, int $times = 1)
 * @method static void assertNotDispatchedAfterResponse(string|Closure $command, callable|null $callback = null)
 * @method static void assertChained(array $expectedChain)
 * @method static void assertDispatchedWithoutChain(string|Closure $command, callable|null $callback = null)
 * @method static ChainedBatchTruthTest chainedBatch(Closure $callback)
 * @method static void assertBatched(callable $callback)
 * @method static void assertBatchCount(int $count)
 * @method static void assertNothingBatched()
 * @method static Collection dispatched(string $command, callable|null $callback = null)
 * @method static Collection dispatchedSync(string $command, callable|null $callback = null)
 * @method static Collection dispatchedAfterResponse(string $command, callable|null $callback = null)
 * @method static Collection batched(callable $callback)
 * @method static bool hasDispatched(string $command)
 * @method static bool hasDispatchedSync(string $command)
 * @method static bool hasDispatchedAfterResponse(string $command)
 * @method static Batch dispatchFakeBatch(string $name = '')
 * @method static Batch recordPendingBatch(PendingBatch $pendingBatch)
 * @method static BusFake serializeAndRestore(bool $serializeAndRestore = true)
 * @method static array dispatchedBatches()
 *
 * @see \Illuminate\Bus\Dispatcher
 * @see \Illuminate\Support\Testing\Fakes\BusFake
 */
class Bus extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @param  array|string  $jobsToFake
     * @param  \Illuminate\Bus\BatchRepository|null  $batchRepository
     * @return \Illuminate\Support\Testing\Fakes\BusFake
     */
    public static function fake($jobsToFake = [], ?BatchRepository $batchRepository = null)
    {
        $actualDispatcher = static::isFake()
                ? static::getFacadeRoot()->dispatcher
                : static::getFacadeRoot();

        return tap(new BusFake($actualDispatcher, $jobsToFake, $batchRepository), function ($fake) {
            static::swap($fake);
        });
    }

    /**
     * Dispatch the given chain of jobs.
     *
     * @param  array|mixed  $jobs
     * @return \Illuminate\Foundation\Bus\PendingDispatch
     */
    public static function dispatchChain($jobs)
    {
        $jobs = is_array($jobs) ? $jobs : func_get_args();

        return (new PendingChain(array_shift($jobs), $jobs))
                    ->dispatch();
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BusDispatcherContract::class;
    }
}
