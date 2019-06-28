<?php


namespace App\Helpers\Trans;


use App\Helpers\Lang\Lang;

class FormValueForLang
{

    private $key = '';

    private $lang = Lang::EN;

    private $value = '';

    private $result = [];

    public function __construct(string $key, array $data)
    {
        $this->key = $key;

        foreach (Lang::LIST_LANG as $item) {
            $this->lang  = $item;
            $this->value = $data[$this->lang];

            $this->result[] = $this->dataEachLang();
        }

    }

    private function dataEachLang()
    {
        return [
            'key'   => $this->key,
            'lang'  => $this->lang,
            'value' => $this->value
        ];
    }

    public function result() {
        return $this->result;
    }
}
