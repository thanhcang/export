<?php


namespace App\Repositories;


class BaseRepo
{
    protected $model;

    public function find(int $id)
    {
        // TODO: Implement get() method.
        return $this->model::find($id);
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
        $this->model->destroy($id);
    }

    public function update(int $id, array $data)
    {
        // TODO: Implement update() method.
        $row = $this->model->find($id);
        $row->forceFill($data)->save();
        return $row;
    }

    public function add(array $data)
    {
        // TODO: Implement add() method.
        $new = new $this->model();
        $new->forceFill($data);
        $new->save();

        return $new;
    }

    public function findOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

}
