<?php


namespace App\Traits;


trait Condition
{
    protected function exists(string $key, array $conditions = []): bool
    {
        return isset($conditions[$key]);
    }

    protected function isTrue(string $key, array $conditions = []): bool
    {
        return $this->exists($key, $conditions) && $conditions[$key] == 'true';
    }

    protected function getValue(string $key, array $condition)
    {
        return $condition[$key];
    }

    public function forName(string $name)
    {
        return ['name' => $name];
    }
}
