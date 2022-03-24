<?php
    function Connection(){
        $args = func_get_args();
        if(func_num_args() == 1){
            try{
                $database_con = mysqli_connect('localhost','root','',$args[0]);
                return [true,$database_con];
            }catch(Exception $error){
                return false;
            }
        }else if(func_num_args() > 1){
            try{
                $database_con = mysqli_connect($args[0],$args[1],$args[2],$args[3]);
                return [true, $database_con];
            }catch(Exception $error){
                return false;
            }
        }
    }
    function Register($arrayInfos, $arrayVariables, $arrayColumns, $table, $connection_BD){
        echo "<pre>";
        
        $arrayResps = [];
        for($i = 0; $i < count($arrayInfos); $i++){
            $string_items = '';
            $string_columns = '';
            $arrayUniqueInfo = (array) $arrayInfos[$i];
            for($a = 0; $a < count($arrayVariables); $a++){
                $info = $arrayUniqueInfo[$arrayVariables[$a]];
                $infoColumns = $arrayColumns[$a];
                $string_items = $string_items."'$info',";
                $string_columns = $string_columns."$infoColumns,";
            }
            $tratament_items = rtrim($string_items,',');
            $tratament_columns = rtrim($string_columns,',');
            $string_insert = "INSERT INTO $table ($tratament_columns) VALUES ($tratament_items)";
            $answer = mysqli_query($connection_BD,$string_insert);
            $arrayResps[] = $answer;
        }      
        if($arrayResps[0] == true){
            return true;
        }else{
            return false;
        }
    }
?>