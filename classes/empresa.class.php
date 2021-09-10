<?php

class Empresa {

    // Atributo para conexão com o banco de dados
    private $pdo = null;
    // Atributo estático para instância da própria classe
    private static $empresa = null;

    private function __construct($conexao) {
        $this->pdo = $conexao;
    }

    public static function getInstance($conexao) {
        if (!isset(self::$empresa)):
            self::$empresa = new Empresa($conexao);
        endif;
        return self::$empresa;
    }

    public function update($rNome, $rEndereco, $rBairro, $rCidade, $rUF, $rEmail, $rFone1, $rFone2, $rCEP, $rFacebook, $rInstagram, $rDescricao, $rEmailSmtp, $rEmailSmtpPorta, $rEmailSmtpSll, $rEmailImap, $rEmailImapPorta, $rEmailImapSll, $rEmailNome, $rEmailUsuario, $rEmailSenha) {

        try {
            $rSql = "UPDATE empresa SET
                         nome = :nome,endereco = :endereco,bairro = :bairro,cidade = :cidade,fone_1 = :fone_1,uf=:uf,cep=:cep,
                         fone_2 = :fone_2,email = :email,facebook = :facebook,instagram = :instagram,descricao = :descricao,
                         email_smtp = :email_smtp,  email_smtp_porta = :email_smtp_porta,email_smtp_ssl = :email_smtp_ssl,
                         email_imap = :email_imap,email_imap_porta = :email_imap_porta,email_imap_ssl = :email_imap_ssl,
                         email_nome = :email_nome,email_usuario = :email_usuario,email_senha = :email_senha";

            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':nome', $rNome);
            $stm->bindValue(':endereco', $rEndereco);
            $stm->bindValue(':bairro', $rBairro);
            $stm->bindValue(':cidade', $rCidade);
            $stm->bindValue(':uf', $rUF);
            $stm->bindValue(':email', strtolower($rEmail));
            $stm->bindValue(':fone_1', $rFone1);
            $stm->bindValue(':fone_2', $rFone2);
            $stm->bindValue(':cep', $rCEP);
            $stm->bindValue(':facebook', $rFacebook);
            $stm->bindValue(':instagram', $rInstagram);
            $stm->bindValue(':descricao', substr($rDescricao, 0, 150));
            $stm->bindValue(':email_smtp', strtolower($rEmailSmtp));
            $stm->bindValue(':email_smtp_porta', intval($rEmailSmtpPorta));
            $stm->bindValue(':email_smtp_ssl', $rEmailSmtpSll);
            $stm->bindValue(':email_imap', strtolower($rEmailImap));
            $stm->bindValue(':email_imap_porta', intval($rEmailImapPorta));
            $stm->bindValue(':email_imap_ssl', $rEmailImapSll);
            $stm->bindValue(':email_nome', $rEmailNome);
            $stm->bindValue(':email_usuario', $rEmailUsuario);
            $stm->bindValue(':email_senha', $rEmailSenha);
            $stm->execute();
            if ($stm) {
                Logger('Usuario:[' . LOGIN . '] - ALTEROU EMPRESA');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - MENSAGEM:[' . $erro->getMessage() . ']');
        }
    }

    public function selectUM($rCampos = '*', $rLeft = '', $rWhere = '') {
        try {
            $rSql = " SELECT $rCampos FROM empresa ";
            if (strlen($rLeft) > 0) {
                $rSql = $rSql . " emp $rLeft ";
            }
            if (strlen($rWhere) > 0) {
                $rSql = $rSql . " WHERE $rWhere ";
            }

            $stm = $this->pdo->prepare($rSql);
//            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[departamento.select]- Executou comandoSQL:[' . $rSql . ']');
            $stm->execute();
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[empresa.select]- Executou comandoSQL:[' . $rSql . ']');
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[empresa.select]- Executou comandoSQL:[' . $rSql . ']');
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

}

?>