<?php

namespace Illuminate\Support\Facades;

use Closure;
use DateInterval;
use DateTimeInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Contracts\Queue\Factory;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\MailManager;
use Illuminate\Mail\PendingMail;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Collection;
use Illuminate\Support\Testing\Fakes\MailFake;
use Symfony\Component\Mailer\Transport\TransportInterface;

/**
 * @method static \Illuminate\Contracts\Mail\Mailer mailer(string|null $name = null)
 * @method static Mailer driver(string|null $driver = null)
 * @method static TransportInterface createSymfonyTransport(array $config)
 * @method static string getDefaultDriver()
 * @method static void setDefaultDriver(string $name)
 * @method static void purge(string|null $name = null)
 * @method static MailManager extend(string $driver, Closure $callback)
 * @method static Application getApplication()
 * @method static MailManager setApplication(Application $app)
 * @method static MailManager forgetMailers()
 * @method static void alwaysFrom(string $address, string|null $name = null)
 * @method static void alwaysReplyTo(string $address, string|null $name = null)
 * @method static void alwaysReturnPath(string $address)
 * @method static void alwaysTo(string $address, string|null $name = null)
 * @method static PendingMail to(mixed $users, string|null $name = null)
 * @method static PendingMail cc(mixed $users, string|null $name = null)
 * @method static PendingMail bcc(mixed $users, string|null $name = null)
 * @method static SentMessage|null html(string $html, mixed $callback)
 * @method static SentMessage|null raw(string $text, mixed $callback)
 * @method static SentMessage|null plain(string $view, array $data, mixed $callback)
 * @method static string render(string|array $view, array $data = [])
 * @method static SentMessage|null send(Mailable|string|array $view, array $data = [], Closure|string|null $callback = null)
 * @method static SentMessage|null sendNow(Mailable|string|array $mailable, array $data = [], Closure|string|null $callback = null)
 * @method static mixed queue(Mailable|string|array $view, string|null $queue = null)
 * @method static mixed onQueue(string $queue, Mailable $view)
 * @method static mixed queueOn(string $queue, Mailable $view)
 * @method static mixed later(DateTimeInterface|DateInterval|int $delay, Mailable $view, string|null $queue = null)
 * @method static mixed laterOn(string $queue, DateTimeInterface|DateInterval|int $delay, Mailable $view)
 * @method static TransportInterface getSymfonyTransport()
 * @method static \Illuminate\Contracts\View\Factory getViewFactory()
 * @method static void setSymfonyTransport(TransportInterface $transport)
 * @method static Mailer setQueue(Factory $queue)
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 * @method static void assertSent(string|Closure $mailable, callable|array|string|int|null $callback = null)
 * @method static void assertNotOutgoing(string|Closure $mailable, callable|null $callback = null)
 * @method static void assertNotSent(string|Closure $mailable, callable|array|string|null $callback = null)
 * @method static void assertNothingOutgoing()
 * @method static void assertNothingSent()
 * @method static void assertQueued(string|Closure $mailable, callable|array|string|int|null $callback = null)
 * @method static void assertNotQueued(string|Closure $mailable, callable|array|string|null $callback = null)
 * @method static void assertNothingQueued()
 * @method static void assertSentCount(int $count)
 * @method static void assertQueuedCount(int $count)
 * @method static void assertOutgoingCount(int $count)
 * @method static Collection sent(string|Closure $mailable, callable|null $callback = null)
 * @method static bool hasSent(string $mailable)
 * @method static Collection queued(string|Closure $mailable, callable|null $callback = null)
 * @method static bool hasQueued(string $mailable)
 *
 * @see \Illuminate\Mail\MailManager
 * @see \Illuminate\Support\Testing\Fakes\MailFake
 */
class Mail extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @return \Illuminate\Support\Testing\Fakes\MailFake
     */
    public static function fake()
    {
        $actualMailManager = static::isFake()
                ? static::getFacadeRoot()->manager
                : static::getFacadeRoot();

        return tap(new MailFake($actualMailManager), function ($fake) {
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
        return 'mail.manager';
    }
}
