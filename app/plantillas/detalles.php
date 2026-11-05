<?php
$comentario = isset($_REQUEST['comentario']) ? $_REQUEST['comentario'] : '';

// 1. Longitud
$longitud = strlen($comentario);

// 2. Número de palabras
$numPalabras = str_word_count($comentario);

// 3. Letra más repetida
$letraMasRepetida = '-';
if (trim($comentario) !== '') {
    $textoLimpio = str_replace([' ', "\n", "\r", "\t"], '', strtolower($comentario));
    $frecuenciasLetras = count_chars($textoLimpio, 1);
    if (!empty($frecuenciasLetras)) {
        arsort($frecuenciasLetras);
        reset($frecuenciasLetras);
        $letraMasRepetida = chr(key($frecuenciasLetras));
    }
}

// 4. Palabra más repetida
$palabraMasRepetida = '-';
if (trim($comentario) !== '') {
    $palabras = str_word_count(strtolower($comentario), 1);
    if (!empty($palabras)) {
        $frecuenciasPalabras = array_count_values($palabras);
        arsort($frecuenciasPalabras);
        reset($frecuenciasPalabras);
        $palabraMasRepetida = ucfirst(key($frecuenciasPalabras));
    }
}
?>
<br>
<div>
<b>Detalles:</b><br>
<table>
    <tr><td>Longitud:          </td><td><?= $longitud ?></td></tr>
    <tr><td>Nº de palabras:    </td><td><?= $numPalabras ?></td></tr>
    <tr><td>Letra + repetida:  </td><td><?= $letraMasRepetida ?></td></tr>
    <tr><td>Palabra + repetida:</td><td><?= $palabraMasRepetida ?></td></tr>
</table>
</div>
