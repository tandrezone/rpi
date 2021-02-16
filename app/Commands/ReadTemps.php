<?php

namespace App\Commands;

use App\Services\Utils;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class ReadTemps extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'rpi:temp';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Read temperature';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo 'SoC temperature is '.Utils::getTemp().'C'.PHP_EOL;
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
