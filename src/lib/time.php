<?php

class Clock {
    private $year = 0;
    private $month = 0;
    private $day = 0;
    private $hour = 0;
    private $minute = 0;
    private $second = 0;

    private static $monthNames = [
        'فروردین',
        'اردیبهشت',
        'خرداد',
        'تیر',
        'مرداد',
        'شهریور',
        'مهر',
        'آبان',
        'آذر',
        'دی',
        'بهمن',
        'اسفند'
    ];

    function __construct($year = 0, $month = 0, $day = 0, $hour = 0, $minute = 0, $second = 0) {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
    }

    public function getYear() { return $this->year; }

    public function getMonth() { return $this->month; }

    public function getDay() { return $this->day; }

    public function getHour() { return $this->hour; }

    public function getMinute() { return $this->minute; }

    public function getSecond() { return $this->second; }

    public function toString() {
        return
            $this->year . '/' .
            $this->month . '/' .
            $this->day . ' ' .
            $this->hour . ':' .
            $this->minute . ':' .
            $this->second;
    }

    static function toJalali($clock) {
        $result = gregorian_to_jalali(
            $clock->getYear(),
            $clock->getMonth(),
            $clock->getDay()
        );

        return new Clock($result[0], $result[1], $result[2]);
    }

    static function jalaliNow() {
        $now = explode(' ', date('Y m d'));

        return Clock::toJalali(new Clock($now[0], $now[1], $now[2]));
    }

    static function getShortJalali($clock) {
        $jalali = Clock::toJalali($clock, '');

        $result = $jalali->getDay();
        $result .= ' ';
        $result .= self::$monthNames[$jalali->getMonth() - 1];

        if(Clock::jalaliNow()->getYear() != $jalali->getYear()) {
            $result .= ' ';
            $result .= $jalali->getYear();
        }
        
        return $result;
    }
}

class Time {
    private $hour = 0;
    private $minute = 0;
    private $second = 0;

    function __construct($time = [0, 0, 0]) {
        $this->hour = $time[0];
        $this->minute = $time[1];
        $this->second = $time[2];
    }

    public function __toString() {
        $h = $this->hour;
        $m = $this->minute;
        $s = $this->second;

        $h = ($h[0] == '0')? $h[1] : $h;
        $m = ($m[0] == '0')? $m[1] : $m;

        if($s >= 30) {
            $m++;
        }

        if($h > 0) {
            if($m > 0) {
                return $h . ' ساعت و ' . $m . ' دقیقه';
            } else {
                return $h . ' ساعت';
            }
        } else {
            if($m > 0) {
                return $m . ' دقیقه';
            } else {
                return '0';
            }
        }
    }
}
