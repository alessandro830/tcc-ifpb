<?php
    function obter_dia ($dia) {
        $dia_semana = array (
        'Sun' => 'domingo',
        'Mon' => 'segunda',
        'Tue' => 'terca',
        'Wed' => 'quarta',
        'Thu' => 'quinta',
        'Fri' => 'sexta',
        'Sat' => 'sabado'
        );

        return $dia_semana[$dia];
    }
?>