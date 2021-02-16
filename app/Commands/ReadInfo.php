<?php

namespace App\Commands;

use App\Services\Utils;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;


class ReadInfo extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'rpi:info';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $cpusSpeed = Utils::getClockSpeed();
            $temp = Utils::getTemp();

            $headers = ['CPU0', 'CPU1', 'CPU2', 'CPU3', 'TEMP'];

            $data = [
                [
                    'CPU0' => $cpusSpeed[0],
                    'CPU1' => $cpusSpeed[1],
                    'CPU2' => $cpusSpeed[2],
                    'CPU3' => $cpusSpeed[3],
                    'TEMP' => $temp,
                ],

            ];
           $this->table($headers, $data);
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
