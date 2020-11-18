<?php

    class Utility {

        /* 
            Convierte un array en <option> para un <select>.
            El array debe contener los siguientes campos:
                'name':  Valor del atributo "name" de la etiqueta <select>
                'array': Conjunto de valores a convertir en <option>
                'fields':  Campos que se recorrerán en caso de Array asociativo.
                    Si no se declara, se recorrerá el array de manera secuencial
                'selected': Marcará como "selected" el <option> que coincida con su valor
        */

        static function arrayToSelect($array){
            $name = $array['name'];
            $html = '<select name="'.$name.'">';

            foreach ($array['array'] as $element){

                if (empty($array['fields'])){
                    $html .= '<option value="'.$element.'">' . $element . '</option>';
                } else if (is_string($array['fields'])){
                    $field = $array['fields'];
                    if (isset($array['selected']) && $array['selected'] == $element[$field]){
                        $html .= '<option value="'.$element[$field].'" selected>' . $element[$field] . '</option>';
                    } else {
                        $html .= '<option value="'.$element[$field].'">' . $element[$field] . '</option>';
                    }
                } else if (is_array($array['fields'])){
                    foreach ($array['fields'] as $field){
                        if (isset($array['selected']) && $array['selected'] == $element[$field]){
                            $html .= '<option value="'.$element[$field].'" selected>' . $element[$field] . '</option>';
                        } else {
                            $html .= '<option value="'.$element[$field].'">' . $element[$field] . '</option>';
                        }
                    }
                }
            }

            $html .= '</select>';
            
            return $html;
        }

        /* 
            Convierte un array en <option> para un <select>.
            El array debe contener los siguientes campos:
                'array': Conjunto de valores a convertir en <option>
                'fields':  Campos que se recorrerán en caso de Array asociativo.
                    Si no se declara, se recorrerá el array de manera secuencial
        */        

        static function arrayToTable($array){

            $html = '';
            
            foreach ($array['array'] as $element){
                $html .= '<tr>';
                    if (empty($array['fields'])){
                        $html .= '<td>' . $element . '</td>';
                    } else if (is_string($array['fields'])){
                        $field = $array['fields'];
                        $html .= '<td>' . $element[$field] . '</td>';
                    } else if (is_array($array['fields'])){
                        foreach ($array['fields'] as $field){
                            $html .= '<td>' . $element[$field] . '</td>';
                        }
                    }
                $html .= '</tr>';
            }
            
            return $html;
        }
        
        /* 
            Convierte un array en un <form> cuyo contenido sea una <table>.
            Cada atributo del $array se pasará a un <input> incrustado en un <td>
                'headers': Array de los <th> que formarán la <table>
                'array': Array a convertir
                'fields':  Valores que se recorrerán en caso de Array asociativo.
                    Si no se declara, se recorrerá el array de manera secuencial.
                    Está compuesto a su vez de 2 valores
                'buttons': Botones que enviarán la información recibida.
        */        

        static function arrayToEditable($array){

            $html = '<form action="" method="post"><table><tr>';

            foreach ($array['headers'] as $header){
                $html .= '<th>' . $header . '</th>';
            }

            $html .= '</tr>';
            
            foreach ($array['array'] as $element){
                $html .= '<tr>';

                if (empty($array['fields'])){

                    $html .= '<td><input type="text" name="'. $element . '" value="' . $element .'" required></td>';

                    foreach ($array['buttons'] as $button){
                        $html .= '<td><button type="submit" name="' . $button['url']. '" value="'.$element.'">'.$button['nombre'].'</button></td>';
                    }
                    
                } else if (is_string($array['fields'])){

                    $field = $array['fields'];
                    $html .= '<td><input type="text" name="'. $element[$field] . '" value="' . $element[$field] .'" required></td>';

                    foreach ($array['buttons'] as $button){
                        $html .= '<td><button type="submit" name="' . $button['action']. '" value="'.$element[$field].'">'.$button['name'].'</button></td>';
                    }
                    
                } else if (is_array($array['fields'])){

                    foreach ($array['fields'] as $field){

                            if ($field['type'] == 'input'){
                                $html .= '<td><input type="text" name="'. $element[$array['fields'][0]['name']].'_'.$field['name'] . '" value="' . $element[$field['name']] .'" required></td>';
                            } else if ($field['type'] == 'select'){
                                $field['list']['name'] = $element[$array['fields'][0]['name']].'_'.$field['name'];
                                $field['list']['selected'] = $element[$field['name']];
                                $html .= '<td>' . self::arrayToSelect($field['list']) .  '</td>';
                            }
                        }

                    foreach ($array['buttons'] as $button){
                        $html .= '<td><button type="submit" name="' . $button['action']. '" value="'.$element[$array['fields'][0]['name']].'">'.$button['name'].'</button></td>';
                    }
                    
                }
                $html .= '</tr>';
            }

            $html .= '</form></table>';
            
            return $html;
        }
    }

?>