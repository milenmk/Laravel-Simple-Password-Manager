<?php

namespace Illuminate\Support\Facades;

use Ably\AblyRest;
use Closure;
use Illuminate\Broadcasting\AnonymousEvent;
use Illuminate\Broadcasting\Broadcasters\Broadcaster;
use Illuminate\Broadcasting\BroadcastManager;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PendingBroadcast;
use Illuminate\Contracts\Broadcasting\Factory as BroadcastingFactoryContract;
use Illuminate\Contracts\Broadcasting\HasBroadcastChannel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Collection;
use Pusher\Pusher;

/**
 * @method static void routes(array|null $attributes = null)
 * @method static void userRoutes(array|null $attributes = null)
 * @method static void channelRoutes(array|null $attributes = null)
 * @method static string|null socket(\Illuminate\Http\Request|null $request = null)
 * @method static AnonymousEvent on(Channel|array|string $channels)
 * @method static AnonymousEvent private(string $channel)
 * @method static AnonymousEvent presence(string $channel)
 * @method static PendingBroadcast event(mixed|null $event = null)
 * @method static void queue(mixed $event)
 * @method static mixed connection(string|null $driver = null)
 * @method static mixed driver(string|null $name = null)
 * @method static Pusher pusher(array $config)
 * @method static AblyRest ably(array $config)
 * @method static string getDefaultDriver()
 * @method static void setDefaultDriver(string $name)
 * @method static void purge(string|null $name = null)
 * @method static BroadcastManager extend(string $driver, Closure $callback)
 * @method static Application getApplication()
 * @method static BroadcastManager setApplication(Application $app)
 * @method static BroadcastManager forgetDrivers()
 * @method static mixed auth(\Illuminate\Http\Request $request)
 * @method static mixed validAuthenticationResponse(\Illuminate\Http\Request $request, mixed $result)
 * @method static void broadcast(array $channels, string $event, array $payload = [])
 * @method static array|null resolveAuthenticatedUser(\Illuminate\Http\Request $request)
 * @method static void resolveAuthenticatedUserUsing(Closure $callback)
 * @method static Broadcaster channel(HasBroadcastChannel|string $channel, callable|string $callback, array $options = [])
 * @method static Collection getChannels()
 *
 * @see \Illuminate\Broadcasting\BroadcastManager
 * @see \Illuminate\Broadcasting\Broadcasters\Broadcaster
 */
class Broadcast extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BroadcastingFactoryContract::class;
    }
}
