<?php
    /// CLASSE DE CONEXAO 
    Class Conexao
    {
        private $pdo;
        ///MÉTODO CONSTRUTOR PARA ABRIR E TESTAR CONEXÃO COM O BANCO
        public function __construct ($bdvalidadados, $host, $user, $senha)
        { 
            try{
                $this->pdo = new PDO("mysql:dbname=".$bdvalidadados.";host=".$host,$user,$senha);
                echo "conexao realizada com sucesso"; 
            }
            catch(PDOException $e){
                echo "ERRO DE CONEXAO NO PDO:" .$e->getMessage();
                exit();
            }
        }
        ///FUNÇÃO PARA VALIDAR SE O EMAIL JÁ EXISTE(CASO NÃO EXISTA CHAMA FUNÇÃO PARA INSERIR DADOS)
        public function valida($rua, $bairro, $cidade, $uf, $cep, $nome, $email,$senha, $numero, $complemento)
        {
            $teste = $this->pdo->prepare("select codusuario from usuario where email = :email");
            $teste->bindValue(":email", $email);
            $teste->execute();
            if($teste->rowCount()>0){
                echo "Email já cadastrado";
            }
            else{
            $this->insereCampo($rua, $bairro, $cidade, $uf, $cep,
                $nome, $email, $senha, $numero, $complemento);
                  echo"
                  <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../index.html'>
                  <script>alert('cadastrado com sucesso')</script>";
            }
          }
        ////FUNÇÃO PARA INSERIR DADOS NO BANCO DE DADOS
        public function insereCampo($rua, $bairro, $cidade, $uf, $cep, $nome, $email, $senha, $numero, $complemento)
        {
            ///INSERE DADOS NA TABELA ENDEREÇO
            $insereEnd = $this->pdo->prepare("insert into endereco(rua, bairro, cidade, uf, cep) 
            values (:rua, :bairro, :cidade, :uf, :cep)");
            $insereEnd->bindValue(":rua", $rua);
            $insereEnd->bindValue(":bairro", $bairro);
            $insereEnd->bindValue(":cidade", $cidade);
            $insereEnd->bindValue(":uf", $uf);
            $insereEnd->bindValue(":cep", $cep);
            $insereEnd->execute();
            
            $codendereco = $this->pdo->lastInsertId(); ///RECUPERA O ID QUE ACABOU DE SER INSERIDO

            ///INSERE DADOS NA TABELA USUARIO
            $insereUser = $this->pdo->prepare("insert into usuario(nome, email, senha, numero,complemento,codendereco) 
            values (:nome, :email, :senha, :numero, :complemento, :codendereco)");
            $insereUser->bindValue(":nome", $nome);
            $insereUser->bindValue(":email", $email);
            $insereUser->bindValue(":senha", $senha);
            $insereUser->bindValue(":numero", $numero);
            $insereUser->bindValue(":complemento", $complemento);
            $insereUser->bindValue(":codendereco", $codendereco);
            $insereUser->execute();
        }
    }
?>
