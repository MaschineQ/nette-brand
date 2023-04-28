<?php

declare(strict_types=1);

namespace App\Repository;

use Nette\Database\Explorer;
use Nette\Database\Table\ActiveRow;
use Nette\Utils\ArrayHash;

class BrandRepository
{
    const TABLE_NAME = 'brand';
    public function __construct(
        private Explorer $database,
    ) {}

    public function getBrand(int $id): ?ActiveRow
    {
        return $this->database->table(self::TABLE_NAME)
            ->where('id', $id)
            ->fetch();
    }

    public function getBrands(): array
    {
        return $this->database->table(self::TABLE_NAME)
            ->fetchAll();
    }

    public function addBrand(ArrayHash $values): void
    {
        $this->database->table(self::TABLE_NAME)
            ->insert($values);
    }

    public function updateBrand(int $id, ArrayHash $values): void
    {
        $this->database->table(self::TABLE_NAME)
            ->where('id', $id)
            ->update($values);
    }

    public function deleteBrand(int $id): void
    {
        $this->database->table(self::TABLE_NAME)
            ->where('id', $id)
            ->delete();
    }
}
