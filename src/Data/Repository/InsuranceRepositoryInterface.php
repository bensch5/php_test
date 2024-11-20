<?php

namespace Data\Repository;

use Data\Model\Insurance;

interface InsuranceRepositoryInterface
{
    public function getAll(): array;

    public function findById(int $id): ?Insurance;

    public function save(Insurance $insurance): bool;

    public function delete(int $id): bool;
}
