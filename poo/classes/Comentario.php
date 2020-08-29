<?php

/**
 * Class Comentario
 * Classe desenvolvida durante as aulas com o professor Candido Luciano de Farias do curso técnico de informática.
 * @author Saimon A. Hunger
 * @version 1.0
 * @access public
 * @copyright GPL 2020, INFO63B
 */


/**
     * Gerenciamento de Comentários.
     * @access public
     * @since 16/08/2020
*/  
class Comentario{
    private $id;
    private $comentario;
    private $data;
    private $noticia;
    private $usuario;

    public function setId($id){ 
        $this->id=$id;
    }
    
    public function getId(){ 
        return $this->id;
    }

    public function setComentario($comentario){ 
        $this->comentario=$comentario;
    }
    
    public function getComentario(){ 
        return $this->comentario;
    }

    public function setDatad($data){ 
        $this->data=$data;
    }
    
    public function getData(){ 
        return $this->data;
    }

    public function setNoticia($noticia){ 
        $this->noticia=$noticia;
    }
    
    public function getNoticia(){ 
        return $this->noticia;
    }

    public function setUsuario($usuario){ 
        $this->usuario=$usuario;
    }
    
    public function getUsuario(){ 
        return $this->usuario;
    }


    /**
     * Salvar Comentário.
     * @access public
     * @since 16/08/2020
*/  
    public function salvar($id_noticia, $comentario, $id){ 
        $conexao = Conexao::getInstance();
        $sql = 'INSERT INTO comentario (comentario, noticia_id, usuario_id) VALUES("'.$comentario.'","'.$id_noticia.'","'.$id.'")';
        if ($conexao->query($sql)){
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Exibe os Comentários de uma Notícia.
     * @access public
     * @since 17/08/2020
*/  
    public function listar($id_noticia = null){ 
        $conexao = Conexao::getInstance();
        $sql = 'SELECT id, comentario, (SELECT nome FROM usuario WHERE id = c.id_usuario) AS autor, (SELECT id FROM usuario WHERE id = c.id_usuario) AS id_usuario FROM comentario c WHERE noticia_id='.$id_noticia;
        $resultado = $conexao->query($sql);
        while ($item = $resultado->fetch(PDO::FETCH_OBJ)) {
            $comentarios[] = $item;
        }

        if (isset($comentarios)){ 
            return $comentarios;
        }
        else {
            return false;
        }
    }

    /**
     * Excluir Comentário.
     * @access public
     * @since 17/08/2020
*/  
    public function delete($id){ 
        $conexao = Conexao::getInstance();
        $sql = 'DELETE FROM comentario WHERE id='.$id;
        if ($conexao->query($sql));
    }

}