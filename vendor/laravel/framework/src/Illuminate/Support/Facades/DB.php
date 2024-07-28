<?php

namespace Illuminate\Support\Facades;

use Carbon\CarbonInterval;
use Closure;
use DateTimeInterface;
use Generator;
use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Connection;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Console\Migrations\FreshCommand;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Database\Console\WipeCommand;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\DatabaseTransactionsManager;
use Illuminate\Database\Grammar;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Processors\Processor;
use PDO;
use PDOStatement;

/**
 * @method static Connection connection(string|null $name = null)
 * @method static ConnectionInterface connectUsing(string $name, array $config, bool $force = false)
 * @method static void purge(string|null $name = null)
 * @method static void disconnect(string|null $name = null)
 * @method static Connection reconnect(string|null $name = null)
 * @method static mixed usingConnection(string $name, callable $callback)
 * @method static string getDefaultConnection()
 * @method static void setDefaultConnection(string $name)
 * @method static string[] supportedDrivers()
 * @method static string[] availableDrivers()
 * @method static void extend(string $name, callable $resolver)
 * @method static void forgetExtension(string $name)
 * @method static array getConnections()
 * @method static void setReconnector(callable $reconnector)
 * @method static DatabaseManager setApplication(Application $app)
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 * @method static mixed macroCall(string $method, array $parameters)
 * @method static void useDefaultQueryGrammar()
 * @method static void useDefaultSchemaGrammar()
 * @method static void useDefaultPostProcessor()
 * @method static \Illuminate\Database\Schema\Builder getSchemaBuilder()
 * @method static Builder table(Closure|Builder|Expression|string $table, string|null $as = null)
 * @method static Builder query()
 * @method static mixed selectOne(string $query, array $bindings = [], bool $useReadPdo = true)
 * @method static mixed scalar(string $query, array $bindings = [], bool $useReadPdo = true)
 * @method static array selectFromWriteConnection(string $query, array $bindings = [])
 * @method static array select(string $query, array $bindings = [], bool $useReadPdo = true)
 * @method static array selectResultSets(string $query, array $bindings = [], bool $useReadPdo = true)
 * @method static Generator cursor(string $query, array $bindings = [], bool $useReadPdo = true)
 * @method static bool insert(string $query, array $bindings = [])
 * @method static int update(string $query, array $bindings = [])
 * @method static int delete(string $query, array $bindings = [])
 * @method static bool statement(string $query, array $bindings = [])
 * @method static int affectingStatement(string $query, array $bindings = [])
 * @method static bool unprepared(string $query)
 * @method static array pretend(Closure $callback)
 * @method static mixed withoutPretending(Closure $callback)
 * @method static void bindValues(PDOStatement $statement, array $bindings)
 * @method static array prepareBindings(array $bindings)
 * @method static void logQuery(string $query, array $bindings, float|null $time = null)
 * @method static void whenQueryingForLongerThan(DateTimeInterface|CarbonInterval|float|int $threshold, callable $handler)
 * @method static void allowQueryDurationHandlersToRunAgain()
 * @method static float totalQueryDuration()
 * @method static void resetTotalQueryDuration()
 * @method static void reconnectIfMissingConnection()
 * @method static Connection beforeStartingTransaction(Closure $callback)
 * @method static Connection beforeExecuting(Closure $callback)
 * @method static void listen(Closure $callback)
 * @method static Expression raw(mixed $value)
 * @method static string escape(string|float|int|bool|null $value, bool $binary = false)
 * @method static bool hasModifiedRecords()
 * @method static void recordsHaveBeenModified(bool $value = true)
 * @method static Connection setRecordModificationState(bool $value)
 * @method static void forgetRecordModificationState()
 * @method static Connection useWriteConnectionWhenReading(bool $value = true)
 * @method static PDO getPdo()
 * @method static PDO|Closure|null getRawPdo()
 * @method static PDO getReadPdo()
 * @method static PDO|Closure|null getRawReadPdo()
 * @method static Connection setPdo(PDO|Closure|null $pdo)
 * @method static Connection setReadPdo(PDO|Closure|null $pdo)
 * @method static string|null getName()
 * @method static string|null getNameWithReadWriteType()
 * @method static mixed getConfig(string|null $option = null)
 * @method static string getDriverName()
 * @method static \Illuminate\Database\Query\Grammars\Grammar getQueryGrammar()
 * @method static Connection setQueryGrammar(\Illuminate\Database\Query\Grammars\Grammar $grammar)
 * @method static \Illuminate\Database\Schema\Grammars\Grammar getSchemaGrammar()
 * @method static Connection setSchemaGrammar(\Illuminate\Database\Schema\Grammars\Grammar $grammar)
 * @method static Processor getPostProcessor()
 * @method static Connection setPostProcessor(Processor $processor)
 * @method static Dispatcher getEventDispatcher()
 * @method static Connection setEventDispatcher(Dispatcher $events)
 * @method static void unsetEventDispatcher()
 * @method static Connection setTransactionManager(DatabaseTransactionsManager $manager)
 * @method static void unsetTransactionManager()
 * @method static bool pretending()
 * @method static array getQueryLog()
 * @method static array getRawQueryLog()
 * @method static void flushQueryLog()
 * @method static void enableQueryLog()
 * @method static void disableQueryLog()
 * @method static bool logging()
 * @method static string getDatabaseName()
 * @method static Connection setDatabaseName(string $database)
 * @method static Connection setReadWriteType(string|null $readWriteType)
 * @method static string getTablePrefix()
 * @method static Connection setTablePrefix(string $prefix)
 * @method static Grammar withTablePrefix(Grammar $grammar)
 * @method static string getServerVersion()
 * @method static void resolverFor(string $driver, Closure $callback)
 * @method static mixed getResolver(string $driver)
 * @method static mixed transaction(Closure $callback, int $attempts = 1)
 * @method static void beginTransaction()
 * @method static void commit()
 * @method static void rollBack(int|null $toLevel = null)
 * @method static int transactionLevel()
 * @method static void afterCommit(callable $callback)
 *
 * @see \Illuminate\Database\DatabaseManager
 */
class DB extends Facade
{
    /**
     * Indicate if destructive Artisan commands should be prohibited.
     *
     * Prohibits: db:wipe, migrate:fresh, migrate:refresh, and migrate:reset
     *
     * @param  bool  $prohibit
     * @return void
     */
    public static function prohibitDestructiveCommands(bool $prohibit = true)
    {
        FreshCommand::prohibit($prohibit);
        RefreshCommand::prohibit($prohibit);
        ResetCommand::prohibit($prohibit);
        WipeCommand::prohibit($prohibit);
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'db';
    }
}
