<?php


namespace App\Repositories;


use App\Helpers\Lang\Lang;
use App\Helpers\ListsSelects\ListsSelectException;
use App\Models\Managements\ListsSelect\ListsSelect;
use App\Repositories\Conditions\ListsSelectsCondition;
use App\Repositories\Contracts\ListsSelectsContract;
use Illuminate\Support\Collection;

class ListsSelectsRepo extends BaseRepo implements ListsSelectsContract
{
    use ListsSelectsCondition;

    protected $model = null;

    public function __construct(ListsSelect $model)
    {
        $this->model = $model;
    }

    public function optionsForName(string $name)
    {
        // TODO: Implement getForSelectName() method.
        $selects = $this->model
            ->with(
                [
                    'options' => function ($q) {
                        return $q
                            ->select('id', 'lists_selects_id', 'option_name', 'background_color', 'color', 'notes')
                            ->with('currentTrans')
                            ->where($this->isShow())
                            ->remember(60);
                    }
                ]
            )->where($this->forName($name))->remember(60)->first();
        $options = new Collection();

        $selects->options->each(function ($option) use ($options) {
            $temp = new Collection();
            $temp->put('id', $option->id);
            $temp->put('value', $option->currentTrans->value);
            $options->push($temp);
        });

        return $options;
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
        $row = $this->model->findOrFail($id);

        if ($row === null) {
            throw new ListsSelectException(Lang::get('database.row_not_found'), config('api.code.database.row_not_found'));
        }

        $this->model->destroy($row->id);
    }

    public function update(int $id, array $data)
    {
        // TODO: Implement update() method.
        $row = $this->model->findOrFail($id);

        if ($row === null) {
            throw new ListsSelectException(Lang::get('database.row_not_found'), config('api.code.database.row_not_found'));
        }

        $row->forceFill($data)->save();
        return $row;
    }

    public function add(array $data)
    {
        $row = $this->model->where([
            'select_name' => $data['select_name']
        ])->first();

        if ($row !== null) {
            throw new ListsSelectException(Lang::get('database.row_exists'), config('api.code.database.row_exists'));
        }

        // TODO: Implement add() method.
        $new = new $this->model();
        $new->forceFill($data);
        $new->save();

        return $new;
    }

}
