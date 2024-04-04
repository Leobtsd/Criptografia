<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meuTexto = $_POST['meuTextoDescriptografar'];
   $descriptografada =  descriptografar($meuTexto);

}


function descriptografar($frase_criptografada) {
    $frase_descriptografada = '';
    $tamanho_frase = strlen($frase_criptografada);
    $index = 0;

    // Loop para percorrer a frase criptografada
    while ($index < $tamanho_frase) {
        // Obtém a parte da frase criptografada
        $parte_criptografada = substr($frase_criptografada, $index, 4);

        // Adiciona as três primeiras letras da parte à frase descriptografada
        $frase_descriptografada .= substr($parte_criptografada, 0, 3);

        // Determina quantas letras aleatórias foram adicionadas
        $letra_aleatoria = substr($parte_criptografada, 3, 1);
        $num_letras_a_remover = ord($letra_aleatoria) - ord('a');

        // Avança o índice para a próxima parte da frase criptografada
        $index += 4 + $num_letras_a_remover;
    }

    // Substitui os "#" por espaços
    $frase_descriptografada = str_replace("#", " ", $frase_descriptografada);
         
    return $frase_descriptografada;
    
}





?>