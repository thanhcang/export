<?php


namespace App\Helpers;


use App\Helpers\Lang\Lang;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class FormValidate
{
    protected $required = [];

    protected $options = [];

    use ValidatesRequests;

    public function apiValidate(Request $request)
    {
        $rules = array_merge_recursive($this->required, $this->options);
        return $this->validate($request, $rules, Lang::get('validation'));
    }
}
