<?php

namespace App\Interfaces;

interface LocationRepositoryInterface
{
    public function query();
    public function getAllLocations();
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function getChildren($parentId);
    public function getParent($id);
}
