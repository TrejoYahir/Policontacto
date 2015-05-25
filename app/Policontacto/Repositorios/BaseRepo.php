<?php

namespace Policontacto\Repositorios;


abstract class BaseRepo
{

	protected $model;

	public function __construct()
	{
		$this->model = $this->getModel();
	}

	abstract public function getModel();

	public function find($id)
	{
		return $this->model->find($id);
	}

	public function findBySlug($slug)
	{
		return $this->model->where('slug', $slug)->get()->first();
	}

	public function findByUser($id)
	{
		return $this->model->where('usuario_id', $id)->orderBy('id', 'desc')->get();
	}

	public function findByVCode($verification_code)
	{
	   return $this->model->where('verification_code', $verification_code)->get()->first();
	}

} 