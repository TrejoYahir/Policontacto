<?php

use Policontacto\Managers\RegistroManager;
use Policontacto\Managers\VacanteManager;
use Policontacto\Repositorios\EstudianteRepo;
use Policontacto\Managers\CuentaManager;
use Policontacto\Repositorios\AreaRepo;
use Policontacto\Repositorios\PlantelRepo;
use Policontacto\Repositorios\EspecialidadRepo;
use Policontacto\Repositorios\PublicacionRepo;
use Policontacto\Managers\PerfilManager;
use Policontacto\Managers\MensajeManager;
use Policontacto\Managers\EmpresaPerfilManager;
use Policontacto\Managers\PublicarManager;
use Policontacto\Repositorios\UserRepo;
use Policontacto\Repositorios\EmpresaRepo;
use Policontacto\Repositorios\MensajeRepo;
use Policontacto\Repositorios\VacanteRepo;
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
	protected $mensajeRepo;
	protected $vacanteRepo;

	//Constructor

	public function __construct(EstudianteRepo $estudianteRepo, EspecialidadRepo $especialidadRepo, AreaRepo $areaRepo, PlantelRepo $plantelRepo, PublicacionRepo $publicacionRepo, UserRepo $userRepo, EmpresaRepo $empresaRepo, MensajeRepo $mensajeRepo, VacanteRepo $vacanteRepo)
	{
		$this->estudianteRepo = $estudianteRepo;
		$this->especialidadRepo = $especialidadRepo;
		$this->areaRepo = $areaRepo;
		$this->plantelRepo = $plantelRepo;
		$this->publicacionRepo = $publicacionRepo;
		$this->userRepo = $userRepo;
		$this->empresaRepo = $empresaRepo;
		$this->mensajeRepo = $mensajeRepo;
		$this->vacanteRepo = $vacanteRepo;

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
			elseif(isset($u->empresa->nombre))
				$nombreEm = $u->empresa->nombre;

			if($nombreEs != '' && Str::startsWith(Str::lower($nombreEs), Str::lower($keywords)))
			{
				if($u->estudiante){
					array_push($estudiantes, $u->estudiante);
				}
			}
			elseif($nombreEm != '' && Str::startsWith(Str::lower($nombreEm), Str::lower($keywords)))
			{				
				if($u->empresa){
					array_push($empresas, $u->empresa);
				}
			}
		}

		return View::make('usuarios/buscarUsuarios', compact('estudiantes', 'empresas'));
	}


	//chat

	public function chat($usuario)
	{
		$destinatario = $this->findUserBySlug($usuario);
		$user = Auth::user();
		$tipou = getUserType();
		$remitente = $user->$tipou->slug;
		$mensajes = $this->mensajeRepo->getLista($remitente, $destinatario->slug);
		$area = $user->$tipou->area->slug;
		$usuarios = $this->areaRepo->findBySlug($area);
		return View::make('mensajes', compact('destinatario', 'user', 'tipou', 'mensajes', 'usuarios'));
	}

	public function iniciarChat()
	{
		$user = Auth::user();
		$tipou = getUserType();
		$remitente = $user->$tipou->slug;
		$area = $user->$tipou->area->slug;
		$usuarios = $this->areaRepo->findBySlug($area);
		return View::make('mensajesDefault', compact('user', 'tipou', 'usuarios'));
	}

	public function enviarMensaje()
	{

		$mensaje = $this->mensajeRepo->nuevoMensaje();
		$manager = new MensajeManager($mensaje, Input::all());		
		$manager->save();

		 return Response::json(array(
			'success' => true,
			'message' => 'Mensaje enviado'
		));	

	}

	public function getMensajes()
	{
		$remitente = Input::get('remitente');

		$mensaje = $this->mensajeRepo->getNuevosMensajes($remitente);

		if (count($mensaje) > 0)
		{
			$mensaje->leido = true;
			$mensaje->save();
			return $mensaje->contenido;
		}
	}

	//Solo vistas

	public function empresa()
	{

		return View::make('empresaRegistro');

	}

	//vacantes

	public function vacantes()
	{

		return View::make('vacantes');

	}

	public function guardarVacante()
	{

		$vacante = $this->vacanteRepo->nuevaVacante();
		$manager = new VacanteManager($vacante, Input::all());	
		$manager->save();

		return Redirect::back();

	}

	//funciones

	public function findUserBySlug($usuario)
	{
		$users = $this->userRepo->getAll();

		if(isset(Auth::user()->estudiante->slug))
			$mislug = Auth::user()->estudiante->slug;
		elseif(isset(Auth::user()->empresa->slug))
			$mislug = Auth::user()->empresa->slug;
		else
			App::abort(404);

		foreach($users as $u)
		{

			if(isset($u->estudiante->slug))
			{
				if($u->estudiante->slug == $usuario && $u->estudiante->slug != $mislug)
					return $u->estudiante;
			}
			if(isset($u->empresa->slug))
			{
				if($u->empresa->slug == $usuario && $u->empresa->slug != $mislug)
					return $u->empresa;
			}			

		}
		App::abort(404);
	}

} 
