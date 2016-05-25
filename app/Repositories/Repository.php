<?php

namespace App\Repositories;

abstract class Repository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = model;
    }

    public function byId($id)
	{
		return $this->model->findOrFail($id);
	}

	public function byHashId($hash_id)
	{
		return $this->model->findOrFail($hash_id);
	}

	public function count()
	{
		return count($this->all());
	}

    public function all()
    {
        return $this->model->all();
    }

    public function paginate($n)
	{
        return $this->model->paginate($n);
	}

	public function take($n)
    {
        return $this->model->take($n);
    }

	public function last()
    {
        return $this->model->last();
    }

    public function first()
    {
    	return $this->model->first();
    }

	public function save()
	{
		return $this->model->save();
	}

	public function update($id, Array $inputs)
	{
		$this->byId($id)->fill($inputs)->save();
	}

	public function store(Array $inputs)
	{
		return $this->model->create($inputs);
	}

	public function destroy($id)
	{
		$this->byId($id)->delete();
	}

}
