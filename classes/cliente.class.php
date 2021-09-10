<?php

class Cliente {
   // Atributo para conexão com o banco de dados   
   private $pdo = null;
   // Atributo estático para instância da própria classe    
   private static $cliente= null;

   private function __construct($conexao) {
      $this->pdo = $conexao;
   }
   
   public static function getInstance($conexao) {
      if (!isset(self::$cliente)):
         self::$cliente = new Cliente($conexao);
      endif;
      return self::$cliente;
   }

   public function cadastraSite($rNome,$rSenha,$rEmail) {
      try {
         $rSql = "INSERT INTO cliente (nome,senha,email ) VALUE (:nome,:senha,:email);";
         
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':nome', $rNome);
         $stm->bindValue(':senha', md5($rSenha));
         $stm->bindValue(':email', strtolower($rEmail));
         $stm->execute();
         Logger('Usuario:['.LOGIN.'] Tentando executar INSERT - SQL:['.$rSql.']');
         if ($stm) {
            Logger('Usuario:[' . LOGIN . '] - CLIENTE SE CADASTROU PELO SITE');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . NOME . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage().']');  
      }      
   }
   
   public function atualizaSite($rNome,$rCnpj,$rCpf,$rInscEst,$rRg,$rEndereco,$rNumero,$rBairro,$rCidadeID,$rUF,$rEmail,$rFone1,$rFone2,$rFone3,$rCEP,$rUsuarioID,$rID) {
       
      try {
         $rSql = "UPDATE cliente SET nome=:nome,senha=:senha,`cnpj` = :cnpj,
  `rg` = :rg,
  `ie` = :ie,
  `fone_1` = :fone_1,
  `email` = :email,
  `data_nasc` = :data_nasc,
  `cpf` = :cpf,
  `endereco` = :endereco,
  `bairro` = :bairro,
  `cep` = :cep,
  `uf` = :uf,
  `cidade` = :cidade 
WHERE 
  `id` = :id;";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':nome', $rNome);
         $stm->bindValue(':cnpj', $rCnpj);
         $stm->bindValue(':cpf', $rCpf);
         $stm->bindValue(':insc_est', $rInscEst);
         $stm->bindValue(':rg', $rRg);
         $stm->bindValue(':endereco', $rEndereco);
         $stm->bindValue(':numero', $rNumero);
         $stm->bindValue(':bairro', $rBairro);
         $stm->bindValue(':cidade_id', $rCidadeID);
         $stm->bindValue(':uf', $rUF);
         $stm->bindValue(':email', strtolower($rEmail));
         $stm->bindValue(':fone_1', $rFone1);
         $stm->bindValue(':fone_2', $rFone2);
         $stm->bindValue(':fone_3', $rFone3);
         $stm->bindValue(':cep', $rCEP);
         $stm->bindValue(':usuario_id', intval($rUsuarioID));
         $stm->bindValue(':usuario_id', intval($rUsuarioID));
         $stm->bindValue(':id', intval($rID));
         $stm->execute();         
         Logger('Usuario:['.LOGIN.'] Tentando executar UPDATE - SQL:['.$rSql.']');
         if ($stm) {
            Logger('Usuario:[' . LOGIN . '] - ALTEROU CLIENTE - ID:[' . $rID . ']');
         }
         return $stm;
      } catch (PDOException $erro) {
      Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - MENSAGEM:[' . $erro->getMessage().']');
      
      }
   }
   public function delete($rId,$rUsuarioID) {
      if (!empty($rId)):
         try {
            $rSql = "DELETE FROM cliente WHERE id=:id AND usuario_id=:usuario_id";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':id', intval($rId));
            $stm->bindValue(':usuario_id', intval($rUsuarioID));
            $stm->execute();
            Logger('Usuario:['.LOGIN.'] Tentando executar DELETE - SQL:['.$rSql.']');
            if ($stm) {
               Logger('Usuario:[' . LOGIN . '] - EXCLUIU CLIENTE - ID:[' . $rId . ']');
            }
            return $stm;
         } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage().']'); 
         }
      endif;
   }
   public function select($rCampos='',$rLeft,$rWhere='',$rOrderBy,$rGroupBy) {
      try {
          if (empty($rLeft)){
              $rSql = "SELECT $rCampos FROM cliente ".$rLeft." ". $rWhere." ".$rOrderBy." ".$rGroupBy;
          }else{
              $rSql = "SELECT $rCampos FROM cliente cli ".$rLeft." ". $rWhere." ".$rOrderBy." ".$rGroupBy;
          }
          Logger('Usuario:[' . LOGIN . '] FUNÇÃO:[cliente.select]- Tentando executar comandoSQL:[' . $rSql . ']');
         
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         Logger('Usuario:[' . LOGIN . '] FUNÇÃO:[cliente.select]- Executou comandoSQL:[' . $rSql . ']');
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . LOGIN . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
   public function selectUM($rCampos,$rLeft,$rWhere) {
      try {
         if (empty($rLeft)){
              $rSql = "SELECT $rCampos FROM cliente ".$rLeft." "." WHERE ".$rWhere;
          }else{
              $rSql = "SELECT $rCampos FROM cliente cli ".$rLeft." "." WHERE ". $rWhere;
          }
          Logger('Usuario:[' . LOGIN . '] FUNÇÃO:[cliente.selectUM]- Tentando executar comandoSQL:[' . $rSql . ']');
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         Logger('Usuario:[' . LOGIN . '] FUNÇÃO:[cliente.selectUM]- Executou comandoSQL:[' . $rSql . ']');
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . LOGIN . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
   public function montaSelect($rNome = 'fornecedor_id', $rSelecionado = null) {
      try {
         $objCliente = Cliente::getInstance(Conexao::getInstance());
         $dados = $objCliente ->select();
         $select = '';
         $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Escolha um cliente..."  style="width: 100%;">'
                 . '<option value="">&nbsp;</option>';
         foreach ($dados as $linhaDB) {
            if (!empty($rSelecionado) && $rSelecionado === $linhaDB->id) {$sAdd = 'selected';} else {$sAdd = '';}
            $select.='<option value="' . $linhaDB->id . '"' . $sAdd . '>' . $linhaDB->nome. '</option>';
         }
         $select.= '</select>';
         return $select;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . LOGIN . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }     
}

?>