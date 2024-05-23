<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function formatSimpleDate($date, $format = 'd F Y')
    {
        return Carbon::parse($date)->format($format);
    }

    public static function formatArticleDate($date, $format = 'F d, Y, h:i A')
    {
        return Carbon::parse($date)->format($format);
    }
}