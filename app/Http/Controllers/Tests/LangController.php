<?php


namespace App\Http\Controllers\Tests;


use App\Helpers\Lang\Lang;
use App\Http\Controllers\Controller;

class LangController extends Controller
{
    public function lang()
    {
        return response()->json(Lang::get('passwords.user'));
    }
}
