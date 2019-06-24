<?php


namespace App\Repositories\Contracts;


use Illuminate\Http\Request;

interface LeadContract extends ModeContract
{
    public function paginate(Request $request);
}
