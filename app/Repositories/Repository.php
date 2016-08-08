<?php

namespace App\Repositories;

abstract class Repository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = model;
    }

    /**
    * byId
    * This function is used in order to get the model by its id.
    * @return {Model}
    */
    public function byId($id)
	{
		return $this->model->findOrFail($id);
	}

	 /**
    * byHashId
    * This function is used in order to get the model by its hashId.
    * @return {Model}
    */
	public function byHashId($hash_id)
	{
		return $this->model->findOrFail($hash_id);
	}

	 /**
    * count
    * This function is used in order to get the number of elements of a model.
    * @return {Integer}
    */
	public function count()
	{
		return count($this->all());
	}

     /**
    * all
    * This function is used in order to get all the elements of a model.
    * @return {Models}
    */
    public function all()
    {
        return $this->model->all();
    }

     /**
    * paginate
    * This function is used in order to get elements of a model paginated with n elements.
    * @return {Models}
    */
    public function paginate($n)
	{
        return $this->model->paginate($n);
	}

	 /**
    * take
    * This function is used in order to get n elements of a model.
    * @return {Models}
    */
	public function take($n)
    {
        return $this->model->take($n);
    }

	 /**
    * last
    * This function is used in order to get the last element of a model.
    * @return {Model}
    */
	public function last()
    {
        return $this->model->last();
    }

     /**
    * first
    * This function is used in order to get the first element of a model.
    * @return {Model}
    */
    public function first()
    {
    	return $this->model->first();
    }

	 /**
    * save
    * This function is used in order to save an element.
    * @return {Model}
    */
	public function save()
	{
		return $this->model->save();
	}

	 /**
    * update
    * This function is used in order to update an element.
    * @return {Model}
    */
	public function update($id, Array $inputs)
	{
		$this->byId($id)->fill($inputs)->save();
	}

	 /**
    * store
    * This function is used in order to save an element by completing a form.
    * @return {Model}
    */
	public function store(Array $inputs)
	{
		return $this->model->create($inputs);
	}

	 /**
    * destroy
    * This function is used in order to delete an element.
    * @return void
    */
	public function destroy($id)
	{
		$this->byId($id)->delete();
	}

}
