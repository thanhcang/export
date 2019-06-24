<?php


namespace App\Helpers\ListOptions;


interface ListOptionContract
{
    public function getForFunctionSelect(string $name);

    public function delete(int $id);

    public function update(int $id, array $data);

    public function add(array $data);

    public function disable(int $id);

    public function enable(int $id);

}
