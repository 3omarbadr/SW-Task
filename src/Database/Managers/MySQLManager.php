<?php

namespace TestTask\Database\Managers;

use App\Models\Model;
use TestTask\Database\Grammars\MySQLGrammar;
use TestTask\Database\Managers\Contracts\DatabaseManager;

class MySQLManager implements DatabaseManager
{
    protected static $instance;

    public function connect(): \PDO
    {
        try {
            self::$instance = new \PDO(env('DB_DRIVER') . ':host=' . env('DB_HOST') . ';dbname=' . env('DB_DATABASE'), env('DB_USERNAME'), env('DB_PASSWORD'));
            self::$instance->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

            return self::$instance;
        } catch (\PDOException $e) {
            $error = $e->getMessage();
            echo "<div class='alert'>$error</div>";
            die();
        }
    }

    public function query(string $query, $values = [])
    {
        $stmt = self::connect()->prepare($query);

        for ($i = 1; $i <= count($values); $i++) {
            $stmt->bindValue($i, $values[$i - 1]);
        }

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function read($columns = '*', $filter = null)
    {
        $query = MySQLGrammar::buildSelectQuery($columns, $filter);

        $stmt = self::connect()->prepare($query);

        if ($filter) {
            $stmt->bindValue(1, $filter[2]);
        }

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, Model::getModel());
    }

    public function create($data)
    {
        $query = MySQLGrammar::buildInsertQuery(array_keys($data));

        $stmt = self::$instance->prepare($query);

        for ($i = 1; $i <= count($values = array_values($data)); $i++) {
            $stmt->bindValue($i, $values[$i - 1]);
        }

        return $stmt->execute();
    }

    public function update($id, $attributes)
    {
        $query = MySQLGrammar::buildUpdateQuery(array_keys($attributes));

        $stmt = self::$instance->prepare($query);

        for ($i = 1; $i <= count($values = array_values($attributes)); $i++) {
            $stmt->bindValue($i, $values[$i - 1]);
            if ($i == count($values)) {
                $stmt->bindValue($i + 1, $id);
            }
        }

        return $stmt->execute();
    }


    public function delete($id)
    {
        $query = MySQLGrammar::buildDeleteQuery();

        $stmt = self::$instance->prepare($query);

        $stmt->bindValue(1, $id);

        return $stmt->execute();
    }
}
