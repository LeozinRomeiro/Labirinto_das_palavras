<?php
require_once 'cadastrar_aluno.php';
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <title>Cadastro de Aluno</title>
</head>
<body>
    <a class="a_menu" href="../Menus/menu_alunos.php">Voltar</a>
    <h1>Cadastro de Aluno</h1>
    <form action="cadastrar_aluno.php" method="POST">
        <div class="div_cadastro">
            <fieldset class="fieldset_cadastro">
            <br>
            <div class="div_label_input_cadastro">
                <input class="input_cadastro" type="text" id="nome_aluno" name="nome" oninput="formatarNome(this)" required><br><br>
                <label class="label_cadastro" for="nome_aluno">Nome completo do aluno:</label>
            </div><br><br><br>
            <div class="div_label_input_cadastro">
                <input class="input_cadastro" type="number" id="cpf" name="cpf" 
                oninput="event(this)" inputmode="numeric" 
                pattern="[0-9]{11}" maxlength="11" required><br><br>
                <label class="label_cadastro" for="cpf">Cadastro de Pessoa Física(CPF):</label>
            </div><br><br><br>
            <div class="div_label_input_cadastro">
                <input class="input_cadastro" type="number" id="ra" name="ra" 
                oninput="event(this)" inputmode="numeric" 
                pattern="[0-9]{4}" maxlength="4" required><br><br> 
                <label class="label_cadastro" for="ra">Registro do Aluno(RA):</label>
            </div><br><br><br>

            <input class="submit_cadastro" type="submit" value="Registrar Aluno">
            <br>
            </fieldset>
        </div>
    </form>
</body>
</html>

<?php //label ra Restringe o campo ano para apenas 4 digitos numericos?>

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