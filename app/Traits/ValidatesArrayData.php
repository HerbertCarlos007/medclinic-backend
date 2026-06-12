<?php

namespace App\Traits;

trait ValidatesArrayData
{
    protected function hasData(mixed $data): bool
    {
        if (!is_array($data)) {
            return false;
        }

        return !empty(array_filter($data, function ($value) {
            return $value !== null && $value !== '';
        }));
    }
}
