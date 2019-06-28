<?php


namespace App\Repositories\Contracts;


interface ModelContract
{
    public function find(int $id);

    public function all();

    public function delete(int $id);

    public function update(int $id, array $data);

    public function add(array $data);

    public function findOrFail(int $id);
}
