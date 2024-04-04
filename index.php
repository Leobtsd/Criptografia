<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post">
  <textarea name="meuTextoCriptografar"></textarea>
  <button type="submit" name="submitCriptografar">Criptografar</button>
</form>

<form method="post">
  <textarea name="meuTextoDescriptografar"></textarea>
  <button type="submit" name="submitDescriptografar">Descriptografar</button>
</form>


<?php 
    // Processamento dos dados do formulário
    if(isset($_POST['submitCriptografar'])) {
        include 'criptografia.php';
    }
    if(isset($_POST['submitDescriptografar'])) {
        include 'descriptografia.php';
    }
?>

<?php 
    if(isset($descriptografada)) {
        echo "<h1>".$descriptografada."</h1>";
    }
    if(isset($criptografada)) {
        echo "<h1>".$criptografada."</h1>";
    }
?>


</body>
</html>
