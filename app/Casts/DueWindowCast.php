<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class DueWindowCast implements CastsAttributes
{
    /**
     * تحويل القيمة من قاعدة البيانات إلى كائن PHP
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return json_decode($value, false); // false لتحويله إلى كائن stdClass
    }

    /**
     * تحويل القيمة من كائن PHP إلى قاعدة البيانات (JSON)
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if (is_array($value) || is_object($value)) {
            return json_encode($value);
        }

        return $value;
    }
}
