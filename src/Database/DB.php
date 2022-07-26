<?php

namespace TestTask\Database;

use TestTask\Database\Concerns\ConnectsTo;
use TestTask\Database\Managers\Contracts\DatabaseManager;

class DB
{
    public function __construct( protected DatabaseManager $manager){}

    public function init()
    {
        ConnectsTo::connect($this->manager);
    }

    protected function raw(string $query, $value = [])
    {
        return $this->manager->query($query, $value);
    }

    protected function create(array $data)
    {
        return $this->manager->create($data);
    }

    protected function delete($id)
    {
        return $this->manager->delete($id);
    }

    protected function update($id, array $attributes)
    {
        return $this->manager->update($id, $attributes);
    }

    protected function read($columns = '*', $filter = null)
    {
        return $this->manager->read($columns, $filter);
    }

    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return call_user_func_array([$this, $name], $arguments);
        }
    }
}