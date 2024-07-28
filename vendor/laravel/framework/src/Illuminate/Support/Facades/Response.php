<?php

namespace Illuminate\Support\Facades;

use Illuminate\Contracts\Routing\ResponseFactory as ResponseFactoryContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use SplFileInfo;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedJsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * @method static \Illuminate\Http\Response make(mixed $content = '', int $status = 200, array $headers = [])
 * @method static \Illuminate\Http\Response noContent(int $status = 204, array $headers = [])
 * @method static \Illuminate\Http\Response view(string|array $view, array $data = [], int $status = 200, array $headers = [])
 * @method static JsonResponse json(mixed $data = [], int $status = 200, array $headers = [], int $options = 0)
 * @method static JsonResponse jsonp(string $callback, mixed $data = [], int $status = 200, array $headers = [], int $options = 0)
 * @method static StreamedResponse stream(callable $callback, int $status = 200, array $headers = [])
 * @method static StreamedJsonResponse streamJson(array $data, int $status = 200, array $headers = [], int $encodingOptions = 15)
 * @method static StreamedResponse streamDownload(callable $callback, string|null $name = null, array $headers = [], string|null $disposition = 'attachment')
 * @method static BinaryFileResponse download(SplFileInfo|string $file, string|null $name = null, array $headers = [], string|null $disposition = 'attachment')
 * @method static BinaryFileResponse file(SplFileInfo|string $file, array $headers = [])
 * @method static RedirectResponse redirectTo(string $path, int $status = 302, array $headers = [], bool|null $secure = null)
 * @method static RedirectResponse redirectToRoute(string $route, mixed $parameters = [], int $status = 302, array $headers = [])
 * @method static RedirectResponse redirectToAction(array|string $action, mixed $parameters = [], int $status = 302, array $headers = [])
 * @method static RedirectResponse redirectGuest(string $path, int $status = 302, array $headers = [], bool|null $secure = null)
 * @method static RedirectResponse redirectToIntended(string $default = '/', int $status = 302, array $headers = [], bool|null $secure = null)
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 *
 * @see \Illuminate\Routing\ResponseFactory
 */
class Response extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ResponseFactoryContract::class;
    }
}
