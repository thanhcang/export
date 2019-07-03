<?php


namespace App\Repositories;


use App\Helpers\Lang\Lang;
use App\Models\Users\Role;
use App\Repositories\Conditions\RoleCondition;
use App\Repositories\Contracts\RoleContract;

class RoleRepo extends BaseRepo implements RoleContract
{
    use RoleCondition;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function findOrFailByName(string $name)
    {
        // TODO: Implement findOrFailByName() method.
        $row = $this->model->where($this->forName($name));

        if ($row->count() > 0) {
            abort(403, Lang::get('database.row_exists'));
        }

        return $row->first();

    }

}
