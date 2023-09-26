<?php
function quant($dia){
    if($dia == "segunda" or $dia == "terca"){
        $quant = 180;
        return $quant;
    }elseif($dia == "quarta" or $dia =="quinta"){
        $quant = 270;
        return $quant;
    }else{
        $quant = 120;
        return $quant;
    }
}







?>