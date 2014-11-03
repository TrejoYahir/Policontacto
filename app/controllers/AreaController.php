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

    public function area($slug, $id)
    {

        $area = $this->AreaRepo->find($id);

	    $this->notFoundUnless($area);

        return View::make('usuarios/area', compact('area'));

    }

    public function estudiante($slug, $id)
    {

        $estudiante = $this->EstudianteRepo->find($id);

	    $this->notFoundUnless($estudiante);

        return View::make('usuarios/estudiante', compact('estudiante'));

    }

    public function empresa($slug, $id)
    {

        $empresa = $this->EmpresaRepo->find($id);

	    $this->notFoundUnless($empresa);

        return View::make('usuarios/empresa', compact('empresa'));

    }

}
