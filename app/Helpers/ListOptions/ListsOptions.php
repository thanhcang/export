<?php


namespace App\Helpers\ListOptions;


use App\Helpers\Lang\Lang;
use Exception;

class ListsOptions implements ListOptionContract
{
    use ListsOptionCondition;

    protected $model = null;

    public function __construct($model)
    {
        if ($model === null) {
            throw new Exception('install model instance');
        }

        $this->model = $model;
    }

    public function getForFunctionSelect(string $name)
    {
        // TODO: Implement getForSelectName() method.
        $selects = $this->model->with('lang')
                               ->with('defaultLang')
                               ->where(['select_name' => $name])
                               ->where($this->isShow())
                               ->remember(60)
                               ->get();

        $selects->each(function ($select) {

            if ($select->lang !== null) {
                $select->option_title = $select->lang->option_title;
            } elseif ($select->defaultLang !== null) {
                $select->option_title = $select->defaultLang->option_title;
            } else {
                $select->option_title = null;
            }

            unset($select->lang);
            unset($select->defaultLang);
        });

        return $selects;
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
        $row = $this->model->findOrFail($id);

        if ($row === null) {
            throw new ListOptionException(Lang::get('database.row_not_found'), config('api.code.database.row_not_found'));
        }

        $this->model->destroy($row->id);
    }

    public function update(int $id, array $data)
    {
        // TODO: Implement update() method.
        $row = $this->model->findOrFail($id);

        if ($row === null) {
            throw new ListOptionException(Lang::get('database.row_not_found'), config('api.code.database.row_not_found'));
        }

        $row->forceFill($data)->save();
        return $row;
    }

    public function add(array $data)
    {
        $row = $this->model->where([
            'select_name' => $data['select_name'],
            'option_name' => $data['option_name']
        ])->first();

        if ($row !== null) {
            throw new ListOptionException(Lang::get('database.row_exists'), config('api.code.database.row_exists'));
        }

        // TODO: Implement add() method.
        $new = new $this->model();
        $new->forceFill($data);
        $new->save();

        return $new;
    }

    public function disable(int $id)
    {
        // TODO: Implement disable() method.
        $row = $this->model->findOrFail($id);

        if ($row === null) {
            throw new ListOptionException(Lang::get('database.row_not_found'), config('api.code.database.row_not_found'));
        }

        $this->model->option_show = false;
        $this->model->save();
    }

    public function enable(int $id)
    {
        // TODO: Implement enable() method.

        $row = $this->model->findOrFail($id);

        if ($row === null) {
            throw new ListOptionException(Lang::get('database.row_not_found'));
        }

        $this->model->option_show = true;
        $this->model->save();
    }

}
