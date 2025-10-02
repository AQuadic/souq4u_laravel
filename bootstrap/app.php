<?php

use Illuminate\Foundation\Application;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

    })
    ->withSchedule(function (Schedule $schedule) {
        $schedule->call(fn() => info('Schedule Working'))->everyMinute()->when(config('app.debug'))
            ->description('Debug');

        if (config('queue.default') == 'database') {
            $schedule->command('queue:restart')->everyFiveMinutes();
            // --stop-when-empty
            $schedule->command('queue:work --queue=high,otps,notifications,default,backups --max-time=500 --tries=10')
                ->everyMinute();
            //            ->withoutOverlapping();
        } elseif (config('queue.default') == 'redis') {
            $schedule->command('horizon:check')->everyMinute();
            $schedule->command('horizon:snapshot')->everyFiveMinutes();
        }
        $schedule->command('cache:prune-stale-tags')->hourly();
        $schedule->command('model:prune')->monthly();
        //        $schedule->command('backup:clean')->daily()->at('01:00');
        //        $schedule->command('backup:run')->daily()->at('01:30');
        //        $schedule->command('apm:clear')->daily();
        //        $schedule->command(DispatchQueueCheckJobsCommand::class)->everyMinute();
        //        $schedule->command(RunHealthChecksCommand::class)->everyMinute();
        //        $schedule->command('telescope:prune --hours=48')->monthly();
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

