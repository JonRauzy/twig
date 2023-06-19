<?php

namespace MyModels\Manager;


use MyModels\Interface\ManagerInterface;
use PDO;
use Exception;
use MyModels\Mapping\permissionMapping;

class PermissionManager implements ManagerInterface
{
    private PDO $connect;

    public function __construct(PDO $db)
    {
        $this->connect = $db;
    }

    public function permissionSelectAll() : array|string
    {
        $sql     = "SELECT * FROM permission";
        $prepare = $this->connect->prepare($sql);
        try {
            $prepare->execute();
            $result = $prepare->fetchAll();
            foreach ($result as $key => $value) {
                $results[$key] = new permissionMapping($value);
            }

        } catch (Exception $e) {
            $result = $e->getMessage();
        }
        return $results;
    }

    public function permissionSelectOneById(int $id) : array|string
    {
        $sql     = "SELECT * FROM permission WHERE idpermission = ?";
        $prepare = $this->connect->prepare($sql);
        try {
            $prepare->bindParam(1, $id, PDO::PARAM_INT);
            $prepare->execute();
            $result = $prepare->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }
}