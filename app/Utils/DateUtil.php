<?php


namespace App\Utils;


use DateTime;
use DateTimeZone;
use Exception;

class DateUtil
{
    const DEFAULT_TIMEZONE = 'UTC';
    const DEFAULT_DATEFORMAT = DateTime::ISO8601;

    /**
     * @param string $value
     * @param string $timezone
     * @param string $dateFormat
     * @return string
     * @throws Exception
     */
    public static function getDateWithTimezone(
        string $value,
        string $timezone = self::DEFAULT_TIMEZONE,
        string $dateFormat = self::DEFAULT_DATEFORMAT
    ): string {
        $date = new DateTime($value);
        $date->setTimezone(new DateTimeZone($timezone));

        return $date->format($dateFormat);
    }
}