<?php 


function criptografar($frase) {
    // Substitui os espaços por #
    $frase = str_replace(" ", "#", $frase);
    // Divide a frase em partes de 3 
    $frase = str_split($frase, 3);

    // Loop pelas partes da frase
    foreach ($frase as &$parte) {
        // Verifica o tamanho da parte
        $tamanho = strlen($parte);

        if ($tamanho == 1) {
            $parte .= "##"; // Adiciona dois espaços vazios para completar 3 caracteres
        } else if ($tamanho == 2) {
            $parte .= "#"; // Adiciona um espaço vazio para completar 3 caracteres
        }

        // Gera uma letra aleatória de 'b' a 'e'
        $letra_aleatoria = chr(rand(98, 101));
        // Adiciona a letra aleatória ao final de cada parte da frase
        $parte .= $letra_aleatoria;

        // Verifica a última letra da parte da frase
        $ultima_letra = substr($parte, -1);
        switch ($ultima_letra) {
            case 'b':
                $parte .= chr(rand(97, 122));
                break;
            case 'c':
                $parte .= chr(rand(97, 122)) . chr(rand(97, 122));
                break;
            case 'd':
                $parte .= chr(rand(97, 122)) . chr(rand(97, 122)) . chr(rand(97, 122));
                break;
            case 'e':
                $parte .= chr(rand(97, 122)) . chr(rand(97, 122)) . chr(rand(97, 122)) . chr(rand(97, 122));
                break;
        }
    }

    $frase = implode("", $frase);
    echo $frase;
}

criptografar("ola meus amigos e amigas bom di");

echo "<br>";

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

    // Retorna a frase descriptografada
    echo $frase_descriptografada;
}

descriptografar("olaerook#mebhus#bcamidhvpgoscvg#e#dceeamiclzgasckv#boczrm#dbei##bz");




?>
