<?php
require_once 'cadastrar_livro.php';
require_once '../funcoes.php';

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <title>Cadastro de Livro</title> 
</head>
<body>
    <a class="a_menu" href="../Menus/menu_livros.php">Voltar</a>
    <h1>Cadastro de Livro</h1>
    <form class=form_cadastro action="cadastrar_livro.php" method="POST">
        <div class="div_cadastro">
            <fieldset class="fieldset_cadastro">
                <!--<legend class="legend_cadastro">Preencha os seguintes dados necessario</legend>-->
                <br>
                <div class="div_label_input_cadastro">
                    <input class="input_cadastro" type="text" id="nome_livro" name="nome" oninput="formatarNome(this)" required>
                    <label class="label_cadastro" for="nome_livro">Nome do Livro:</label><!--"for" vincula pelo id e aumenta a area de contato do input de acordo o click-->
                </div>
                <br><br>
                <div class="div_label_input_cadastro">
                    <input class="input_cadastro" type="text" id="nome_autor" name="autor" oninput="formatarNome(this)" required>
                    <label class="label_cadastro" for="nome_autor">Nome do Autor:</label>
                </div>
                <br><br>
                <div class="div_label_input_cadastro">
                    <input class="input_cadastro" type="number" id="quantidade_exemplares" name="exemplares" 
                    oninput="event(this)" inputmode="numeric" 
                    pattern="[0-9]{2}" maxlength="2" required>
                    <label class="label_cadastro" for="quantidade_exemplares">Quantidade de exemplares:</label>
                </div>
                <br><br>
                <div class="div_label_input_cadastro">
                    <input class="input_cadastro" type="number" id="ano_publicacao" name="ano" inputmode="numeric" 
                    pattern="[0-9]{4}" maxlength="4" required> 
                    <label class="label_cadastro" for="ano_publicacao">Ano de Publicação:</label>
                </div>
                <br><br>
                <div class="div_label_input_cadastro">
                    <select class="input_cadastro" id="id_editora" name="editora" required>
                        <?php echo $option;//printa a variavel option?>
                    </select>
                    <label class="label_cadastro" for="id_editora">ID da Editora:</label>
                </div>
                <br><br>
                <input class="submit_cadastro" type="submit" value="Cadastrar Livro">
            
            </fieldset>
        </div>
    </form>
</body>
</html>

<?php //label ano_publicacao Restringe o campo ano para apenas 4 digitos numericos?>

