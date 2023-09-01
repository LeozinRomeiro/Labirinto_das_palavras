<?php
require_once '/xampp/htdocs/Labirinto_das_palavras/conexao.php';
require_once '/xampp/htdocs/Labirinto_das_palavras/funcoes.php';

// Consulta SQL para recuperar todas as editoras
$sqlEditoras = "SELECT id_editora, nome_editora FROM editora";
$resultEditoras = $conn->query($sqlEditoras);
$option = "";

if ($resultEditoras->num_rows > 0) {
    while ($rowEditora = $resultEditoras->fetch_assoc()) {
        $idEditora = $rowEditora['id_editora'];
        $nomeEditora = $rowEditora['nome_editora'];
        $option .= "<option class=option value='$idEditora'>$nomeEditora</option>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se os campos foram preenchidos
    if (isset($_POST['nome']) && isset($_POST['ano']) && isset($_POST['editora']) && isset($_POST['autor']) && isset($_POST['exemplares'])) {
        $nome = $_POST['nome'];
        $ano = $_POST['ano'];
        $editora = $_POST['editora'];
        $autor = $_POST['autor'];
        $exemplares = $_POST['exemplares'];

        // Verificar se o livro e autor já estão cadastrados
        if (registro_repetido($conn, 'livro', 'nome_livro', $nome) === false || registro_repetido($conn, 'autor', 'nome_autor', $autor) === false) {
            // Preparar a consulta SQL para inserir o livro
            $sqlLivro = "INSERT INTO livro (nome_livro, ano_publicacao, id_editora) VALUES ('$nome', $ano, $editora)";
            
            // Executar a consulta SQL para inserir o livro
            if ($conn->query($sqlLivro) === TRUE) {
                // Obter o ID do livro recém-inserido
                $id_livro = $conn->insert_id;

                // Preparar a consulta SQL para inserir o autor
                $sql_autor = "INSERT INTO autor(nome_autor) VALUES ('$autor')";
                
                // Executar a consulta SQL para inserir o autor
                if ($conn->query($sql_autor) === TRUE) {
                    
                    // Obter o ID do livro recém-inserido
                    $id_autor = $conn->insert_id;

                    $sql_vinculo_autor_livro= "INSERT INTO autor_livro(id_autor, id_livro) VALUES ('$id_autor','$id_livro')";

                    if ($conn->query($sql_vinculo_autor_livro) === TRUE) {
                    // Inserir os exemplares do livro
                        for ($i = 0; $i < $exemplares; $i++) {
                            $numero = mt_rand(10000, 99999);
                            $sqlExemplar = "INSERT INTO exemplar_livro(numero_exemplar, id_livro) VALUES ('$numero', $id_livro)";
                            $conn->query($sqlExemplar);
                        }
                    }else{
                        echo "Erro ao vincular autor!";
                    }
                    echo "Livro cadastrado com sucesso!";
                } else {
                    echo "Erro ao cadastrar o autor: " . $conn->error;
                }
            } else {
                echo "Erro ao cadastrar o livro: " . $conn->error;
            }
        } else {
            echo "Livro já cadastrado!";
        }
    } else {
        echo "Todos os campos são obrigatórios!";
    }
}
?>
