<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ShareController extends ResourceController
{
	protected $modelName = 'App\Models\Shares';
    protected $format    = 'json';
    
    /**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	public function index()
	{
		//
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		//
	}

	/**
	 * Return a new resource object, with default properties
	 *
	 * @return mixed
	 */
	public function new()
	{
		$this->data = json_decode($this->request->getBody());

        $realPrice      = $this->data->harga_sebelum_markup;
        $markup_persen  = $this->data->markup_persen;
        $share_persen   = $this->data->share_persen;

        return $this->model->shareRevenue($realPrice, $markup_persen, $share_persen);
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return mixed
	 */
	public function create()
	{
		//
	}

	/**
	 * Return the editable properties of a resource object
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{
		//
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		//
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		//
	}
}
