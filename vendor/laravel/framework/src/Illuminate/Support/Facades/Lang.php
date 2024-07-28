<?php

namespace Illuminate\Support\Facades;

use Countable;
use Illuminate\Contracts\Translation\Loader;
use Illuminate\Translation\MessageSelector;
use Illuminate\Translation\Translator;

/**
 * @method static bool hasForLocale(string $key, string|null $locale = null)
 * @method static bool has(string $key, string|null $locale = null, bool $fallback = true)
 * @method static string|array get(string $key, array $replace = [], string|null $locale = null, bool $fallback = true)
 * @method static string choice(string $key, Countable|int|float|array $number, array $replace = [], string|null $locale = null)
 * @method static void addLines(array $lines, string $locale, string $namespace = '*')
 * @method static void load(string $namespace, string $group, string $locale)
 * @method static Translator handleMissingKeysUsing(callable|null $callback)
 * @method static void addNamespace(string $namespace, string $hint)
 * @method static void addJsonPath(string $path)
 * @method static array parseKey(string $key)
 * @method static void determineLocalesUsing(callable $callback)
 * @method static MessageSelector getSelector()
 * @method static void setSelector(MessageSelector $selector)
 * @method static Loader getLoader()
 * @method static string locale()
 * @method static string getLocale()
 * @method static void setLocale(string $locale)
 * @method static string getFallback()
 * @method static void setFallback(string $fallback)
 * @method static void setLoaded(array $loaded)
 * @method static void stringable(callable|string $class, callable|null $handler = null)
 * @method static void setParsedKey(string $key, array $parsed)
 * @method static void flushParsedKeys()
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 *
 * @see \Illuminate\Translation\Translator
 */
class Lang extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'translator';
    }
}
