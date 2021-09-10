<?php

class Produto {

    // Atributo para conexão com o banco de dados
    private $pdo = null;
    // Atributo estático para instância da própria classe
    private static $produto = null;

    private function __construct($conexao) {
        $this->pdo = $conexao;
    }

    public static function getInstance($conexao) {
        if (!isset(self::$produto)):
            self::$produto = new Produto($conexao);
        endif;
        return self::$produto;
    }

    public function insert($rNome, $rDescricao_1, $rPreco, $rFoto_1, $rCategoriaID, $rMarcaID, $rInfTecnica) {
        try {
            $rSql = "INSERT INTO produto (nome,descricao_1,preco,foto_1,inf_tecnica,marca_id,categoria_id)
                                  VALUES (:nome,:descricao_1,:preco,:foto_1,:inf_tecnica,:marca_id,:categoria_id);";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':nome', $rNome);
            $stm->bindValue(':descricao_1', $rDescricao_1);
            $stm->bindValue(':preco', gravaMoeda($rPreco));
            $stm->bindValue(':foto_1', $rFoto_1);
            $stm->bindValue(':categoria_id', intval($rCategoriaID));
            $stm->bindValue(':marca_id', intval($rMarcaID));
            $stm->bindValue(':inf_tecnica', $rInfTecnica);
            $stm->execute();
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[departamento.select]- Executou comandoSQL:[' . $rSql . ']');
            if ($stm) {
                Logger('Usuario:[' . LOGIN . '] - INSERIU PRODUTO');
            }
            return $stm;
        } catch (PDOException $erro) {
//            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[departamento.select]- Executou comandoSQL:[' . $rSql . ']');
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function update($rNome, $rDescricao_1, $rPreco, $rCategoriaID, $rMarcaID, $rInfTecnica, $rID) {
        try {
            $rSql = "UPDATE produto SET nome = :nome,descricao_1 = :descricao_1,preco = :preco,inf_tecnica = :inf_tecnica,"
                    . "marca_id = :marca_id,categoria_id = :categoria_id "
                    . " WHERE id = :id;";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':nome', $rNome);
            $stm->bindValue(':descricao_1', $rDescricao_1);
            $stm->bindValue(':preco', gravaMoeda($rPreco));
            $stm->bindValue(':categoria_id', intval($rCategoriaID));
            $stm->bindValue(':marca_id', intval($rMarcaID));
            $stm->bindValue(':inf_tecnica', $rInfTecnica);
            $stm->bindValue(':id', intval($rID));
            $stm->execute();
            if ($stm) {
                Logger('Usuario:[' . LOGIN . '] - ALTEROU PRODUTO - ID:[' . $rID . ']');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - MENSAGEM:[' . $erro->getMessage() . ']');
        }
    }

    public function delete($rId) {
        if (!empty($rId)):
            try {
                $rSql = "DELETE FROM produto WHERE id=:id";
                $stm = $this->pdo->prepare($rSql);
                $stm->bindValue(':id', $rId);
                $stm->execute();
                if ($stm) {
                    Logger('Usuario:[' . LOGIN . '] - EXCLUIU PRODUTO - ID:[' . $rId . ']');
                }
                return $stm;
            } catch (PDOException $erro) {
                Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
            }
        endif;
    }

    public function select($rCampos = '*', $rLeft = '', $rWhere = '', $rOrderBY = '', $rGoupby = '') {
        try {
            $rSql = " SELECT $rCampos FROM produto ";
            if (strlen($rLeft) > 0) {
                $rSql = $rSql . " pro $rLeft ";
            }
            if (strlen($rWhere) > 0) {
                $rSql = $rSql . " WHERE $rWhere ";
            }
            if (strlen($rOrderBY) > 0) {
                $rSql = $rSql . " ORDER BY $rOrderBY ";
            }
            if (strlen($rGoupby) > 0) {
                $rSql = $rSql . " GROUP BY $rGoupby ";
            }

            $stm = $this->pdo->prepare($rSql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[produto.select]- Executou comandoSQL:[' . $rSql . ']');
            return $dados;
        } catch (PDOException $erro) {
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[produto.select]- Executou comandoSQL:[' . $rSql . ']');
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function ultimasAlteracoesPrecos($rCampos = '*', $rLeft = '', $rWhere = '', $rOrderBY = '', $rGoupby = '') {
        try {
            $rSql = " SELECT $rCampos FROM alteracao_precos ";
            if (strlen($rLeft) > 0) {
                $rSql = $rSql . "  $rLeft ";
            }
            if (strlen($rWhere) > 0) {
                $rSql = $rSql . " WHERE $rWhere ";
            }
            if (strlen($rOrderBY) > 0) {
                $rSql = $rSql . " ORDER BY $rOrderBY ";
            }
            if (strlen($rGoupby) > 0) {
                $rSql = $rSql . " GROUP BY $rGoupby ";
            }

            $stm = $this->pdo->prepare($rSql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[produto.ultimasAlteracoesPrecos]- Executou comandoSQL:[' . $rSql . ']');
            return $dados;
        } catch (PDOException $erro) {
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[produto.ultimasAlteracoesPrecos]- Executou comandoSQL:[' . $rSql . ']');
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function selectUM($rCampos = '*', $rLeft = '', $rWhere = '', $rOrderBY = '', $rGoupby = '') {
        try {
            $rSql = " SELECT $rCampos FROM produto ";
            if (strlen($rLeft) > 0) {
                $rSql = $rSql . " pro $rLeft ";
            }
            if (strlen($rWhere) > 0) {
                $rSql = $rSql . " WHERE $rWhere ";
            }
            if (strlen($rOrderBY) > 0) {
                $rSql = $rSql . " ORDER BY $rOrderBY ";
            }
            if (strlen($rGoupby) > 0) {
                $rSql = $rSql . " GROUP BY $rGoupby ";
            }

            $stm = $this->pdo->prepare($rSql);
//            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[departamento.select]- Executou comandoSQL:[' . $rSql . ']');
            $stm->execute();
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[produto.select]- Executou comandoSQL:[' . $rSql . ']');
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[produto.select]- Executou comandoSQL:[' . $rSql . ']');
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function contaProduto($rCondicao) {
        try {
            $rSql = " SELECT COUNT(id) FROM produto WHERE $rCondicao;";

            $stm = $this->pdo->prepare($rSql);
//            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[departamento.select]- Executou comandoSQL:[' . $rSql . ']');
            $stm->execute();
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[produto.select]- Executou comandoSQL:[' . $rSql . ']');
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[produto.select]- Executou comandoSQL:[' . $rSql . ']');
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function montaSelect($rNome = 'categoria_id', $rSelecionado = null) {
        try {
            $objCategorias = Categoria::getInstance(Conexao::getInstance());
            $wCampos = "*";
            $wLeft = "";
            $wWhere = "";
            $dados = $objCategorias->select($wCampos, $wLeft, $wWhere);
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

    public function deleteIMG($rNomeIMG) {
        try {
            if (!empty($rNomeIMG)) {
                unlink('../img/produtos/' . $rNomeIMG);
                Logger('Usuário:[' . LOGIN . '] APAGOU IMAGEM:[' . $rNomeIMG . ']');
            }
        } catch (Exception $erro) {
            Logger('Usuario:[' . LOGIN . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
        }
    }

    public function somaClique($rId) {
        if (!empty($rId)):
            try {
                $rSql = "UPDATE produto set cliques=cliques+1 WHERE id=:id";
                $stm = $this->pdo->prepare($rSql);
                $stm->bindValue(':id', intval($rId));
                $stm->execute();
                if ($stm) {
                    Logger('Usuario:[' . LOGIN . '] - SOMOU CLIQUE NO PRODUTO - ID:[' . $rId . ']');
                }
                return $stm;
            } catch (PDOException $erro) {
                Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
            }
        endif;
    }

    public function atualizaPreco($rId, $PrecoAntigo, $rPrecoNovo) {
        if (!empty($rId)):
            try {
                $rSql = "UPDATE produto set preco=:preco,preco_antigo=:preco_antigo WHERE id=:id";
                $stm = $this->pdo->prepare($rSql);
                $stm->bindValue(':id', intval($rId));
                $stm->bindValue(':preco_antigo', ($PrecoAntigo));
                $stm->bindValue(':preco', gravaMoeda($rPrecoNovo));
                $stm->execute();
                if ($stm) {
                    Logger('Usuario:[' . LOGIN . '] - ALTEROU PRECO DO PRODUTO ID:[' . $rId . ']');
                    //GRAVA NO LOG DE PREÇOS
                    $rSql = "INSERT INTO alteracao_precos (data_cad,produto_id,preco_antigo,preco_atual)
                                                VALUES (:data_cad,:produto_id,:preco_antigo,:preco_atual);";
                    $stm = $this->pdo->prepare($rSql);
                    $stm->bindValue(':produto_id', intval($rId));
                    $stm->bindValue(':preco_antigo', ($PrecoAntigo));
                    $stm->bindValue(':preco_atual', gravaMoeda($rPrecoNovo));
                    $stm->bindValue(':data_cad', gravaData(date('d-m-YYYY')));
                    $stm->execute();
                    if ($stm):
                        Logger('Usuario:[' . LOGIN . '] - HISTÓRICO DE ALTERAÇÃO DE PREÇO PRODUTO ID:[' . $rId . ']');
                    endif;
                }
                return $stm;
            } catch (PDOException $erro) {
                Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
            }
        endif;
    }

}

?>