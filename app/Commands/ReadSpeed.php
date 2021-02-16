<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Services\Utils;

class ReadSpeed extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'rpi:speed';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Get the clock speed';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $cpusSpeed = Utils::getClockSpeed();
        foreach ($cpusSpeed as $speed) {
            echo 'SoC clock speed is '.$speed.'Mhz'.PHP_EOL;
        }
        return 0;

    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
