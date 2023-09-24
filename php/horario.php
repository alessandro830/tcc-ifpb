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
date_default_timezone_set('America/Sao_Paulo');
$dia_atual = date('D');
$dia_portugues = obter_dia($dia_atual);
?>