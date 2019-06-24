<?php


namespace App\Repositories\Contracts;


interface ListsOptionTransContract extends ModeContract
{
    public function existOrFail(int $listOptionId, string $lang);

    public function updateOptionTitle(int $listOptionId, string $lang, array $data);
}
