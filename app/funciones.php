<?php
// Validar usuario (mínimo 8 caracteres y contraseña = nombre al revés)
function usuarioOK($usuario, $contraseña): bool {
    if (strlen($usuario) < 8) {
        return false;
    }
    return $contraseña === strrev($usuario);
}

// Contar palabras de forma compatible
function contarPalabras($texto): int {
    $textoLimpio = trim($texto);
    if ($textoLimpio === '') return 0;
    return str_word_count($textoLimpio);
}

// Calcular la letra más repetida (ignorando espacios)
function letraMasRepetida($texto): string {
    $textoLimpio = str_replace([' ', "\n", "\r"], '', strtolower($texto));
    if ($textoLimpio === '') return '-';
    
    $frecuencias = count_chars($textoLimpio, 1);
    if (empty($frecuencias)) return '-';
    
    $maxFreq = 0;
    $letraMax = '-';
    
    foreach ($frecuencias as $ascii => $freq) {
        $char = chr($ascii);
        if ($freq > $maxFreq) {
            $maxFreq = $freq;
            $letraMax = $char;
        }
    }
    return $letraMax;
}

// Calcular la palabra más repetida (compatible con cualquier versión de PHP)
function palabraMasRepetida($texto): string {
    $palabras = str_word_count(strtolower($texto), 1);
    if (empty($palabras)) return '-';
    
    $frecuencias = array_count_values($palabras);
    if (empty($frecuencias)) return '-';
    
    arsort($frecuencias);
    reset($frecuencias);
    $palabraMasFrecuente = key($frecuencias);
    
    return ucfirst($palabraMasFrecuente);
}
?>
