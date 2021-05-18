<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Hash;

/**
 * Trait Hashable
 * @package App\Models
 */
trait Hashable
{
    /**
     * @param string $string
     * @return string
     */
    protected function makeHash(string $string): string
    {
        return app('hash')->make($string);
    }
}
