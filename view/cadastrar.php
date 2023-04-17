<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="style.css"> <!--CHAMAR O ARQUIVO ONDE TEM O CSS--> 
    <script src="javascript.js"></script> <!--CHAMAR O ARQUIVO ONDE TEM O JAVASCRIPT-->
</head>
<body>
    <!-- CHAMA O ARQUIVO QUE ABRE CONEXÃO COMO BANCO -->
    <?php
        require_once('../model/conexao.php');
    ?>
    <div class="main-container">
        <label id="right-text-cadastrar">Cadastre-se Aqui</label> <br>
        <!-- ENVIA DADOS PARA O ARQUIVO CADASTRO.PHP AO CLICAR EM ENVIAR--> 
        <form method="POST" action="../controller/cadastro.php" name="cadastro">
            <label id="login-pass">Nome Completo * </label>  
            <!-- DEFININDO TIPO,NUMERO MÍNIMO/MÁXIMO DE CARACTERES, SE CAMPOS SÃO OBRIGATÓRIOS E PADRÃO DE CARACTERES-->
            <input type="text" name="nome" minlength="8" maxlength="40" required pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" ><br>
            <label id="login-pass">Login * </label> 
            <input type="email" name="email"  minlength="3" maxlength="40" required><br>
            <label id="login-pass">Senha * </label> 
            <input type="password" name="senha" id="senha" minlength="9" maxlength="32" required><br><br>
            <div class="show-pass">
                <!-- CHAMA FUNÇÃO DE MOSTRAR SENHA AO CLICAR NA CHECKBOX -->
                <input type="checkbox"  id="checkbox" onclick="mostraSenha()">  
                <label id="show-pass"> Mostrar senha</label>
            </div>
            <label  id="login-pass"> Seu cep * </label>
            <input type="text" name="cep" maxlength="8"required><br>
            <label  id="login-pass"> Sua rua * </label>
            <input type="text" name="rua"   minlength="5" maxlength="100" required><br>
            <label  id="login-pass" >Seu bairro * </label>
            <input type="text" name="bairro" minlength="5" maxlength="70"  required><br>
            <label  id="login-pass"  >Sua cidade *  </label>
            <input type="text" name="cidade" minlength="5" maxlength="100" required><br>
            <label  id="login-pass"> Selecione sua UF * </label>
            <select id="uf"  name="uf" required>
                <option value="sp">SP </option>
                <option value="rj"> RJ</option>
                <option value="mg">MG </option>
            </select> <br>
            <label  id="login-pass">Seu número </label>
            <input type="number" name="numero"><br>    
            <label  id="login-pass">Complemento</label>
            <input type="text" name="complemento" maxlenght="100">
            <input class="btnenviar" type="submit" value="enviar">
        </form>        
            <p> Conta já existente? <a href="../index.html" class="link"> Entre aqui</a> </p>
    </div>
</body>
</html>

