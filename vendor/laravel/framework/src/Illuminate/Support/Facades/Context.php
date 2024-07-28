<?php

namespace Illuminate\Support\Facades;

use Closure;
use Illuminate\Contracts\Database\ModelIdentifier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Log\Context\Repository;

/**
 * @method static bool has(string $key)
 * @method static bool hasHidden(string $key)
 * @method static array all()
 * @method static array allHidden()
 * @method static mixed get(string $key, mixed $default = null)
 * @method static mixed getHidden(string $key, mixed $default = null)
 * @method static mixed pull(string $key, mixed $default = null)
 * @method static mixed pullHidden(string $key, mixed $default = null)
 * @method static array only(array $keys)
 * @method static array onlyHidden(array $keys)
 * @method static Repository add(string|array $key, mixed $value = null)
 * @method static Repository addHidden(string|array $key, mixed $value = null)
 * @method static Repository forget(string|array $key)
 * @method static Repository forgetHidden(string|array $key)
 * @method static Repository addIf(string $key, mixed $value)
 * @method static Repository addHiddenIf(string $key, mixed $value)
 * @method static Repository push(string $key, mixed ...$values)
 * @method static Repository pushHidden(string $key, mixed ...$values)
 * @method static bool isEmpty()
 * @method static Repository dehydrating(callable $callback)
 * @method static Repository hydrated(callable $callback)
 * @method static Repository handleUnserializeExceptionsUsing(callable|null $callback)
 * @method static Repository flush()
 * @method static Repository|mixed when(Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
 * @method static Repository|mixed unless(Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 * @method static Model restoreModel(ModelIdentifier $value)
 *
 * @see \Illuminate\Log\Context\Repository
 */
class Context extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Repository::class;
    }
}
