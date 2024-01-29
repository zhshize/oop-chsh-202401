<?php

class ItemRepository
{
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function selectById(int $id): ?array
    {
        $statement = $this->db->prepare('SELECT * FROM `items` WHERE `id` = ?');
        $statement->execute([$id]);

        return $statement->fetchAll(PDO::FETCH_ASSOC)[0] ?? null;
    }

    public function select(): array
    {
        $statement = $this->db->prepare('SELECT * FROM `items`');
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(string $name, int $price): int
    {
        $statement = $this->db->prepare('INSERT INTO `items` (`name`, `price`) VALUES (?, ?)');
        $statement->execute([$name, $price]);

        return $this->db->lastInsertId();
    }

    public function update(int $id, ?string $name = null, ?int $price = null): void
    {
        // TODO:
    }

    public function delete($id): void
    {
        // TODO:
    }
}
