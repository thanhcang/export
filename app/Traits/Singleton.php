<?php


namespace App\Traits;


class Singleton
{
    private static $instance = null;

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            return new self();
        }

        return self::$instance;
    }
}
