<?php

header('Content-Type: text/html; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meuTexto = $_POST['meuTextoDescriptografar'];
   $descriptografada =  descriptografar($meuTexto);

}


function descriptografar($frase_criptografada) {
    $frase_descriptografada = '';
    $tamanho_frase = mb_strlen($frase_criptografada, 'UTF-8');
    $index = 0;

    // Loop para percorrer a frase criptografada
    while ($index < $tamanho_frase) {
        // Obtém a parte da frase criptografada
        $parte_criptografada = mb_substr($frase_criptografada, $index, 4, 'UTF-8');

        // Adiciona as três primeiras letras da parte à frase descriptografada
        $frase_descriptografada .= mb_substr($parte_criptografada, 0, 3, 'UTF-8');

        // Determina quantas letras aleatórias foram adicionadas
        $letra_aleatoria = mb_substr($parte_criptografada, 3, 1, 'UTF-8');
        $num_letras_a_remover = ord($letra_aleatoria) - ord('a');

        // Avança o índice para a próxima parte da frase criptografada
        $index += 4 + $num_letras_a_remover;
    }

    // Substitui os "#" por espaços
    $frase_descriptografada = str_replace("#", " ", $frase_descriptografada);
         
    return $frase_descriptografada;
}






?>
