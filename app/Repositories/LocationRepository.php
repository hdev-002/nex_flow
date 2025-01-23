<?php
namespace App\Repositories;
use App\Interfaces\LocationRepositoryInterface;
use App\Models\Settings\Location;

class LocationRepository implements LocationRepositoryInterface
{
    protected $model;

    public function __construct(Location $location)
    {
        $this->model = $location;
    }

    public function query()
    {
        return $this->model->query();
    }

    public function getAllLocations()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $location = $this->findById($id);
        $location->update($data);
        return $location;
    }

    public function delete($id)
    {
        $location = $this->findById($id);
        return $location->delete();
    }

    public function getChildren($parentId)
    {
        return $this->model->where('parent_id', $parentId)->get();
    }

    public function getParent($id)
    {
        $location = $this->findById($id);
        return $location->parent;
    }
}
