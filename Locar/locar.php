<?php
// Incluir o arquivo de conexão
require_once '/xampp/htdocs/Labirinto_das_palavras/conexao.php';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados do formulário
    $alunoId = $_POST['aluno'];
    $exemplarId = $_POST['exemplar'];
    $dataEmprestimo = $_POST['data_emprestimo'];
    $dataDevolucao = $_POST['data_devolucao'];

    // Inserir os dados na tabela emprestimo_livro
    $inserirEmprestimo = "INSERT INTO emprestimo_livro (data_emprestimo, data_devolucao, id_aluno, id_exemplar_livro) VALUES ('$dataEmprestimo', '$dataDevolucao', $alunoId, $exemplarId)";
    $resultadoInserir = mysqli_query($conexao, $inserirEmprestimo);

    if ($resultadoInserir) {
        echo "Locação realizada com sucesso.";
    } else {
        echo "Ocorreu um erro ao realizar a locação: " . mysqli_error($conexao);
    }
}

// Obter a lista de alunos do banco de dados
$consultaAlunos = "SELECT * FROM aluno";
$resultadoAlunos = mysqli_query($conn, $consultaAlunos);

// Obter a lista de exemplares disponíveis para locação
$consultaExemplares = "SELECT * FROM exemplar_livro WHERE id_exemplar_livro NOT IN (SELECT id_exemplar_livro FROM emprestimo_livro)";
$resultadoExemplares = mysqli_query($conn, $consultaExemplares);
?>