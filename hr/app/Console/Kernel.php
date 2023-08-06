<?php

namespace App\Console;

use App\Jobs\ContohJob;
use App\Jobs\ContohJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // seting .env
        // npm run build
        // zip
        // upload (bisa pake git)
        // ganti public_html fisik ke symlink pake ln -s /lokasi/project/public /home/username/public_html
        // php artisan storage:link. kalau ga ada terminal, pake Artisan::call


        // docker -> vm lebih langsing
        // non-docker
        // panel -> aapanel


        // install nginx


        $schedule->command('app:contoh-cron')->everyMinute();
        $schedule->job(new ContohJob())->monthlyOn(1);
        $schedule->command('app:contoh-cron')->everyFifteenMinutes();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
