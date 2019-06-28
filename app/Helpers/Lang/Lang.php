<?php


namespace App\Helpers\Lang;

class Lang
{
    const EN = 'en';
    const VI = 'vi';

    const LIST_LANG = [self::EN, self::VI];

    private static $lang;

    private static $locate = 'en';

    public static function init($cli = false, $locate = 'en')
    {
        if ($cli === false) {
            $locate = trim(request()->header('lang', $locate), '"');
            $lang   = new Request();
        } else {
            $lang = new Cli();
        }

        $lang->locate($locate);

        self::$lang   = $lang;
        self::$locate = $locate;
    }

    public static function get(string $key)
    {
        return self::$lang->get($key);
    }

    public static function getLocate()
    {
        return self::$locate;
    }
}
