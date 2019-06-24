<?php


namespace App\Helpers\Lang;



class Cli implements LangInterface
{
    private $locate = 'en';

    public function locate(string $locate)
    {
        // TODO: Implement locate() method.
        $this->locate = $locate;
    }

    public function get(string $key, array $replace = [])
    {
        // TODO: Implement get() method.
        return __($key, $replace, $this->locate);
    }

}
