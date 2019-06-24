<?php


namespace App\Models\Managements\ListsOptions;


use Illuminate\Database\Eloquent\Builder;

class LeadsStatus extends ListsOptions
{
    const MODEL_NAME = 'LeadsStatus';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('function', function (Builder $builder) {
            $builder->where('function', self::MODEL_NAME);
        });
    }
}
