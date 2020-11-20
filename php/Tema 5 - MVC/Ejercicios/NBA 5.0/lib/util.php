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

        static function arrayToSelect($name, $array, $keys = null, $selected = null){
            
            $html = '<select name="'.$name.'">';

            foreach ($array as $element){

                if (empty($keys)){
                    $html .= '<option value="'.$element.'">' . $element . '</option>';
                } else if (is_string($keys)){
                    if (isset($selected) && $selected == $element[$keys]){
                        $html .= '<option value="'.$element[$keys].'" selected>' . $element[$keys] . '</option>';
                    } else {
                        $html .= '<option value="'.$element[$keys].'">' . $element[$keys] . '</option>';
                    }
                } else if (is_array($keys)){
                    foreach ($keys as $key){
                        if (isset($selected) && $selected == $element[$key]){
                            $html .= '<option value="'.$element[$key].'" selected>' . $element[$key] . '</option>';
                        } else {
                            $html .= '<option value="'.$element[$key].'">' . $element[$key] . '</option>';
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

        static function arrayToTable($array, $keys = null){

            $html = '';
            
            foreach ($array as $element){
                $html .= '<tr>';
                    if (empty($keys)){
                        $html .= '<td>' . $element . '</td>';
                    } else if (is_string($keys)){
                        $html .= '<td>' . $element[$keys] . '</td>';
                    } else if (is_array($keys)){
                        foreach ($keys as $key){
                            $html .= '<td>' . $element[$key] . '</td>';
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

        static function arrayToEditable($array, $buttons, $headers = null, $keys = null){

            $html = '<table>';

            if (!empty($headers)){
                $html .= '<tr>';
                foreach ($headers as $header){
                    $html .= '<th>' . $header . '</th>';
                }
                $html .= '</tr>';
            }
            
            foreach ($array as $element){
                $html .= '<tr>';

                if (empty($keys)){

                    $html .= '<td><input type="text" name="'. $element . '" value="' . $element .'"></td>';

                    foreach ($buttons as $button){
                        $html .= '<td><button type="submit" name="' . $button['action']. '" value="'.$element.'">'.$button['name'].'</button></td>';
                    }
                    
                } else if (is_string($keys)){

                    $html .= '<td><input type="text" name="'. $element[$keys] . '" value="' . $element[$keys] .'"></td>';

                    foreach ($buttons as $button){
                        $html .= '<td><button type="submit" name="' . $button['action']. '" value="'.$element[$keys].'">'.$button['name'].'</button></td>';
                    }
                    
                } else if (is_array($keys)){

                    $elementName = str_replace(' ', '_', $element[$keys[0]['name']]);

                    foreach ($keys as $key){

                            if ($key['type'] == 'input'){
                                $html .= '<td><input type="text" name="'. $elementName.'_'.$key['name'] . '" value="' . $element[$key['name']] .'"></td>';
                            } else if ($key['type'] == 'hidden'){
                                $html .= '<input type="hidden" name="'. $elementName.'_'.$key['name'] . '" value="' . $element[$key['name']] .'">';
                            }
                            else if ($key['type'] == 'select'){
                                
                                $name = $elementName.'_'.$key['name'];
                                $field = $key['field'];
                                $selected = $element[$key['name']];

                                $html .= '<td>' . self::arrayToSelect($name, $key['array'], $field, $selected) .  '</td>';
                            }
                        }

                    foreach ($buttons as $button){
                        $html .= '<td><button type="submit" name="' . $button['action']. '" value="'.$elementName.'">'.$button['name'].'</button></td>';
                    }
                    
                }
                $html .= '</tr>';
            }

            $html .= '</table>';
            
            return $html;
        }
    }

?>