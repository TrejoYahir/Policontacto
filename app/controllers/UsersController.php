<?php

use Policontacto\Managers\RegistroManager;
use Policontacto\Repositorios\EstudianteRepo;
use Policontacto\Managers\CuentaManager;
use Policontacto\Repositorios\AreaRepo;
use Policontacto\Repositorios\PlantelRepo;
use Policontacto\Repositorios\EspecialidadRepo;
use Policontacto\Repositorios\PublicacionRepo;
use Policontacto\Managers\PerfilManager;
use Policontacto\Managers\PublicarManager;

class UsersController extends BaseController
{

	protected $estudianteRepo;
	protected $especialidadRepo;
	protected $areaRepo;
	protected $plantelRepo;
	protected $publicacionRepo;

	public function __construct(EstudianteRepo $estudianteRepo, EspecialidadRepo $especialidadRepo, AreaRepo $areaRepo, PlantelRepo $plantelRepo, PublicacionRepo $publicacionRepo)
	{
		$this->estudianteRepo = $estudianteRepo;
		$this->especialidadRepo = $especialidadRepo;
		$this->areaRepo = $areaRepo;
		$this->plantelRepo = $plantelRepo;
		$this->publicacionRepo = $publicacionRepo;
	}

	public function registro()
	{

		$user = $this->estudianteRepo->nuevoEstudiante();
		$manager = new RegistroManager($user, Input::all());

		$manager->save();

		Auth::login($user);

		return Redirect::route('perfil');

	}

	public function cuenta()
	{

		$user = Auth::user();
		return View::make('usuarios/cuenta', compact('user'));

	}

	public function cambiarCuenta()
	{

		$user = Auth::user();
		$manager = new CuentaManager($user, Input::all());

		$manager->save();
		return Redirect::route('home');

	}

	public function perfil()
	{

		$user = Auth::user();
		$estudiante = $user->getEstudiante();
		$areas = $this->areaRepo->getList();
		$planteles = $this->plantelRepo->getList();
		$especialidades = $this->especialidadRepo->getList();

		return View::make('usuarios/perfil', compact('user', 'estudiante', 'areas', 'planteles', 'especialidades'));

	}

	public function cambiarPerfil()
	{

		$user = Auth::user();
		$estudiante = $user->getEstudiante();
		$manager = new PerfilManager($estudiante, Input::all());		
		$manager->save();

		return Redirect::route('home');			

	}

	public function publicar()
	{

		$publicacion = $this->publicacionRepo->nuevaPublicacion();
		$manager = new PublicarManager($publicacion, Input::all());		
		$manager->save();

		 return Response::json(array(
			'success' => true,
			'message' => 'Publicacion exitosa'
		));	

	}

	public function obtenerPublicaciones()
	{

		$user = Auth::user();
		$publicaciones = $user->publicaciones;

		 return Response::json(array(
			'publicaciones' => $publicaciones
		));	

	}

} 