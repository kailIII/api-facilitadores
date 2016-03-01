<?php
class Api_Usuarios_Controller extends Base_Controller {
    public $restful = true;

    public function get_usuarios($rut = null, $nombre = null, $paterno = null)
    {
        $this->options['hidden'] = array('id');

        if($rut)
            $this->options['rut'] = $rut;
        if($nombre)
            $this->options['nombre'] = $nombre;
        if($paterno)
            $this->options['paterno'] = $paterno;
        
        try{
            $usuarios = Usuarioservice::getUsuarios($this->options);
        }catch (Exception $e){
            return ' Ha ocurrido un error al obtener los datos.';
        }
        
        if(!$usuarios){
            $result[0] = array("rut_habilitado" => "no");
        }

        foreach ($usuarios as $key => $usuario) {
            $result[$key] = $usuario->to_array();
        }
        if($usuarios){
            $result[0] = array_merge($result[0],array("rut_habilitado" => "si"));
        }

        return $result;
    }
}
?>