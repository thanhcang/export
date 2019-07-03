<?php


namespace App\Models\Managements\ListsSelect;


use Illuminate\Database\Eloquent\Builder;

class ZoneSelects extends ListsSelect
{
    const MODEL_NAME = 'zone_selects';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('model', function (Builder $builder) {
            $builder->where('model', self::MODEL_NAME);
        });
    }
}
