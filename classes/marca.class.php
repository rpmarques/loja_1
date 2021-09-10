<?php

class Marca {

    // Atributo para conexão com o banco de dados
    private $pdo = null;
    // Atributo estático para instância da própria classe
    private static $marca = null;

    private function __construct($conexao) {
        $this->pdo = $conexao;
    }

    public static function getInstance($conexao) {
        if (!isset(self::$marca)):
            self::$marca = new Marca($conexao);
        endif;
        return self::$marca;
    }

    public function insert($rNome) {
        try {
            $rSql = "INSERT INTO marca (nome) VALUES (:nome);";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':nome', $rNome);
            $stm->execute();
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[marca.insert]- Executou comandoSQL:[' . $rSql . ']');
            if ($stm) {
                Logger('Usuario:[' . LOGIN . '] - INSERIU MARCA');
            }
            return $stm;
        } catch (PDOException $erro) {
//            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[departamento.select]- Executou comandoSQL:[' . $rSql . ']');
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function update($rNome, $rID) {
        try {
            $rSql = "UPDATE marca SET nome=:nome WHERE id = :id;";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':nome', $rNome);
            $stm->bindValue(':id', intval($rID));
            $stm->execute();
            if ($stm) {
                Logger('Usuario:[' . LOGIN . '] - ALTEROU MARCA - ID:[' . $rID . ']');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - MENSAGEM:[' . $erro->getMessage() . ']');
        }
    }

    public function delete($rId) {
        if (!empty($rId)):
            try {
                $rSql = "DELETE FROM marca WHERE id=:id";
                $stm = $this->pdo->prepare($rSql);
                $stm->bindValue(':id', $rId);
                $stm->execute();
                if ($stm) {
                    Logger('Usuario:[' . LOGIN . '] - EXCLUIU MARCA - ID:[' . $rId . ']');
                }
                return $stm;
            } catch (PDOException $erro) {
                Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
            }
        endif;
    }

    public function select($rCampos = '*', $rLeft = '', $rWhere = '') {
        try {
            $rSql = " SELECT $rCampos FROM marca";
            if (strlen($rLeft) > 0) {
                $rSql = $rSql . " mar $rLeft ";
            }
            if (strlen($rWhere) > 0) {
                $rSql = $rSql . " WHERE $rWhere ";
            }

            $stm = $this->pdo->prepare($rSql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[marca.select]- Executou comandoSQL:[' . $rSql . ']');
            return $dados;
        } catch (PDOException $erro) {
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[marca.select]- Executou comandoSQL:[' . $rSql . ']');
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function selectUM($rCampos = '*', $rLeft = '', $rWhere = '') {
        try {
            $rSql = " SELECT $rCampos FROM marca";
            if (strlen($rLeft) > 0) {
                $rSql = $rSql . " mar $rLeft ";
            }
            if (strlen($rWhere) > 0) {
                $rSql = $rSql . " WHERE $rWhere ";
            }

            $stm = $this->pdo->prepare($rSql);
//            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[departamento.select]- Executou comandoSQL:[' . $rSql . ']');
            $stm->execute();
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[marca.selectUM]- Executou comandoSQL:[' . $rSql . ']');
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[marca.selectUM]- Executou comandoSQL:[' . $rSql . ']');
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function montaSelect($rNome = 'marca_id', $rSelecionado = null) {
        try {
            $objMarca = Marca::getInstance(Conexao::getInstance());
            $wCampos = "*";
            $wLeft = "";
            $wWhere = "";
            $dados = $objMarca->select($wCampos, $wLeft, $wWhere);
            $select = '';
            $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Escolha uma categoria..."  style="width: 100%;">'
                    . '<option value="">&nbsp;</option>';
            foreach ($dados as $linhaDB) {
                if (!empty($rSelecionado) && $rSelecionado === $linhaDB->id) {
                    $sAdd = 'selected';
                } else {
                    $sAdd = '';
                }
                $select .= '<option value="' . $linhaDB->id . '"' . $sAdd . '>' . $linhaDB->nome . '</option>';
            }
            $select .= '</select>';
            return $select;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

}

?>