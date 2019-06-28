<?php


namespace App\Helpers;


use App\Helpers\Lang\Lang;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

abstract class FormValidate
{
    protected $required = [];

    protected $options = [];

    protected $requiredForLang = false;

    use ValidatesRequests;

    public function apiValidate(Request $request)
    {
        $this->processRequiredForLang();
        $rules = array_merge_recursive($this->required, $this->options);
        return $this->validate($request, $rules, Lang::get('validation'));
    }

    private function processRequiredForLang(): void
    {
        if ($this->requiredForLang) {
            foreach (Lang::LIST_LANG as $lang) {
                $this->required[$lang] = 'required|max:100';
            }
        }
    }

    abstract function inputs(): array;
}
