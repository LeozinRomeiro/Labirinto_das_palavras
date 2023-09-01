<?php
require_once '/xampp/htdocs/Labirinto_das_palavras/conexao.php';
require_once '/xampp/htdocs/Labirinto_das_palavras/funcoes.php';

// Consulta SQL para recuperar todas as editoras
$sqlEditoras = "SELECT id_editora, nome_editora FROM editora";
$resultEditoras = $conn->query($sqlEditoras);
$option="";

if ($resultEditoras->num_rows > 0) {
    while ($rowEditora = $resultEditoras->fetch_assoc()) {
        $idEditora = $rowEditora['id_editora'];
        $nomeEditora = $rowEditora['nome_editora'];
        $option .="<option value='$idEditora'>$nomeEditora</option>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se os campos foram preenchidos
    if (isset($_POST['nome']) && isset($_POST['ano']) && isset($_POST['editora'])) {
        $nome = $_POST['nome'];
        $ano = $_POST['ano'];
        $editora = $_POST['editora'];
        $autor=$_POST['autor'];
        $exemplares=~$_POST['exemplares'];

        if(registro_repetido($conn,'livro','nome_livro',$nome)===true or registro_repetido($conn,'autor','nome_autor',$autor)===true){
            
            
                // Preparar a consulta SQL
            $sql_livro = "INSERT INTO livro (nome_livro, ano_publicacao, id_editora) VALUES ('$nome', $ano, $editora)";
            $sql_autor="INSERT INTO exemplar_livro(nome_autor) VALUES ('$autor')";
            $sql_numero="INSERT INTO autor(numero_exemplar) VALUES ('$numero')";

            while ($i < $exemplares ) { 
                $numero= mt_rand(10000, 99999);
                if($conn->query($sql_numero)===TRUE){
                    $i++;
                }
            } 

            // Executar a consulta SQL
            if ($conn->query($sql_livro) === TRUE and $conn->query($sql_autor) === TRUE) {

                echo "Livro cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar o livro: " . $conn->error;
            }
        
        }else{
            echo "Livro já cadastrado!";    
        }

            

        
    } else {
        echo "Todos os campos são obrigatórios!";
    }
}
?>
