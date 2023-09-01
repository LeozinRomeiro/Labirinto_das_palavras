<?php
require_once 'cadastrar_livro.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Livro</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
    <div class="container_cadastro">
        <h1>Cadastro de Livro</h1>
    
        <form action="cadastrar_livro.php" method="POST">
            <label for="nome_livro">Nome do Livro:</label>
            <input type="text" id="nome_livro" name="nome" oninput="formatarNome(this)" required><br><br>

            <label for="nome_autor">Nome do Autor:</label>
            <input type="text" id="nome_autor" name="autor" oninput="formatarNome(this)" required><br><br>

            <label for="quantidade_exemplares">Quantidade de exemplares:</label>
            <input type="number" id="quantidade_exemplares" name="exemplares" 
            oninput="event(this)" inputmode="numeric" 
            pattern="[0-9]{2}" maxlength="2" required><br><br>

            <label for="ano_publicacao">Ano de Publicação:</label>
            <input type="text" id="ano_publicacao" name="ano" 
            oninput="event(this)" inputmode="numeric" 
            pattern="[0-9]{4}" maxlength="4" required><br><br> 

            <label for="id_editora">ID da Editora:</label>
            <select id="id_editora" name="editora" required>
                    <?php echo $option;//printa a variavel option?>
            </select>

            <input type="submit" value="Cadastrar Livro">
        </form>
    </div>
</body>
</html>

<?php //label ano_publicacao Restringe o campo ano para apenas 4 digitos numericos?>

<script>
document.getElementById('ano').addEventListener('keydown', function(event) {
    // Obter o código da tecla pressionada
    var key = event.which || event.keyCode;

    // Verificar se a tecla pressionada é uma letra
    if ((key >= 65 && key <= 90) || (key >= 97 && key <= 122)) {
        event.preventDefault(); // Bloquear a digitação de letras
    }
});
</script>