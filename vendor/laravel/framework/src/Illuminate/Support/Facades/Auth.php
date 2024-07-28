<?php

namespace Illuminate\Support\Facades;

use Closure;
use Illuminate\Auth\AuthManager;
use Illuminate\Auth\SessionGuard;
use Illuminate\Auth\TokenGuard;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Cookie\QueueingFactory;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Timebox;
use Laravel\Ui\UiServiceProvider;
use RuntimeException;

/**
 * @method static Guard|StatefulGuard guard(string|null $name = null)
 * @method static SessionGuard createSessionDriver(string $name, array $config)
 * @method static TokenGuard createTokenDriver(string $name, array $config)
 * @method static string getDefaultDriver()
 * @method static void shouldUse(string $name)
 * @method static void setDefaultDriver(string $name)
 * @method static AuthManager viaRequest(string $driver, callable $callback)
 * @method static Closure userResolver()
 * @method static AuthManager resolveUsersUsing(Closure $userResolver)
 * @method static AuthManager extend(string $driver, Closure $callback)
 * @method static AuthManager provider(string $name, Closure $callback)
 * @method static bool hasResolvedGuards()
 * @method static AuthManager forgetGuards()
 * @method static AuthManager setApplication(Application $app)
 * @method static UserProvider|null createUserProvider(string|null $provider = null)
 * @method static string getDefaultUserProvider()
 * @method static bool check()
 * @method static bool guest()
 * @method static Authenticatable|null user()
 * @method static int|string|null id()
 * @method static bool validate(array $credentials = [])
 * @method static bool hasUser()
 * @method static Guard setUser(Authenticatable $user)
 * @method static bool attempt(array $credentials = [], bool $remember = false)
 * @method static bool once(array $credentials = [])
 * @method static void login(Authenticatable $user, bool $remember = false)
 * @method static Authenticatable|false loginUsingId(mixed $id, bool $remember = false)
 * @method static Authenticatable|false onceUsingId(mixed $id)
 * @method static bool viaRemember()
 * @method static void logout()
 * @method static \Symfony\Component\HttpFoundation\Response|null basic(string $field = 'email', array $extraConditions = [])
 * @method static \Symfony\Component\HttpFoundation\Response|null onceBasic(string $field = 'email', array $extraConditions = [])
 * @method static bool attemptWhen(array $credentials = [], array|callable|null $callbacks = null, bool $remember = false)
 * @method static void logoutCurrentDevice()
 * @method static Authenticatable|null logoutOtherDevices(string $password)
 * @method static void attempting(mixed $callback)
 * @method static Authenticatable getLastAttempted()
 * @method static string getName()
 * @method static string getRecallerName()
 * @method static SessionGuard setRememberDuration(int $minutes)
 * @method static QueueingFactory getCookieJar()
 * @method static void setCookieJar(QueueingFactory $cookie)
 * @method static Dispatcher getDispatcher()
 * @method static void setDispatcher(Dispatcher $events)
 * @method static \Illuminate\Contracts\Session\Session getSession()
 * @method static Authenticatable|null getUser()
 * @method static \Symfony\Component\HttpFoundation\Request getRequest()
 * @method static SessionGuard setRequest(\Symfony\Component\HttpFoundation\Request $request)
 * @method static Timebox getTimebox()
 * @method static Authenticatable authenticate()
 * @method static SessionGuard forgetUser()
 * @method static UserProvider getProvider()
 * @method static void setProvider(UserProvider $provider)
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 *
 * @see \Illuminate\Auth\AuthManager
 * @see \Illuminate\Auth\SessionGuard
 */
class Auth extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'auth';
    }

    /**
     * Register the typical authentication routes for an application.
     *
     * @param  array  $options
     * @return void
     *
     * @throws \RuntimeException
     */
    public static function routes(array $options = [])
    {
        if (! static::$app->providerIsLoaded(UiServiceProvider::class)) {
            throw new RuntimeException('In order to use the Auth::routes() method, please install the laravel/ui package.');
        }

        static::$app->make('router')->auth($options);
    }
}
