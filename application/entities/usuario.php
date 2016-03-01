<?php 
    class Usuario extends Entity {
    	public static $table = 'usuario';
        protected $rules = array(
            'rut' => 'required',
            'nombre' => 'required',
            'paterno' => 'required'
        );
    }
?>