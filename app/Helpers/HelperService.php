<?php

use App\Models\Setting;

final class HelperService
{
    protected $data;

    public static function webSettings(string $column)
    {
        if (null == self::$data) {
            $setting = Setting::first()->$column;
            self::$data = $setting;

            return $setting;
        }

        return self::$data;
    }
}
