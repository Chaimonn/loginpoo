<?php

/**
 * Class Noticia
 * Classe desenvolvida durante as aulas com o professor Candido Luciano de Farias do curso técnico de informática.
 * @author Saimon A. Hunger
 * @version 1.0
 * @access public
 * @copyright GPL 2020, INFO63B
 */

class Noticia{
    private $id;
    private $titulo;
    private $descricao;
    private $comentarios;
    private $data;
    private $usuario;

    public function setId($id){
        $this->id=$id;
    }
    
    public function getId(){
        return $this->id;
    }

    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }
    
    public function getTitulo(){
        return $this->titulo;
    }

    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }

    public function setComentarios($comentarios){
        $this->comentarios=$comentarios;
    }
    
    public function getComentarios(){
        return $this->comentarios;
    }
    public function setData($data){
        $this->data=$data;
    }
    
        public function getData(){
        return $this->data;
    }
    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }

    public function index(){
        $this->listar();
    }

/**
     * Adicionar Notícia ao Banco de Dados.
     * @access public
     * @since 26/08/2020
*/   
    public function listar(){
        $conexao=Conexao::getInstance();
        $sql="SELECT id, titulo, descricao, DATE_FORMAT(data, '%d/%m/%Y') AS data,
        (SELECT nome FROM usuario WHERE id=noticia.usuario_id)AS nome_usuario, imagem 
        FROM noticia
        ORDER BY id DESC LIMIT 5";
        
        $resultado=$conexao->query($sql);
        $noticias=null;

        while($noticia=$resultado->fetch(PDO::FETCH_OBJ)){
            $noticias[]=$noticia;
        }
        
        include HOME_DIR."view/paginas/noticias/noticias.php";
    }

/**
     * Exibe uma só notícia ao clicar em "Ver Mais".
     * @access public
     * @since 26/08/2020
*/   
    public function ver($id){
        $conexao=Conexao::getInstance();
        $sql="SELECT id, titulo, descricao, DATE_FORMAT(data, '%d/%m/%Y') AS data,
        (SELECT nome FROM usuario WHERE id=noticia.usuario_id)AS nome_usuario, imagem
        FROM noticia
        WHERE id=".$id;

        $resultado=$conexao->query($sql);
        $noticia=$resultado->fetch(PDO::FETCH_OBJ);

        include "Comentario.php";
        $comentario = new Comentario();
        $noticia->comentarios = $comentario->listar($id);

        include HOME_DIR."view/paginas/noticias/noticia.php";
    }

    /**
     * Deletar Notícia.
     * @access public
     * @since 26/08/2020
*/  
    public function delete($id){
        $conexao = Conexao::getInstance();
        $sql = 'DELETE FROM noticia WHERE id = '.$id;
        $conexao -> query($sql);
    }

}

?>