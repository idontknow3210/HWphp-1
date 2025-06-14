<?php
declare(strict_types=1);

class BaseTable implements DatabaseWrapper
{
    private string $tableName;
    private $allowedFields;
    public $pdo;

    public function __construct(PDO $pdo, string $tableName, array $allowedFields)
    {
        $this->pdo = $pdo;
        $this->tableName = $tableName;
        $this->allowedFields = $allowedFields;
    }

   
    public function insert(array $tableColumns, array $values): array
    {
        $setName = '';
        $setValue = '';
        $allowedFieldValues = array();
        foreach ($tableColumns as $field => $value) {
            if (in_array($value, $this->allowedFields)) {
                $setName .= $value.', ';
                $setValue .= '?, ';
                $allowedFieldValues[$field] = $values[$field];
            }
        }
        if (!empty($setName)) {
            $setName = substr($setName, 0, -2);
            $setValue = substr($setValue, 0, -2);
            $sql = "INSERT INTO $this->tableName (".$setName.") VALUES (".$setValue.")";
            $stm = $this->pdo->prepare($sql);
            $stm->execute($allowedFieldValues);
            return $this->find((int)$this->pdo->lastInsertId());
        } else {
            return [];
        }
    }

   
    public function update(int $id, array $values): array
    {
        $allowedFieldValues = array();
        $set = '';
        foreach ($this->allowedFields as $field) {
            if (isset($values[$field])) {
                $set .= "`".str_replace("`","``", $field)."`". "=:$field, ";
                $allowedFieldValues[$field] = $values[$field];
            }
        }
        if (!empty($set)) {
            $set = substr($set, 0, -2);
            $sql = "UPDATE $this->tableName SET ".$set." WHERE id = :id";
            $stm = $this->pdo->prepare($sql);
            $allowedFieldValues["id"] = $id;
            $stm->execute($allowedFieldValues);
            return $this->find($id);
        } else {
            return [];
        }
    }

   
    public function find(int $id): array
    {
        $stm = $this->pdo->prepare("SELECT * FROM $this->tableName WHERE id = :id");
        $stm->execute(['id' => $id]);
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            return [];
        }
    }

    
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM $this->tableName WHERE id = :id";
        $stm = $this->pdo->prepare($sql);
        $stm->execute(['id' => $id]);
        return !(bool)$this->find($id);
    }
}
