<?php

namespace App\Repositories;

abstract class Repository
{

  protected $model;

  public function paginate($n)
	{
		return $this->model->paginate($n);
	}

	public function store(Array $inputs)
	{
		return $this->model->create($inputs);
	}

	public function byId($id)
	{
		return $this->model->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->byId($id)->fill($inputs)->save();
	}

	public function destroy($id)
	{
		$this->byId($id)->delete();
	}

}
