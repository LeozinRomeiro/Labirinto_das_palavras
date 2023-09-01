<?php
require_once '/xampp/htdocs/Labirinto_das_palavras/conexao.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Livros</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
    <h1>Lista de Livros</h1>

    <?php
    // Consulta SQL para obter a lista de livros
    $sql = "SELECT nome_livro,ano_publicacao,nome_editora,nome_autor 
    FROM livro,editora,autor,autor_livro 
    WHERE livro.id_livro=autor_livro.id_livro 
    AND autor_livro.id_autor=autor.id_autor
    AND livro.id_editora=editora.id_editora";

    // Executa a consulta e obtém os resultados
    $result = $conn->query($sql);

    // Verifica se há registros retornados
    if ($result->num_rows > 0) {
        // Loop através dos registros e exibe as informações dos livros
        while ($row = $result->fetch_assoc()) {
            echo "<p>Título: " . $row["nome_livro"] . "</p>";
            echo "<p>Ano de Publicação: " . $row["ano_publicacao"] . "</p>";
            echo "<p>Editora: " . $row["nome_editora"] . "</p>";
            echo "<p>Autor: " . $row["nome_autor"] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Nenhum livro encontrado.";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>

</body>
</html>