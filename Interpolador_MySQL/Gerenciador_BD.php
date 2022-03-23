<?php
    function Connection(){
        $args = func_get_args();
        if(func_num_args() == 1){
            mysqli_connect('localhost','root','',$args[0]);
        }else if(func_num_args() > 1){
            mysqli_connect($args[0],$args[1],$args[2],$args[3]);
        }
    }
?>