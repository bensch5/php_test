<?php

namespace Data\Repository;

use Data\Model\Insurance;

class DetailsRepository implements InsuranceRepositoryInterface
{
    private $db;

    public function __construct()
    {
        try {
            $db = mysqli_connect("localhost", "user", "password", "database");
            $this->db = $db;
        } catch (\Exception $e) {
            // handle error
        }
    }

    public function getAll(): array
    {
        // TODO: create proper query; call to prepare method?
        $sql = "SELECT attribute_name FROM table_name WHERE condition";
        
        $result_array = [];
        $result_set = $this->db->query($sql);
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
