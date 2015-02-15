<?php

use Policontacto\Repositorios\AreaRepo;
use Policontacto\Repositorios\EstudianteRepo;
use Policontacto\Repositorios\EmpresaRepo;

class AreaController extends BaseController
{

    protected $AreaRepo;
    protected $EstudianteRepo;
    protected $EmpresaRepo;

    public function  __construct(AreaRepo $AreaRepo, EstudianteRepo $EstudianteRepo, EmpresaRepo $EmpresaRepo)
    {
        $this->AreaRepo = $AreaRepo;
        $this->EstudianteRepo = $EstudianteRepo;
        $this->EmpresaRepo = $EmpresaRepo;

    }

    public function area($slug)
    {

        $area = $this->AreaRepo->find($slug);

	    $this->notFoundUnless($area);

        return View::make('usuarios/area', compact('area'));

    }

    public function estudiante($slug)
    {

        $estudiante = $this->EstudianteRepo->find($slug);

	    $this->notFoundUnless($estudiante);

        return View::make('usuarios/estudiante', compact('estudiante'));

    }

    public function empresa($slug)
    {

        $empresa = $this->EmpresaRepo->find($slug);

	    $this->notFoundUnless($empresa);

        return View::make('usuarios/empresa', compact('empresa'));

    }

}
