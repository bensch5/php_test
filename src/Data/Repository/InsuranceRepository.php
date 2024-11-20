<?php

namespace Data\Repository;

use Data\Model\Insurance;

class InsuranceRepository implements InsuranceRepositoryInterface
{
    public function __construct(private \mysqli $database) {}

    public function getAll(): array
    {
        // TODO: create proper query; call to prepare method?
        $sql = "SELECT attribute_name FROM table_name WHERE condition";
        
        $result_array = [];
        $result_set = $this->database->query($sql);
        while ($row = $result_set->fetch_assoc()) {
            $result_array[] = $row;
        }

        return $result_array;
    }

    public function findById(int $id): ?Insurance
    {
        return null;
    }

    public function save(Insurance $insurance): bool
    {
        return false;
    }

    public function delete(int $id): bool
    {
        return false;
    }
}
