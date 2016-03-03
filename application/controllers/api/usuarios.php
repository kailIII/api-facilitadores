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

        foreach ($usuarios as $key => $usuario) {
            $result = $usuario->to_array();
        }

        if($usuarios){
            $array_elementos = json_decode($result,true);
            $array_elementos["rut_habilitado"] = "si";
        }else{
            $array_elementos["rut_habilitado"] = "no";
        }

        return $array_elementos;
    }
}
?>