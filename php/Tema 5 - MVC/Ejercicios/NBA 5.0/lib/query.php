<?php

    require 'db.php';
    class Query extends DB{

        function __construct($host, $user, $pass, $schema, $port){
            parent::__construct($host, $user, $pass, $schema, $port);
        }

        function select($table, $fields = null, $conditions = null, $group = null, $order = null, $desc = false, $limit = null, $joinTable = null, $joinColumn = null, $tableColumn = null){
            
            $query = 'SELECT ';

            if (empty($fields)){
                $query .= '* ';
            } else if (is_string($fields)){
                $query .= $fields . ' ';
            } else if (is_array($fields)){
                for ($i = 0; $i < count($fields); $i++){
                    if ($i == count($fields) - 1){
                        $query .= $fields[$i] . ' ';
                    } else {
                        $query .= $fields[$i] . ', ';
                    }
                    
                }
            }

            $query .= 'FROM ' . $table . ' ';

            if (!empty($joinTable) && !empty($joinColumn) && !empty($tableColumn)){
                $query .= 'JOIN ' . $joinTable . ' ON '. $joinColumn . ' = ' . $tableColumn . ' ';
            }

            if (!empty($conditions)){
                $query .= 'WHERE ';
                if (is_string($conditions)){
                    $query .= $conditions . ' ';
                } else if (is_array($conditions)){
                    for ($i = 0; $i < count($conditions); $i++){
                        if ($i == count($conditions) - 1){
                            $query .= $conditions[$i] . ' ';
                        } else {
                            $query .= $conditions[$i] . 'AND ';
                        }   
                    }
                }
            }

            if (!empty($group)){
                $query .= 'GROUP BY ' . $group . ' ';
            }

            if (!empty($order)){
                $query .= 'ORDER BY ' . $order . ' ';
                if ($desc){
                    $query .= 'DESC ';
                }
            }

            if (!empty($limit) && is_integer($limit)){
                $query .= 'LIMIT ' . $limit . ' ';
            }
            
            return parent::query($query);
        }

        function insert($table, $fields, $values){

            $query = 'INSERT INTO ' . $table . ' (';

            if (is_string($fields)){
                $query .= $fields . ') ';
            } else if (is_array($fields)){
                for ($i = 0; $i < count($fields); $i++){
                    if ($i == count($fields) - 1){
                        $query .= $fields[$i] . ') ';
                    } else {
                        $query .= $fields[$i] . ', ';
                    }
                    
                }
            }
            
            $query .= 'VALUES (';

            if (is_string($values)){
                $query .= $values . ' ';
            } else if (is_array($values)){
                for ($i = 0; $i < count($values); $i++){
                    if ($i == count($values) - 1){
                        $query .= '"'.$values[$i] . '") ';
                    } else {
                        $query .= '"'.$values[$i] . '", ';
                    }
                }
            }

            return parent::query($query);
        }

        function update($table, $fields, $values, $conditions){
            
            $query = 'UPDATE ' . $table . ' SET ';

            if (is_string($fields) && is_string($values)){
                $query .= $fields . ' =  "'.$values.'" ';
            } else if (is_array($fields) && is_array($values)){
                for ($i = 0; $i < count($values); $i++){
                    if ($i == count($values) - 1){
                        $query .= $fields[$i] . ' =  "'.$values[$i].'" ';
                    } else {
                        $query .= $fields[$i] . ' =  "'.$values[$i].'", ';
                    }
                }
            }

            $query .= 'WHERE (';
            if (is_string($conditions)){
                $query .= $conditions . ')';
            } else if (is_array($conditions)){
                for ($i = 0; $i < count($conditions); $i++){
                    if ($i == count($conditions) - 1){
                        $query .= $conditions[$i] . ')';
                    } else {
                        $query .= $conditions[$i] . 'AND ';
                    }   
                }
            }

            echo $query;

            return parent::query($query);
        }

        function delete($table, $conditions){
            $query = 'DELETE FROM ' . $table . ' WHERE (';

            if (is_string($conditions)){
                $query .= $conditions . ')';
            } else if (is_array($conditions)){
                for ($i = 0; $i < count($conditions); $i++){
                    if ($i == count($conditions) - 1){
                        $query .= $conditions[$i] . ')';
                    } else {
                        $query .= $conditions[$i] . 'AND ';
                    }   
                }
            }

            return parent::query($query);

        }
    }

?>