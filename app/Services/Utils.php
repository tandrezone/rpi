<?php


namespace App\Services;


class Utils
{
    /**
     * Get the temp of the soc in C
     * @return int
     */
    public function getTemp() : int {
        $data = self::getInfoFromFile(config("rpi.temps"));
        return round((int)$data/1000);
    }

    /**
     * Get the clock speed of each one of the 4 cores
     * @return int[]
     */
    public function getClockSpeed() : array {
        $cpu0 = self::getInfoFromFile(config("rpi.clockspeed0"));
        $cpu1 = self::getInfoFromFile(config("rpi.clockspeed1"));
        $cpu2 = self::getInfoFromFile(config("rpi.clockspeed2"));
        $cpu3 = self::getInfoFromFile(config("rpi.clockspeed3"));
        return [
            self::roundToNM($cpu0),
            self::roundToNM($cpu1),
            self::roundToNM($cpu2),
            self::roundToNM($cpu3)
            ];
    }

    /**
     * Helper to get info from external file or app
     * @param string $path
     * @return string
     */
    private function getInfoFromFile(string $path) : string {
        $file = fopen($path,"r");
        $data = fgets($file);
        fclose($file);
        return $data;
    }

    /**
     * Round the temp and the clock speed to mhz and C
     * @param $data
     * @return int
     */
    private function roundToNM($data) : int {
        return round((int)$data/1000);
    }

    /**
     * Get the number of cores
     * @return int
     */
    public function getNumberCpus() : int {
        $ncpu = 1;
        if(is_file('/proc/cpuinfo')) {
            $cpuinfo = file_get_contents('/proc/cpuinfo');
            preg_match_all('/^processor/m', $cpuinfo, $matches);
            $ncpu = count($matches[0]);
        }
        return $ncpu;
    }



}
