<?php

namespace Policontacto\Componentes;

use Illuminate\Html\FormBuilder as Form;
use Illuminate\View\Factory as View;
use Illuminate\Session\Store as Session;

class ConstructorCampos
{

    protected $form;
    protected $view;
    protected $session;

    public function __construct(Form $form, View $view, Session $session)
    {
        $this->form = $form;
        $this->view = $view;
        $this->session = $session;
    }

    public function control($tipo, $nombre, $valor = null, $atributos = array(), $opciones = null)
    {

        switch ($tipo) {
            case 'select':
                return $this->form->select($nombre, $opciones, $valor, $atributos);
            case 'password':
                return $this->form->password($nombre, $atributos);
            case 'checkbox':
                return $this->form->checkbox($nombre, $valor, $opciones, $atributos);
            default:
                return $this->form->input($tipo, $nombre, $valor, $atributos);
        }

    }

    public function atributos($nombre, &$atributos)
    {

        if (\Lang::has('validation.attributes.' . $nombre)) {
            $atributos['placeholder'] = \Lang::get('validation.attributes.' . $nombre);
        } else {
            $atributos['placeholder'] = str_replace('_', ' ', $nombre);
        }

        $atributos['placeholder'] = ucfirst($atributos['placeholder']);
        return $atributos;

    }

    public function errores($nombre)
    {
        $error = null;
        if ($this->session->has('errors')) {
            $errors = $this->session->get('errors');

            if ($errors->has($nombre)) {
                $error = $errors->first($nombre);
            }
        }

        return $error;
    }

    public function plantilla($tipo)
    {
        if (\File::exists('app/views/campos/' . $tipo . '.blade.php')) {
            return 'campos/' . $tipo;
        }
        return 'campos/campos';
    }

    public function input($tipo, $nombre, $valor = null, $atributos = array(), $opciones = null)
    {
        $this->atributos($nombre, $atributos);
        $control = $this->control($tipo, $nombre, $valor, $atributos, $opciones);
        $error = $this->errores($nombre);
        $plantilla = $this->plantilla($tipo);

        return $this->view->make($plantilla, compact('nombre', 'control', 'error'));
    }

    public function password($nombre, $atributos = array())
    {
        return $this->input('password', $nombre, null, $atributos);
    }

    public function checkbox($nombre, $valor, $opciones, $atributos = array())
    {
        return $this->input('checkbox', $nombre, $valor, $atributos, $opciones);
    }

    public function __call($metodo, $params)
    {
        array_unshift($params, $metodo);
        return call_user_func_array([$this, 'input'], $params);
    }

} 