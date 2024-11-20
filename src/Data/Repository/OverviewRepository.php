<?php

namespace Data\Repository;

use mysqli_result;

class OverviewRepository implements InsuranceRepositoryInterface
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
}
