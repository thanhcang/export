<?php


namespace App\Models\Managements\Products;


use App\Models\BaseModel;

class ProductImage extends BaseModel
{
    const LOCAL = 'local';

    protected $table = 'products_image';

    public function getUrlAttribute($value)
    {
        if ($this->driver === self::LOCAL) {
            return "/storage/{$value}";
        }

        return $value;
    }
}
