<?php

declare(strict_types=1);

namespace App\Helpers;

class Phone
{
    /**
     * Make phone url - tel:
     * @param string $phone
     * @return string
     */
    public static function getUrl(string $phone): string
    {
        return ((!str_starts_with($phone, '8')) ? '+' : '') . preg_replace('/\D/', '', $phone);
    }

    public static function getPretty(string $phone): string
    {
        if (str_contains($phone, ')')) {
            return '<span>' . str_replace(')', ')</span>', $phone);
        } else {
            return $phone;
        }
    }
}
