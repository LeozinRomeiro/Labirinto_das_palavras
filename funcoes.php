<?php require_once 'conexao.php';

function registro_repetido($conn, $tabela, $coluna, $campo) {
    // Consultar o banco de dados para verificar registros repetidos
    $consulta = "SELECT * FROM $tabela WHERE $coluna = '$campo'";
    $resultado = mysqli_query($conn, $consulta);

    // Verificar se já existe um livro com o mesmo nome e ano de publicação
    if (mysqli_num_rows($resultado) > 0) {
        // Registro repetido encontrado, retornar true
        return true;
    } else {
        // Registro não repetido, retornar false
        return false;
    }
}
?>

<script>
function formatarNome(element) {
    element.value = element.value.charAt(0).toUpperCase() + element.value.slice(1);
}

const campoCadastro = document.getElementById("ano_publicacao");
campoCadastro.addEventListener("input", function() {
  if (this.value !== "") {
    this.classList.add("preenchido");
  } else {
    this.classList.remove("preenchido");
  }
});

</script>