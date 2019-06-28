<?php


namespace App\Repositories\Contracts;


use Illuminate\Http\Request;

interface LeadContract extends ModelContract
{
    public function paginate(Request $request);
}
