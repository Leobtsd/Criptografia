<?php 


header('Content-Type: text/html; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meuTexto = $_POST['meuTextoCriptografar'];
    $criptografada = criptografar($meuTexto);
}

function criptografar($frase) {
    // Substitui os espaços por #
    $frase = str_replace(" ", "#", $frase);
    // Divide a frase em partes de 3 
    $frase = mb_str_split($frase, 3, 'UTF-8');

    // Loop pelas partes da frase
    foreach ($frase as &$parte) {
        // Verifica o tamanho da parte
        $tamanho = mb_strlen($parte, 'UTF-8');

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
        $ultima_letra = mb_substr($parte, -1, 1, 'UTF-8');
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
    return $frase;
}
    
}


?>
