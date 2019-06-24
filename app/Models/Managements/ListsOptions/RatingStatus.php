<?php


namespace App\Models\Managements\ListsOptions;


use Illuminate\Database\Eloquent\Builder;

class RatingStatus extends ListsOptions
{
    const MODEL_NAME = 'RatingStatus';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('function', function (Builder $builder) {
            $builder->where('function', self::MODEL_NAME);
        });
    }
}
