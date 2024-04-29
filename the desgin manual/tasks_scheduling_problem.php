<?php

function maximoIntervalosNaoSobrePostos($intervalos)
{
    usort($intervalos, function ($a, $b) {
        return $a[1] - $b[1];
    });

    $maximoIntervalos = [];
    $fimIntervaloAnterior = PHP_INT_MIN;

    foreach ($intervalos as $intervalo) {
        if ($intervalo[0] >= $fimIntervaloAnterior) {
            $maximoIntervalos[] = $intervalo;
            $fimIntervaloAnterior = $intervalo[1];
        }
    }

    return $maximoIntervalos;
}

$intervalos = [
    [1, 5],
    [2, 7],
    [6, 9],
    [12, 1],
    [2, 89],
    [3, 1],
    [123, 567],
    [1, 0],
    [0, 8],
];

$resultado = maximoIntervalosNaoSobrePostos($intervalos);

echo "Intervalos não sobrepostos máximos:\n";
foreach ($resultado as $intervalo) {
    echo "[" . $intervalo[0] . ", " . $intervalo[1] . "]\n";
}
