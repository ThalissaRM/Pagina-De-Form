<?php
 require_once '../model/conexao.php';  //CHAMA O ARQUIVO DE CONEXÃO
 $con = new Conexao("bdvalidadados","localhost","root",""); //PARAMETROS DO BANCO DE DADOS

///ATRIBUINDO OS VALORES DAS INPUTS PARA AS VARIAVEIS
$nome = addslashes($_POST['nome']); 
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);
$cep = addslashes($_POST['cep']);
$rua = addslashes($_POST['rua']);
$bairro = addslashes($_POST['bairro']);
$cidade = addslashes($_POST['cidade']);
$uf = addslashes($_POST['uf']);
$numero = addslashes($_POST['numero']);
$complemento = addslashes($_POST['complemento']);


///CHAMA FUNÇÃO DE VALIDAR E CONSEQUENTEMENTE INSERIR DADOS NO BANCO
$con->valida($rua, $bairro, $cidade, $uf, $cep,
$nome, $email,$senha, $numero, $complemento);


?>
