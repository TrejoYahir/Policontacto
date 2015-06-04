<?php

use Policontacto\Managers\RegistroManager;
use Policontacto\Repositorios\EstudianteRepo;
use Policontacto\Managers\CuentaManager;
use Policontacto\Repositorios\AreaRepo;
use Policontacto\Repositorios\PlantelRepo;
use Policontacto\Repositorios\EspecialidadRepo;
use Policontacto\Repositorios\PublicacionRepo;
use Policontacto\Managers\PerfilManager;
use Policontacto\Managers\EmpresaPerfilManager;
use Policontacto\Managers\PublicarManager;
use Policontacto\Repositorios\UserRepo;
use Policontacto\Repositorios\EmpresaRepo;
use Policontacto\Entidades\User;

class UsersController extends BaseController
{

	protected $estudianteRepo;
	protected $especialidadRepo;
	protected $areaRepo;
	protected $plantelRepo;
	protected $publicacionRepo;
	protected $userRepo;
	protected $empresaRepo;

	//Constructor

	public function __construct(EstudianteRepo $estudianteRepo, EspecialidadRepo $especialidadRepo, AreaRepo $areaRepo, PlantelRepo $plantelRepo, PublicacionRepo $publicacionRepo, UserRepo $userRepo, EmpresaRepo $empresaRepo)
	{
		$this->estudianteRepo = $estudianteRepo;
		$this->especialidadRepo = $especialidadRepo;
		$this->areaRepo = $areaRepo;
		$this->plantelRepo = $plantelRepo;
		$this->publicacionRepo = $publicacionRepo;
		$this->userRepo = $userRepo;
		$this->empresaRepo = $empresaRepo;
	}

	//registros

	public function registro()
	{

		$user = $this->estudianteRepo->nuevoEstudiante();
		$manager = new RegistroManager($user, Input::all());
		$user->tipo = 'estudiante';
		$manager->save();
		$user->save();

		Mail::send('emails.verificacion', array('confirmation_code' => $user->confirmation_code), function($message) {
			$message->to(Input::get('email'), 'Nuestro nuevo usuario')
				->subject('Verifica tu cuenta');
		});

		return Redirect::back()->with('mensaje', '¡Registro exitoso! Por favor revisa tu correo electrónico para confirmar tu cuenta en Policontacto.');

	}

	public function registroEmpresa()
	{

		$user = $this->empresaRepo->nuevaEmpresa();
		$manager = new RegistroManager($user, Input::all());
		$user->tipo = 'empresa';
		$manager->save();
		$user->save();

		Mail::send('emails.verificacion-empresa', array('confirmation_code' => $user->confirmation_code), function($message) {
			$message->to(Input::get('email'), 'Nuestro nuevo usuario')
				->subject('Verifica tu cuenta');
		});

		return Redirect::back()->with('mensaje', '¡Registro exitoso! Por favor revisa tu correo electrónico para confirmar tu cuenta en Policontacto.');

	}


	//Cuentas

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

	//perfiles

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

	public function perfilEmpresa()
	{

		$user = Auth::user();
		$empresa = $user->getEmpresa();
		$areas = $this->areaRepo->getList();

		return View::make('usuarios/perfilEmpresa', compact('user', 'empresa', 'areas'));

	}

	public function cambiarPerfilEmpresa()
	{

		$user = Auth::user();
		$empresa = $user->getEmpresa();
		$manager = new EmpresaPerfilManager($empresa, Input::all());		
		$manager->save();

		return Redirect::route('home');			

	}

	//publicaciones

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

	public function obtenerPublicacionesExternas($id)
	{

		$publicaciones = $this->publicacionRepo->findByUser($id);

		 return Response::json(array(
			'publicaciones' => $publicaciones
		));	

	}

	public function novedades()
	{
		$publicaciones = $this->publicacionRepo->getAll();
		return View::make('novedades', compact('publicaciones'));
	}

	//Confirmación de cuentas

	public function confirmar($confirmation_code)
	{
		if( ! $confirmation_code)
		{
				return Redirect::home()->with('v_error', 1);
		}

		$user = User::whereConfirmationCode($confirmation_code)->first();

		if ( ! $user)
		{
				return Redirect::home()->with('u_error', 1);
		}

		$user->confirmed = 1;
		$user->confirmation_code = null;
		$user->save();

		Auth::login($user);

		return Redirect::route('perfil')->with('mensaje', '¡Tu cuenta ya está activada! Por favor llena tus datos para terminar de configurarla.');
	}

	public function confirmarEmpresa($confirmation_code)
	{
		if( ! $confirmation_code)
		{
				return Redirect::home()->with('v_error', 1);
		}

		$user = User::whereConfirmationCode($confirmation_code)->first();

		if ( ! $user)
		{
				return Redirect::home()->with('u_error', 1);
		}

		$user->confirmed = 1;
		$user->confirmation_code = null;
		$user->save();

		Auth::login($user);

		return Redirect::route('perfilEmpresa')->with('mensaje', '¡Tu cuenta ya está activada! Por favor llena tus datos para terminar de configurarla.');
	}
	

	//Busqueda


	public function buscar()
	{
		$keywords = Input::get('keywords');
		$users = $this->userRepo->getAll();
		$estudiantes = array();
		$empresas = array();
		$nombreEs='';
		$nombreEm='';

		foreach($users as $u)
		{

			if(isset($u->estudiante->nombre))
				$nombreEs = $u->estudiante->nombre . ' ' . $u->estudiante->apellidos;
			if(isset($u->empresa->nombre))
				$nombreEm = $u->empresa->nombre;

			if(Str::startsWith(Str::lower($nombreEs), Str::lower($keywords)) || Str::startsWith(Str::lower($nombreEm), Str::lower($keywords)))
			{
				if($u->estudiante){
					array_push($estudiantes, $u->estudiante);
				}
				if($u->empresas){
					array_push($empresas, $u->empresa);
				}
			}
		}

		return View::make('usuarios/buscarUsuarios', compact('estudiantes', 'empresas'));
	}


	//Solo vistas

	public function empresa()
	{

		return View::make('empresaRegistro');

	}

} 
