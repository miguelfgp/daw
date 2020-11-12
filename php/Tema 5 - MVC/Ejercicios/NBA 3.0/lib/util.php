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

        static function arrayToRows($array, $keys = null, $urls = null){

            $html = '';
            
            foreach ($array as $element){
                $html .= '<tr>';
                if (empty($urls)){
                    if (empty($keys)){
                        $html .= '<td>' . $element . '</td>';
                    } else {
                        foreach ($keys as $key){
                            $html .= '<td>' . $element[$key] . '</td>';
                        }
                    }
                } else {
                    if (empty($keys)){
                        $html .= '<td>' . $element . '</td>';
                        foreach ($urls as $url){
                            $html .= '<td><a href="' . $url['url']. '">'.$url['nombre'].'</a></td>';
                        }
                    } else {
                        foreach ($keys as $key){
                            $html .= '<td contentEditable="true">' . $element[$key] . '</td>';
                        }
                        foreach ($urls as $url){
                            $html .= '<td><a href="' . $url['url']. '">'.$url['nombre'].'</a></td>';
                        }
                    }
                }
                $html .= '</tr>';
            }
            
            return $html;
        }        

        static function arrayToFormRows($array, $keys = null, $urls = null){

            $html = '<form>';
            
            foreach ($array as $element){
                $html .= '<tr>';
                if (empty($urls)){
                    if (empty($keys)){
                        $html .= '<td>' . $element . '</td>';
                    } else {
                        foreach ($keys as $key){
                            $html .= '<td>' . $element[$key] . '</td>';
                        }
                    }
                } else {
                    if (empty($keys)){
                        $html .= '<td>' . $element . '</td>';
                        foreach ($urls as $url){
                            $html .= '<td><a href="' . $url['url']. '">'.$url['nombre'].'</a></td>';
                        }
                    } else {
                        foreach ($keys as $key){
                            $html .= '<td><input type="text" value="' . $element[$key] .'"></td>';
                        }
                        foreach ($urls as $url){
                            $html .= '<td><a href="' . $url['url']. '">'.$url['nombre'].'</a></td>';
                        }
                    }
                }
                $html .= '</tr>';
            }

            $html .= '</form>';
            
            return $html;
        }
    }

?>