<?php

use Policontacto\Managers\RegistroManager;
use Policontacto\Repositorios\EstudianteRepo;
use Policontacto\Managers\CuentaManager;
use Policontacto\Repositorios\AreaRepo;
use Policontacto\Repositorios\PlantelRepo;
use Policontacto\Repositorios\EspecialidadRepo;
use Policontacto\Managers\PerfilManager;

class UsersController extends BaseController
{

    protected $estudianteRepo;
	protected $especialidadRepo;
	protected $areaRepo;
	protected $plantelRepo;

    public function __construct(EstudianteRepo $estudianteRepo, EspecialidadRepo $especialidadRepo, AreaRepo $areaRepo, PlantelRepo $plantelRepo)
    {
        $this->estudianteRepo = $estudianteRepo;
	    $this->especialidadRepo = $especialidadRepo;
	    $this->areaRepo = $areaRepo;
	    $this->plantelRepo = $plantelRepo;
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

} 