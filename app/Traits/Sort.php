<?php


namespace App\Traits;


trait Sort
{
    private $column = 'id';

    private $direction = 'ASC';

    public function sortBy(string $column)
    {
        $this->column = $column;
        return $this;
    }

    public function sortIncrement(bool $asc = true)
    {
        $this->direction = $asc ? 'ASC' : 'DESC';
        return $this;
    }

    /**
     * @return string
     */
    public function getColumn(): string
    {
        return $this->column;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    public function paginateOffset()
    {
        return request()->get('offset');
    }

    public function paginateRecord()
    {
        return request()->get('limit');
    }
}
