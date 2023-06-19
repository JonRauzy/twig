<?php

namespace MyModels\Mapping;
use MyModels\Abstract\AbstractMapping;
use Exception;


class PermissionMapping extends AbstractMapping
{
    // Propriétés
    private int $idPermission;
    private string $permissionName;
    private int $permissionRole;

    // Getters


 

    public function __toString(): string
    {
        return self::class;
    }



    /**
     * Get the value of idPermission
     *
     * @return int
     */
    public function getIdPermission(): int
    {
        return $this->idPermission;
    }

    /**
     * Set the value of idPermission
     *
     * @param int $idPermission
     *
     * @return self
     */
    public function setIdPermission(int $idPermission): self
    {
        $this->idPermission = $idPermission;

        return $this;
    }

    /**
     * Get the value of permissionName
     *
     * @return string
     */
    public function getPermissionName(): string
    {
        return $this->permissionName;
    }

    /**
     * Set the value of permissionName
     *
     * @param string $permissionName
     *
     * @return self
     */
    public function setPermissionName(string $permissionName): self
    {
        if(strlen($permissionName)>45){
            // affichage de l'erreur
            throw new Exception("Le nom de la permission ne doit pas dépasser 45 caractères", E_USER_NOTICE);
            return $this;
        }else {
            $this->permissionName = $permissionName;
            return $this;
        }
    }

    /**
     * Get the value of permissionRole
     *
     * @return int
     */
    public function getPermissionRole(): int
    {
        return $this->permissionRole;
    }

    /**
     * Set the value of permissionRole
     *
     * @param int $permissionRole
     *
     * @return self
     */
    public function setPermissionRole(int $permissionRole): self
    {
        $this->permissionRole = $permissionRole;

        return $this;
    }
}