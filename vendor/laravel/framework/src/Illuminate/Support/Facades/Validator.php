<?php

namespace Illuminate\Support\Facades;

use Closure;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Validation\Factory;
use Illuminate\Validation\PresenceVerifierInterface;

/**
 * @method static \Illuminate\Validation\Validator make(array $data, array $rules, array $messages = [], array $attributes = [])
 * @method static array validate(array $data, array $rules, array $messages = [], array $attributes = [])
 * @method static void extend(string $rule, Closure|string $extension, string|null $message = null)
 * @method static void extendImplicit(string $rule, Closure|string $extension, string|null $message = null)
 * @method static void extendDependent(string $rule, Closure|string $extension, string|null $message = null)
 * @method static void replacer(string $rule, Closure|string $replacer)
 * @method static void includeUnvalidatedArrayKeys()
 * @method static void excludeUnvalidatedArrayKeys()
 * @method static void resolver(Closure $resolver)
 * @method static Translator getTranslator()
 * @method static PresenceVerifierInterface getPresenceVerifier()
 * @method static void setPresenceVerifier(PresenceVerifierInterface $presenceVerifier)
 * @method static Container|null getContainer()
 * @method static Factory setContainer(Container $container)
 *
 * @see \Illuminate\Validation\Factory
 */
class Validator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'validator';
    }
}
