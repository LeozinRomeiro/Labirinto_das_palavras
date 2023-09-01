<?php
require_once 'locar.php';
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Locar Livro</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    
</head>
<body>
    <a class="a_menu" href="../Menus/menu_locar.php">Voltar</a>
        <h2>Locar Livro</h2>
        <form action="locar.php" method="POST">
            <div class="div_cadastro">
                <fieldset>
                    <br>
                    <div class="div_label_input_cadastro">
                        <select class="input_cadastro" name="aluno" id="aluno" required>
                            <?php while ($row = mysqli_fetch_assoc($resultadoAlunos)): ?>
                            <option value="<?php echo $row['id_aluno']; ?>"><?php echo $row['nome_aluno']; ?></option>
                            <?php endwhile; ?>
                        </select>   
                        <label class="label_cadastro" for="aluno">Aluno:</label><br><br>
                    </div>
                    <br><br>
                    <div class="div_label_input_cadastro">
                        <select class="input_cadastro" name="exemplar" id="exemplar" required>
                            <?php while ($row = mysqli_fetch_assoc($resultadoExemplares)): ?>
                            <option value="<?php echo $row['id_exemplar_livro']; ?>"><?php echo $row['numero_exemplar']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <label class="label_cadastro" for="exemplar">Exemplar:</label><br><br>
                    </div>
                    <br><br>
                    <div class="div_label_input_cadastro">
                        <input class="input_cadastro" type="date" name="data_emprestimo" id="data_emprestimo" required>
                        <label class="label_cadastro" for="data_emprestimo">Data de Empréstimo:</label><br><br>
    
                    </div>
                    <br><br>
                    <div class="div_label_input_cadastro">
                        <input class="input_cadastro" type="date" name="data_devolucao" id="data_devolucao" required>
                        <label class="label_cadastro" for="data_devolucao">Data de Devolução:</label><br><br>
                    </div>
                    <br><br>
                    <input type="submit" value="Locar Livro">
                </fieldset>
            </div>
        </form>
</body>
</html>