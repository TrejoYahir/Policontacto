<?php

use Policontacto\Managers\RegistroManager;
use Policontacto\Repositorios\EstudianteRepo;

class UsersController extends BaseController
{

    protected $estudianteRepo;

    public function __construct(EstudianteRepo $estudianteRepo)
    {
        $this->estudianteRepo = $estudianteRepo;
    }

    public function registro()
    {

        $user = $this->estudianteRepo->nuevoEstudiante();
        $manager = new RegistroManager($user, Input::all());

        if ($manager->save()) {

            return Redirect::route('home');

        }

        return Redirect::back()->withInput()->withErrors($manager->getErrors());

    }

} 