<?php 
    abstract class Usuarioservice {
        public static $options = array(
            'orderBy'   => 'rut',
            'orderDir'  => 'ASC',
            'limit'     => 50,
            'offset'    => 0
        );

        public static function getUsuarios($options = array(), $pagination = false)
        {
            $options = array_merge(Usuarioservice::$options, $options);

            $query = Usuario::order_by($options['orderBy'], $options['orderDir']);

            if(isset($options['hidden']))
                Usuario::$hidden = array_merge(Usuario::$hidden, $options['hidden']);

             if(isset($options['rut']) && $options['rut'])
                $query->raw_where('rut = ?', array($options['rut']));
            
            if($pagination){
                return $query->paginate($options['limit']);
            }else{
                $query->take($options['limit'])->skip($options['offset']);
                return $query->get();
            }
        }
    
    }
?>