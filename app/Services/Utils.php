<?php


namespace App\Services;


class Utils
{
    /**
     * @return int
     */
    public static function getTemp() : int {
        $data = self::getInfoFromFile(config("rpi.temps"));
        return round((int)$data/1000);
    }

    public static function getClockSpeed() : array {
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

    private static function getInfoFromFile(string $path) {
        $file = fopen($path,"r");
        $data = fgets($file);
        fclose($file);
        return $data;
    }

    private static function roundToNM($data) {
        return round((int)$data/1000);
    }



}
