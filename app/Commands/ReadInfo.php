<?php

namespace App\Commands;

use App\Services\Utils;
use Carbon\Carbon;
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
    protected $description = 'Get number of cores, clock speed and temps';

    /**
     * Service Utils
     * @var Utils
     */
    protected $utils;

    public function __construct(Utils $utils)
    {
        $this->utils = $utils;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $data = [];

        $cpusSpeed = $this->utils->getClockSpeed();
        $temp = $this->utils->getTemp();

        $headers = ['TIME', 'CPUS', 'CPU0', 'CPU1', 'CPU2', 'CPU3', 'TEMP'];

        $data[] =
            [
                'TIME' => (Carbon::now()->toTimeString()),
                'CORES' => $this->utils->getNumberCpus(),
                'CPU0' => $cpusSpeed[0],
                'CPU1' => $cpusSpeed[1],
                'CPU2' => $cpusSpeed[2],
                'CPU3' => $cpusSpeed[3],
                'TEMP' => $temp,


        ];
           $this->table($headers, $data);
    }
}
