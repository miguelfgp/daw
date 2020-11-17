<?php

    class Utility {

        static function arrayToSelect($name, $array, $keys = null, $selected = null){
            
            $html = '<select name="'.$name.'">';
            
            foreach ($array as $element){
                if (empty($keys)){
                    $html .= '<option value="'.$element.'">' . $element . '</option>';
                } else {
                    foreach ($keys as $key){
                        if ($selected == $element[$key]){
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

        static function arrayToTable($array, $keys = null){

            $html = '';
            
            foreach ($array as $element){
                $html .= '<tr>';
                    if (empty($keys)){
                        $html .= '<td>' . $element . '</td>';
                    } else {
                        foreach ($keys as $key){
                            $html .= '<td>' . $element[$key] . '</td>';
                        }
                    }
                $html .= '</tr>';
            }
            
            return $html;
        }        

        static function arrayToEdiTable($headers, $array, $keys = null, $buttons, $selection = null){

            $html = '<form action="" method="post"><table><tr>';

            foreach ($headers as $head){
                $html .= '<th>' . $head . '</th>';
            }

            $html .= '</tr>';
            
            foreach ($array as $element){
                $html .= '<tr>';
                if (empty($keys)){

                    $html .= '<td><input type="text" name="'. $element . '" value="' . $element .'" required></td>';
                    foreach ($buttons as $button){
                        $html .= '<td><button type="submit" name="' . $button['url']. '" value="'.$element[$keys[0]].'">'.$button['nombre'].'</button></td>';
                    }
                } else {
                    foreach ($keys as $key){
                        if ($key == "Conferencia" || $key == "División"){
                            $html .= '<td><input type="text" name="'. $element[$keys[0]].'_'.$key . '" value="' . $element[$key] .'" required></td>';
                        } else {
                            $html .= '<td><input type="text" name="'. $element[$keys[0]].'_'.$key . '" value="' . $element[$key] .'" required></td>';
                        }
                    }
                    foreach ($buttons as $button){
                        $html .= '<td><button type="submit" name="' . $button['url']. '" value="'.$element[$keys[0]].'">'.$button['nombre'].'</button></td>';
                    }
                }
                $html .= '</tr>';
            }

            $html .= '</form></table>';
            
            return $html;
        }
    }

?>