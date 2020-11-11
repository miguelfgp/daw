<?php

    class Utility {

        static function arrayToSelect($name, $array, $keys = null){
            
            $html = '<select name="'.$name.'">';
            
            foreach ($array as $element){
                if (empty($keys)){
                    $html .= '<option value="'.$element.'">' . $element . '</option>';
                } else {
                    foreach ($keys as $key){
                        if ((!empty($_POST[$name]) && isset($_POST[$name])) && $_POST[$name] == $element[$key]){
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

        static function arrayToRows($array, $keys){

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


    }

?>